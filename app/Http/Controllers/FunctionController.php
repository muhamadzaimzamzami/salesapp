<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FunctionController extends Controller
{
    public function cekAbsen()
    {
        $cekAbsen =  DB::table("t_absent")
                            ->select('t_absent.*', 'm_store.name')
                            ->join('m_store','t_absent.id_store','=','m_store.id')
                            ->where("t_absent.id_users", Auth::user()->id)
                            ->where("t_absent.status", 1)
                            ->first();
        
        if (!empty($cekAbsen)) {
            return [
                'status' => TRUE, 
                'dataAbsen' => $cekAbsen
            ];
        }else {
            return [
                'status' => FALSE, 
                'dataAbsen' => NULL
            ];
        }
    }
}
