<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        return view('admin.userManagement', compact('users'));
    }

    public function addUsers()
    {
        return view('admin.addUsers');
    }

    public function createUsers(Request $request)
    {
        $data = $request->all();
        $cekUsers = DB::table('users')->where('email', $data['email'])->first();
        if ($cekUsers) {
            Session::flash('error', 'Email sudah terdaftar');
            return redirect()->back();
        } else {
            $insertUsers = DB::table('users')
                ->insert([
                    'fullname' => $data['fullname'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'phone' => $data['phone'],
                    'level' => $data['role'],
                    'status' => 1
                ]);
            if ($insertUsers) {
                Session::flash('success', 'Users Berhasil Ditambahkan');
                return redirect('/users');
            } else {
                Session::flash('error', 'Users Gagal Ditambahkan');
                return redirect('/users');
            }
        }
    }

    public function editUsers($id)
    {
        $dataUsers = DB::table('users')->where('id', $id)->first();
        return view('admin.editUsers', compact('dataUsers'));
    }

    public function updateUsers(Request $request)
    {
        $data = $request->all();
        $cekUsers = DB::table('users')->where('email', $data['email'])->where('id', '!=', $data['id_users'])->first();
        if ($cekUsers) {
            Session::flash('error', 'Email sudah terdaftar');
            return redirect()->back();
        } else {
            $udpateUsers = DB::table('users')
                ->where('id', $data['id_users'])
                ->update([
                    'fullname' => $data['fullname'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'level' => $data['role'],
                ]);
            if ($udpateUsers) {

                return redirect('/users')->with('success', 'Users Berhasil Diubah');
            } else {

                return redirect('/users')->with('error', 'Users Gagal Diubah');
            }
        }
    }

    public function deleteUsers($id)
    {
        $deleteUsers = DB::table('users')
            ->where('id', $id)
            ->delete();
        if ($deleteUsers) {

            return redirect('/users')->with('success', 'Users Berhasil Diubah');
        } else {

            return redirect('/users')->with('error', 'Users Gagal Diubah');
        }
    }
}
