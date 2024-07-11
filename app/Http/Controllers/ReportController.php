<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataExport;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.report');
    }

    public function getReport(Request $request)
    {

        $startDate = $request->start_date;
        $endDate = $request->end_date;

        // Ambil semua nama produk unik dari tabel m_product
        $products = DB::table('m_product')->pluck('product_name');

        // Buat kolom dinamis untuk setiap produk
        $selectColumns = [
            DB::raw('DATE(t_order.created_at) as Tanggal'),
            DB::raw('TIME(t_order.created_at) as Jam'),
            'users.fullname as spg',
            'm_store.name as toko'
        ];

        foreach ($products as $product) {
            $selectColumns[] = DB::raw("CASE WHEN m_product.product_name = '" . addslashes($product) . "' THEN t_order_detail.quantity ELSE 0 END AS '" . addslashes($product) . "'");
        }

        // dd($selectColumns);

        // Buat query utama dengan kolom dinamis
        $query = DB::table('t_order')
            ->select($selectColumns)
            ->join('users', 't_order.id_users', '=', 'users.id')
            ->join('m_store', 't_order.id_store', '=', 'm_store.id')
            ->join('t_order_detail', 't_order.id', '=', 't_order_detail.id_order')
            ->join('m_product', 't_order_detail.id_product', '=', 'm_product.id')
            ->where('t_order.status', '=', 2)
            ->whereBetween('t_order.created_at', [$startDate, $endDate])
            ->get();

        $return = [
            'query',
            'startDate',
            'endDate'
        ];

        return view('admin.viewReport', compact($return));
    }

    public function exportExcel(Request $request){
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        // Ambil semua nama produk unik dari tabel m_product
        $products = DB::table('m_product')->pluck('product_name');

        // Buat kolom dinamis untuk setiap produk
        $selectColumns = [
            DB::raw('DATE(t_order.created_at) as Tanggal'),
            DB::raw('TIME(t_order.created_at) as Jam'),
            'users.fullname as spg',
            'm_store.name as toko'
        ];

        foreach ($products as $product) {
            $selectColumns[] = DB::raw("CASE WHEN m_product.product_name = '" . addslashes($product) . "' THEN t_order_detail.quantity ELSE 0 END AS '" . addslashes($product) . "'");
        }

        $headings = ['Tanggal','Jam','SPG', 'Toko'];
        foreach ($products as $product) {
            $headings[] = $product;
        }

        // dd($selectColumns);

        // Buat query utama dengan kolom dinamis
        $query = DB::table('t_order')
            ->select($selectColumns)
            ->join('users', 't_order.id_users', '=', 'users.id')
            ->join('m_store', 't_order.id_store', '=', 'm_store.id')
            ->join('t_order_detail', 't_order.id', '=', 't_order_detail.id_order')
            ->join('m_product', 't_order_detail.id_product', '=', 'm_product.id')
            ->where('t_order.status', '=', 2)
            ->whereBetween('t_order.created_at', [$startDate, $endDate])
            ->get();

        
        // Export data menggunakan class export yang sudah dibuat
        return Excel::download(new DataExport($query, $headings), 'laporanpenjualan.xlsx');
    }
}
