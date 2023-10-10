<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        // return $siswas;
        return view('admin.mastersiswa', compact('siswas'));
    }

    public function create()
    {
        return view('admin.tambahsiswa');
    }

    public function edit($id)
    {
        $data = Siswa::find($id);
        return view('admin.editsiswa', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'about' => 'required|max:200',
            'photo' => 'required'
        ]);
        $image = $request->file('photo')->store('photo', 'public');

        Siswa::create([
            'name' => $request->name,
            'about' => $request->about,
            'photo' => $image
        ]);
        return redirect()->route('siswa.index')->with('message', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $request->validate([
            'name' => 'required|max:50',
            'about' => 'required|max:200',
            'photo' => 'required'
        ]);
        if ($siswa->photo) {
            Storage::disk('public')->delete($siswa->photo);
        }
        $image = $request->file('photo')->store('photo', 'public');

        $siswa->update([
            'name' => $request->name,
            'about' => $request->about,
            'photo' => $image
        ]);
        return redirect()->route('siswa.index')->with('message', 'Data berhasil diperbarui');
    }

    public function Delete($id)
    {
        Siswa::destroy($id);

        return redirect()->route('siswa.index')->with('message', 'Data berhasil dihapus');
    }
}
