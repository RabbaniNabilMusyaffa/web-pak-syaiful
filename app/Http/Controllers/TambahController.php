<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TambahController extends Controller
{
    public function tambahKontak()
    {
        return view('admin.tambahkontak');
    }

    public function tambahProject()
    {
        return view('admin.tambahproject');
    }

    public function tambahSiswa()
    {
        return view('admin.tambahsiswa');
    }
}
