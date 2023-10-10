@extends('admin.admin')
@section('title', 'Tambah Siswa')
@section('content')

<div class="card">
    <div class="card-body">
        <h3 class="card-title">
            Tambah Data Siswa
        </h3>
    </div>

    <div class="card-shadow">
      <div class="card-header">
        <a href="{{route('siswa.index')}}" class="btn btn-danger"><i class="fas fa-arrow-left mr-2"></i>Back</a>
      </div>
    </div>
    
    <div class="card-body">
      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
          @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
          @endforeach
        </ul>
        </div>
      @endif
      <form action="{{route('siswa.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="name" class="form-control">  
        </div>
  
        <div class="form-group">
          <label for="">About</label>
          <textarea name="about" class="form-control" ></textarea>
        </div>
  
        <div class="form-group">
          <label>Photos</label>
          <input type="file" name="photo" class="form-control">
        </div>
  
        <div class="form-group mt-5">
          <button type="submit" class="btn btn-success"><i class="fas fa-save mr-2"></i>Submit</button>
        </div>
      </form>
    </div>
    
</div>

@endsection