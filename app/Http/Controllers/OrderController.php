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
                    ->select('t_order.*', 'm_store.name', 'm_store.phone', 'm_store.address', 'm_store.owner', 'users.fullname')
                    ->join('m_store','t_order.id_store','=','m_store.id')
                    ->join('users', 't_order.id_users', 'users.id')
                    ->where('t_order.id', $no_pesanan)
                    ->first();
        $detailProduct = DB::table('t_order_detail')
                        ->select('t_order_detail.*', 'm_product.product_name', 'm_product.price_onpieces', 'm_product.barcode', 'm_product.weight', 'm_product.image')
                        ->join('m_product','t_order_detail.id_product','=','m_product.id')
                        ->where('t_order_detail.id_order', $no_pesanan)
                        ->get();
        $return = [
            'detailOrder',
            'detailProduct'
        ];
        return view('admin.detailOrder', compact($return));
    }

    public function finishedOrder(Request $request){
        $id_order = $request->id_order;
        $id_store = $request->id_store;
        $detailProduct = DB::table('t_order_detail')
                        ->select('t_order_detail.*', 'm_product.product_name', 'm_product.price_onpieces', 'm_product.barcode', 'm_product.weight', 'm_product.image')
                        ->join('m_product','t_order_detail.id_product','=','m_product.id')
                        ->where('t_order_detail.id_order', $id_order)
                        ->get();
        
        foreach ($detailProduct as $value) {
            //cek produk di toko
            $cekProduk = DB::table('t_product_store')
                        ->where('id_store', $id_store)
                        ->where('id_product', $value->id_product)
                        ->first();
            if ($cekProduk != NULL) {
                //Update Stok
                $oldStock = $cekProduk->stock;
                $newStock = $oldStock+$value->quantity;

                $updateStok = DB::table('t_product_store')
                                ->where('id', $cekProduk->id)
                                ->update(['stock' => $newStock]);
            } else {
                
                $addProduct = DB::table('t_product_store')
                ->insert(
                    [
                        'id_store'      => $id_store,
                        'id_product'    => $value->id_product,
                        'stock'         => $value->quantity,
                        'status'        => 1
                    ]
                );
            }
        }

        //Update status pesanan
        $updateStatus = DB::table('t_order')
                                ->where('id', $id_order)
                                ->update(['status' => 2]);
        if ($updateStatus) {
            return redirect('/detail-pesanan/'.$id_order);
        }

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
