<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $order = DB::table('t_order')
                        ->select('t_order.*', 'm_store.name')
                        ->join('m_store','t_order.id_store','=','m_store.id')
                        ->get();
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
                                ->join('m_product','t_product_store.id_product','=','m_product.id')
                                ->where('t_product_store.id_store', session('id_store'))
                                ->get();
        $return = [
            "storeProduct"
        ];
        return view("admin.storeProduct", compact($return));
    }
}
