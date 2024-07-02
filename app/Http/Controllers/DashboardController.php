<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function index()
    {
        $totalToko = DB::table('m_store')->count();
        $totalProduk = DB::table('m_product')
                    ->select(DB::raw('count(distinct product_name) as total'))
                    ->first();

        if (session('role')==1) {
            $totalPenjualan = DB::table('t_order')
                        ->join('t_order_detail', 't_order.id', '=', 't_order_detail.id_order')
                        ->where('t_order.status', 2)
                        ->sum('t_order_detail.quantity');
            $dataPesanan = DB::table('t_order')
                        ->select('t_order.*', 'users.fullname', 'm_store.name')
                        ->join('users', 't_order.id_users', 'users.id')
                        ->join('m_store', 't_order.id_store', 'm_store.id')
                        ->get();
        } else if(session('role')==2) {
            $totalPenjualan = DB::table('t_order')
                        ->join('t_order_detail', 't_order.id', '=', 't_order_detail.id_order')
                        ->where('t_order.status', 2)
                        ->where('t_order.id_users', Auth::user()->id)
                        ->sum('t_order_detail.quantity');
            $dataPesanan = DB::table('t_order')
                        ->select('t_order.*', 'users.fullname', 'm_store.name')
                        ->join('users', 't_order.id_users', 'users.id')
                        ->join('m_store', 't_order.id_store', 'm_store.id')
                        ->where('t_order.id_users', Auth::user()->id)
                        ->get();
        }else{
            $totalPenjualan = DB::table('t_sales_merch')
                        ->where('t_sales_merch.id_users', Auth::user()->id)
                        ->sum('t_sales_merch.quantity');
            $dataPesanan = DB::table("t_sales_merch")
                        ->select("t_sales_merch.*", "m_product.product_name", "m_store.name", "users.fullname")
                        ->join("m_product", "t_sales_merch.id_product" , "m_product.id")
                        ->join("m_store", "t_sales_merch.id_store", "m_store.id")
                        ->join("users","t_sales_merch.id_users","users.id")
                        ->where("t_sales_merch.id_users", Auth::user()->id)    
                        ->get();
        }
        
        
        $return = [
            'totalToko',
            'totalProduk',
            'totalPenjualan',
            'dataPesanan'
        ];
        return view("admin.dashboard", compact($return));
    }
}
