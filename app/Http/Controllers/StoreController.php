<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StoreController extends Controller
{
    public function index(){
        $store = DB::table('m_store')->get();
        return view('admin.store',compact('store'));
    }
}
