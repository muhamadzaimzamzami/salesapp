<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        if (session("status") == 1) {
            $order = DB::table('t_order')
                // ->select('t_order.*', 'm_store.name', 't_order_detail.quantity', 'm_product.product_name', 'm_product.price_onpieces', 'm_product.barcode', 'm_product.weight', 'm_product.image')
                // ->join('m_store','t_order.id_store','=','m_store.id')
                // ->join('t_order_detail','t_order.id','=','t_order_detail.id_order')
                // ->join('m_product','t_order_detail.id_product','=','m_product.id')
                ->where('id_store', session('id_store'))
                ->get();
        } else {
            $order = DB::table('t_order')
                ->select('t_order.*', 'm_store.name')
                ->join('m_store', 't_order.id_store', '=', 'm_store.id')
                // ->join('t_order_detail', 't_order.id', '=', 't_order_detail.id_order')
                // ->join('m_product', 't_order_detail.id_product', '=', 'm_product.id')
                ->get();
        }
        $return = [
            'order'
        ];
        return view("admin.order", compact($return));
    }

    public function storeProduct()
    {
        $storeProduct = DB::table('t_product_store')
            ->select(
                't_product_store.*',
                'm_product.product_name',
                'm_product.barcode',
                'm_product.price_oncartoon',
                'm_product.price_onpieces',
                'm_product.weight',
                'm_product.stock as stockProduct',
                'm_product.image',
            )
            ->join('m_product', 't_product_store.id_product', '=', 'm_product.id')
            ->where('t_product_store.id_store', session('id_store'))
            ->get();
        $return = [
            "storeProduct"
        ];
        return view("admin.storeProduct", compact($return));
    }

    public function addOrder()
    {
        $products = DB::table('m_product')->get();
        return view('admin.addOrder', compact('products'));
    }

    public function createOrder(request $request)
    {
        $data = request()->all();

        //menghitungJumlahHarga
        $totalHarga = 0;
        foreach (request()->select_product as $index) {
            $hargaProduct = $data['price_product'][$index] * $data['quantity_product'][$index];
            $totalHarga = $totalHarga + $hargaProduct;
        }

        $insertOrder = DB::table('t_order')
            ->insertGetId(
                [
                    'id_users'      => Auth::user()->id,
                    'id_store'      => session('id_store'),
                    'status'        => 1,
                    'total_price'   => $totalHarga,
                    'description'   => 'Description'
                ]
            );

        //insertDetailProduct
        foreach (request()->select_product as $key) {
            DB::table('t_order_detail')
                ->insert(
                    [
                        'id_order'      => $insertOrder,
                        'id_product'    => $data['select_product'][$key],
                        'quantity'      => $data['quantity_product'][$key],
                        'description'   => "description",
                    ]
                );
        }

        return redirect('/pesanan');
    }

    public function detailOrder($no_pesanan){
        $detailOrder = DB::table('t_order')
                    ->select('t_order.*', 'm_store.name', 't_order_detail.quantity', 'm_product.product_name', 'm_product.price_onpieces', 'm_product.barcode', 'm_product.weight', 'm_product.image')
                    ->join('m_store','t_order.id_store','=','m_store.id')
                    ->join('t_order_detail','t_order.id','=','t_order_detail.id_order')
                    ->join('m_product','t_order_detail.id_product','=','m_product.id')
                    ->where('t_order.id', $no_pesanan)
                    ->get();
        $return = [
            'detailOrder'
        ];
        return view('admin.detailOrder', compact($return));
    }

    public function updateStock(Request $request){
        $id_productStore = $request->id_product;
        $newStock = $request->stock_product;

        $updateStock = DB::table('t_product_store')
              ->where('id', $id_productStore)
              ->update(['stock' => $newStock]);
        
        return redirect('/produktoko');
    }
}   
