@extends('admin.admin')
@section('title', 'Edit Project' )
@section('content-title', 'Edit Project - ' . $project -> project_name)
@section('content')

@if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
          @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
          @endforeach
        </ul>
        </div>
      @endif

<div class="row">
    <div class="col-lg-12">
        <div class="card-shadow">
            <div class="card-header">
                <a href="{{route('project.index')}}" class="btn btn-danger">Kembali</a>
            </div>
            <div class="card-body">
                <form action="{{route('project.update', $project -> id)}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="hidden" name="siswa_id" value="{{$project-> siswa -> id}}">
                    <div class="form-group">
                        <label for="project_name">Nama Project</label>
                        <input class="form-control" type="text" name="project_name" value="{{$project -> project_name}}">
                    </div>
                    <div class="form-group">
                        <label for="project_date">Tanggal Project</label>
                        <input class="form-control" type="date" name="project_date" value="{{$project -> project_date}}" id="">
                    </div>
                    <div class="form-group">
                        <label for="photo">Foto Project</label>
                        <input class="form-control" type="file" name="photo" id="">
                        <img src="{{asset('/storage/'.$project->photo)}}" width="400px"alt="" class="mt-3"></div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection