<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalesController extends FunctionController
{
    public function index()
    {
        $sales = DB::table("t_sales_merch")
                        ->select("t_sales_merch.*", "m_product.product_name", "m_store.name")
                        ->join("m_product", "t_sales_merch.id_product" , "m_product.id")
                        ->join("m_store", "t_sales_merch.id_store", "m_store.id")
                        ->where("t_sales_merch.id_users", Auth::user()->id)    
                        ->get();
        $checkin = $this->cekAbsen();
        if ($checkin['status']) {
            $statusCheck = $checkin['dataAbsen']->status;
        }else{
            $statusCheck = 0;
        }
        $return = [
            "statusCheck",
            "sales"
        ];
        return view("admin.sales", compact($return));
    }

    public function addSales()
    {
        $storeProduct = DB::table("t_product_store")
                        ->select("t_product_store.*", "m_product.product_name")
                        ->join("m_product", "t_product_store.id_product", "m_product.id")
                        ->where("t_product_store.id_store", session('id_store'))
                        ->get();
        $return = [
            'storeProduct',
        ];
        return view("admin.addSales", compact($return));
    }

    public function createSales(Request $request)
    {
        $imageName = time().'.'.$request->bukti->extension();
        $request->bukti->move(public_path('assets/images/evidence'), $imageName);
        $bukti = 'assets/images/evidence'.$imageName;
        $product = $request->product;
        $quantity= $request->jumlah_barang;
        $total   = $request->total;
        $description = $request->description;

        // `id`, `id_users`, `id_store`, `id_product`, `quantity`, `total_price`, `status`, `description`, `image`,
        $insertSales = DB::table('t_sales_merch')
            ->insertGetId(
                [
                    'id_users'      => Auth::user()->id,
                    'id_store'      => session('id_store'),
                    'id_product'    => $product,
                    'quantity'      => $quantity,
                    'total_price'   => $total,
                    'status'        => 1,
                    'description'   => $description,
                    'image'         => $bukti,
                ]
            );
        
        if ($insertSales) {
            return redirect("penjualan");
        }
    }
}
