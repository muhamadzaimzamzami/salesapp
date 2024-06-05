<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends FunctionController
{
    public function index()
    {
        $checkin = $this->cekAbsen();
        if ($checkin['status']) {
            $statusCheck = $checkin['dataAbsen']->status;
        }else{
            $statusCheck = 0;
        }
        $return = [
            "statusCheck"
        ];
        return view("admin.sales", compact($return));
    }
}
