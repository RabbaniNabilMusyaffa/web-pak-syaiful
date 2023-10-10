<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function masterKontak()
    {
        return view('admin.masterkontak');
    }

    public function masterProject()
    {
        return view('admin.masterproject');
    }

    public function masterSiswa()
    {
        return view('admin.mastersiswa');
    }
}
