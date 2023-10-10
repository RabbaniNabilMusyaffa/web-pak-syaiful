@extends('admin.admin')
@section('title', 'Edit Data Siswa')
@section('content-title', 'Edit Data Siswa')
@section('content')

<div class="card">

  <div class="card-shadow">
    <div class="card-header">
      <a href="{{route('siswa.index')}}" class="btn btn-danger"><i class="fas fa-arrow-left mr-2"></i>Back</a>
    </div>
  </div>

    <div class="card-body">
      <form action="{{route('siswa.update', $data->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="name" class="form-control" value="{{$data->name}}">  
        </div>
  
        <div class="form-group">
          <label for="">About</label>
          <textarea name="about" class="form-control" >{{$data->about}}</textarea>
        </div>
  
        <div class="form-group">
          <label>Photos</label>
          <input type="file" name="photo" class="form-control">
          <img class="img-thumbnail mt-2" width="300px" src="{{ asset('/storage/'.$data->photo)}}" alt="{{ asset('/storage/'.$data->photo)}}">
        </div>
  
        <div class="form-group">
          <button type="submit" class="btn btn-success"><i class="fas fa-save mr-2" style="color: #000000;"></i>Simpan</button>
        </div>
      </form>
    </div>
    
</div>

@endsection