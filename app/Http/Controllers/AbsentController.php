<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\FunctionController;

use Carbon\Carbon;

class AbsentController extends FunctionController
{
    public function index()
    {
        $today = Carbon::today();
        if (session('role') == 1) {
            $absensi = DB::table('t_absent')
                            ->select('t_absent.*', 'm_store.name', 'users.fullname')
                            ->join('m_store', 't_absent.id_store', '=', 'm_store.id')
                            ->join('users','t_absent.id_users','=','users.id')
                            ->whereDate('t_absent.created_at', '=', $today)
                            ->get();
        } else {
            $absensi = DB::table('t_absent')
                            ->select('t_absent.*', 'm_store.name')
                            ->join('m_store', 't_absent.id_store', '=', 'm_store.id')
                            ->where('t_absent.id_users', '=', Auth::user()->id)
                            ->get();
        }
        
        
        $return = [
            "absensi"
        ];
        return view("admin.loby", compact($return));


    }

    public function checkinpage()
    {
        $toko = DB::table("m_store")->get();
        return view("admin.checkin", compact("toko"));
    }

    public function checkin(request $request)
    {
        $id_store = $request->toko;
        $idUser = Auth::user()->id;

        $insert = DB::table("t_absent")->insert([
            "id_users" => $idUser,
            "id_store" => $id_store,
            "status" => 1,
            "image" => 'photo_absen.png'
        ]);



        if ($insert) {
            $cekStatus = $this->cekAbsen();
            if ($cekStatus['status']) {
                Session::put('id_absent', $cekStatus['dataAbsen']->id);
                Session::put('id_store', $cekStatus['dataAbsen']->id_store);
                Session::put('name_store', $cekStatus['dataAbsen']->name);
                Session::put('status', $cekStatus['dataAbsen']->status);
            }
            return redirect("/lobi")->with("success", "Anda berhasil checkin");
        }
    }

    public function checkout(Request $request)
    {
        $id_checkout = $request->id_check;
        $checkout = DB::table('t_absent')
            ->where('id', $id_checkout)
            ->update(['status' => 0]);

        if ($checkout) {
            Session::forget('id_absent');
            Session::forget('id_store');
            Session::forget('name_store');
            Session::forget('status');
            return redirect('/lobi')->with("success", "Anda Berhasil Chekout");
        }
    }
}
