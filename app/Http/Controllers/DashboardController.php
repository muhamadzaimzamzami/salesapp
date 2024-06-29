<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function index()
    {
        $totalToko = DB::table('m_store')->count();
        $totalProduk = DB::table('m_store')->count();
        $totalPenjualan = DB::table('t_order')
                        ->join('t_order_detail', 't_order.id', '=', 't_order_detail.id_order')
                        ->where('t_order.status', 2)
                        ->sum('t_order_detail.quantity');
        $dataPesanan = DB::table('t_order')
                        ->select('t_order.*', 'users.fullname', 'm_store.name')
                        ->join('users', 't_order.id_users', 'users.id')
                        ->join('m_store', 't_order.id_store', 'm_store.id')
                        ->get();
        $return = [
            'totalToko',
            'totalProduk',
            'totalPenjualan',
            'dataPesanan'
        ];
        return view("admin.dashboard", compact($return));
    }
}
