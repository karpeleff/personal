<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{

    public  function index()
    {
        //$data = Store::paginate(15);
        $data = null;
        return view('store/index',['data' => $data]);
    }


}
