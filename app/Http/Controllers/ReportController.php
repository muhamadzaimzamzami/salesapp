<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(){
        return view('admin.report');
    }

    public function getReport(){

        // Ambil parameter tanggal dari request
        $data = json_decode($_POST['datanya']);
        $startDate = $data->startDate;
        $endDate = $data->endDate;

        // Step 1: Get list of unique product names
        $products = DB::table('m_product')->pluck('product_name');

        // Step 2: Build the dynamic select parts of the query
        $selectColumns = [
            'b.fullname as spg',
            'c.name as toko'
        ];

        foreach ($products as $product) {
            $selectColumns[] = DB::raw("SUM(CASE WHEN e.product_name = '" . addslashes($product) . "' THEN d.quantity ELSE 0 END) AS `" . addslashes($product) . "`");
        }

        // Step 3: Build the complete query with date range filtering
        $query = DB::table('t_order as a')
            ->join('users as b', 'a.id_users', '=', 'b.id')
            ->join('m_store as c', 'a.id_store', '=', 'c.id')
            ->join('t_order_detail as d', 'a.id', '=', 'd.id_order')
            ->join('m_product as e', 'd.id_product', '=', 'e.id')
            ->select($selectColumns)
            ->where('a.status', '=', 2)
            ->whereBetween('a.order_date', [$startDate, $endDate])
            ->groupBy('b.fullname', 'c.name')
            ->get();

        return json_encode($query);
    }
}
