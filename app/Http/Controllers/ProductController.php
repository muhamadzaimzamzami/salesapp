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
}
