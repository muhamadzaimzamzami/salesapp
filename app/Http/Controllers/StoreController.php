<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function index()
    {
        $store = DB::table('m_store')->get();
        return view('admin.store', compact('store'));
    }

    public function addStore()
    {
        return view('admin.addStore');
    }

    public function createStore(Request $request)
    {
        $data = $request->all();

        DB::table('m_store')
            ->insert(
                [
                    'name'          => $data['name'],
                    'owner'    => $data['owner'],
                    'phone'      => $data['phone'],
                    'address'   => $data['address'],
                    'status'    => 1
                ]
            );
        return redirect('/toko')->with('success', 'Sukses Menambahkan Toko');
    }

    public function editStore($id)
    {
        $dataStore = DB::table('m_store')->where('id', $id)->first();
        return view('admin.editStore', compact('dataStore'));
    }

    public function updateStore(Request $request)
    {
        $data = $request->all();
        $updateStore = DB::table('m_store')
            ->where('id', $data['id_store'])
            ->update(
                [
                    'name'     => $data['name'],
                    'owner'    => $data['owner'],
                    'phone'    => $data['phone'],
                    'address'  => $data['address'],
                    'status'   => 1
                ]
            );

        return redirect('/toko')->with('success', 'Sukses Menambahkan Toko');
        // if ($updateStore) {
        //     return redirect('/toko')->with('success', 'Sukses Menambahkan Toko');
        // }
    }

    public function deleteStore($id)
    {
        $deleteStore = DB::table('m_store')->where('id', $id)->delete();
        if ($deleteStore) {
            return redirect('/toko')->with('success', 'Sukses Menambahkan Toko');
        }
    }
}
