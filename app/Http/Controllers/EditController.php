<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditController extends Controller
{
    public function editKontak()
    {
        return view('admin.editkontak');
    }

    public function editProject()
    {
        return view('admin.editproject');
    }

    public function editSiswa()
    {
        return view('admin.editsiswa');
    }
}
