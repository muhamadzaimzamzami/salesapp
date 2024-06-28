<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(){
        $products = DB::table('m_product')->get();
        return view('admin.product',compact('products'));
    }

    public function addProduct(){
        return view('admin.addProduct');
    }

    public function createProduct(Request $request){
        $data = $request->all();
        $imageName = time().'.'.$data['image']->extension();
        $data['image']->move(public_path('assets/images/product'), $imageName);
        $image = 'assets/images/product/'.$imageName;
        DB::table('m_product')
                ->insert(
                    [
                        'product_name'      => $data['product_name'],
                        'category'           => 1,
                        'barcode'           => $data['barcode'],
                        'price_oncartoon'   => 0,
                        'price_onpieces'    => $data['price_pcs'],
                        'weight'            => $data['weight'],
                        'image'             => $image,
                        'stock'             => $data['stock'],
                        'status'            => 1,
                    ]
                );
        return redirect('/produk')->with('success','Sukses Menambahkan Produk');
    }

    public function editProduct($id){
        $dataProduct = DB::table('m_product')->where('id', $id)->first();
        return view('admin.editProduct', compact('dataProduct'));
    }

    public function updateProduct(Request $request){
        $data = $request->all();
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$data['image']->extension();
            $data['image']->move(public_path('assets/images/product'), $imageName);
            $image = 'assets/images/product/'.$imageName;
        }else{
            $image = $data['old_image'];
        }

        $updateProduct = DB::table('m_product')
                        ->where('id', $request->id_product)
                        ->update([
                            'product_name'      => $data['product_name'],
                            'category'           => 1,
                            'barcode'           => $data['barcode'],
                            'price_oncartoon'   => 0,
                            'price_onpieces'    => $data['price_pcs'],
                            'weight'            => $data['weight'],
                            'image'             => $image,
                            'stock'             => $data['stock'],
                            'status'            => 1,
                        ]);

        if ($updateProduct) {
            return redirect('/produk')->with('success','Sukses Merubah Produk');
        }
    }

    public function deleteProduct($id){
        $deleteProduct = DB::table('m_product')
                        ->where('id', $id)
                        ->delete();
        if ($deleteProduct) {
            return redirect('/produk')->with('success','Sukses Mengapus Produk');
        }
    }
}
