<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalesController extends FunctionController
{
    public function index()
    {
        if (session('role') == 1) {
            $sales = DB::table("t_sales_merch")
                ->select("t_sales_merch.*", "m_product.product_name", "m_store.name", "users.fullname")
                ->join('t_product_store', 't_sales_merch.id_product', 't_product_store.id')
                ->join("m_product", "t_product_store.id_product", "m_product.id")
                ->join("m_store", "t_sales_merch.id_store", "m_store.id")
                ->join("users", "t_sales_merch.id_users", "users.id")
                ->get();
        } else {
            $sales = DB::table("t_sales_merch")
                ->select("t_sales_merch.*", "m_product.product_name", "m_store.name", "users.fullname")
                ->join('t_product_store', 't_sales_merch.id_product', 't_product_store.id')
                ->join("m_product", "t_product_store.id_product", "m_product.id")
                ->join("m_store", "t_sales_merch.id_store", "m_store.id")
                ->join("users", "t_sales_merch.id_users", "users.id")
                ->where("t_sales_merch.id_users", Auth::user()->id)
                ->get();
        }


        $checkin = $this->cekAbsen();
        if ($checkin['status']) {
            $statusCheck = $checkin['dataAbsen']->status;
        } else {
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
            ->select("t_product_store.*", "m_product.product_name", "m_product.price_onpieces")
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
        $imageName = time() . '.' . $request->bukti->extension();
        $request->bukti->move(public_path('assets/images/evidence'), $imageName);
        $bukti = 'assets/images/evidence/' . $imageName;
        $product = $request->product;
        $quantity = $request->jumlah_barang;
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
            $updateStok = DB::table('t_product_store')
                ->where('id', $product)
                ->decrement('stock', $quantity);
            if ($updateStok) {
                return redirect("penjualan")->with('success', 'Berhasil Menambahkan penjualan.');
            }
        }
    }

    public function editSales($id)
    {
        $getIdToko = DB::table('t_sales_merch')
            ->select('id_store')
            ->where('id', $id)
            ->first();
        // dd($getIdToko);
        $productStore = DB::table("t_product_store")
            ->select("t_product_store.*", "m_product.product_name")
            ->join("m_product", "t_product_store.id_product", "m_product.id")
            ->where("t_product_store.id_store", $getIdToko->id_store)
            ->get();
        // dd($productStore);
        $dataPenjualan = DB::table('t_sales_merch')
            ->where('id', $id)
            ->first();
        $return = [
            'productStore',
            'dataPenjualan'
        ];
        return view("admin.editSales", compact($return));
    }

    public function updateSales(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('bukti')) {
            $imageName = time() . '.' . $data['bukti']->extension();
            $data['bukti']->move(public_path('assets/images/evidence'), $imageName);
            $image = 'assets/images/evidence/' . $imageName;
        } else {
            $image = $data['bukti_old'];
        }

        $getStock = DB::table('t_product_store')
            ->where('id', $data['product'])->first();

        $stokSekarang = $getStock->stock;
        $jumlahLama = $data['jumlah_lama'];

        $StockLama = $stokSekarang + $jumlahLama;

        $stokBaru = $StockLama - $data['jumlah_barang'];

        $updateSales = DB::table('t_sales_merch')
            ->where('id', $request->id_penjualan)
            ->update([
                'id_product'    => $data['product'],
                'quantity'      => $data['jumlah_barang'],
                'total_price'   => $data['total'],
                'description'   => $data['description'],
                'image'         => $image,
            ]);

        $updateProdukStok = DB::table('t_product_store')
            ->where('id', $data['product'])
            ->update([
                'stock'    => $stokBaru,
            ]);

        return redirect('/penjualan')->with('success', 'Sukses Merubah Penjualan');

        // if ($updateSales) {
        // }
    }

    public function deleteSales($id)
    {
        $deleteProduct = DB::table('t_sales_merch')
            ->where('id', $id)
            ->delete();
        if ($deleteProduct) {
            return redirect('/penjualan')->with('success', 'Sukses Mengapus Penjualan');
        }
    }
}
