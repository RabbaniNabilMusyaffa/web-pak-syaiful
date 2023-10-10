<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin')->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Siswa::all();
        return view('admin.masterproject', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    public function add($id)
    {
        $siswa = Siswa::find($id);
        return view('admin.tambahproject', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "project_name" => "required",
            "project_date" => "required",
            "photo" => "required|image"
        ]);

        $image = $request->file('photo')->store('photo', 'public');

        Project::create([
            'siswa_id' => $request->siswa_id,
            'project_name' => $request->project_name,
            'project_date' => $request->project_date,
            'photo' => $image
        ]);
        return redirect()->route('project.index')->with('message', 'Project berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $datas = Siswa::find($id)->project()->get();
        return view('admin.showproject', compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = Project::find($id);
        return view('admin.editproject', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $this->validate($request, [
            'project_name' => 'required|max:100',
            'project_date' => 'required|max:200',
            'photo' => 'required|image'
        ]);
        if ($project->photo) {
            Storage::disk('public')->delete($project->photo);
        }
        $image = $request->file('photo')->store('photo', 'public');

        $project->update([
            'siswa_id' => $request->siswa_id,
            'project_name' => $request->project_name,
            'project_date' => $request->project_date,
            'photo' => $image
        ]);
        return redirect()->route('project.index')->with('message', 'Project berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    }

    public function delete($id)
    {
        Project::destroy($id);
        return redirect()->route('project.index')->with('message', 'Project berhasil dihapus');
    }
}
