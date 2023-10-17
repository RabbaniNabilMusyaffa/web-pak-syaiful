@extends('admin.admin')
@section('title', 'Master Project')
@section('content-title', 'Master Project')

@section('content')

@if (Session::has('message'))
        <div class="alert alert-success">
          {{Session::get('message')}}
        </div>
        @elseif (Session::has('validation'))
        <div class="alert alert-danger">
          {{Session::get('validation')}}
        </div>
    @endif

<div class="row">
  <div class="col-lg-5">
    <div class="card shadow">
      <div class="card-header">
        <h4 class="text-center">Data Siswa</h4>
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>No. </th>
              <th>Nama </th>
              <th>Action </th>
            </tr>
          </thead>
          @foreach ($datas as $data)
          <tr>
            <td>{{$loop -> iteration}}</td>
            <td>{{$data -> name}}</td>
            <td>
              <a class="btn btn-info" onClick="show({{$data->id}})"><i class="fas fa-folder-open"></i></a>
              <a class="btn btn-success" href="{{route('project.add', $data -> id)}}"><i class="fas fa-plus"></i></a>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
  <div class="col-lg-7">
    <div class="card shadow">
      <div class="card-header">
        <h1 class="text-center">Daftar Project</h1>
      </div>
      <div id="project" class="card-body">
        <h6 class="text-center">Silahkan pilih siswa terlebih dahulu</h6>
      </div>
    </div>
  </div>
</div>

<script>
  function show (id) {
    $.get('project/'+id, function (data) {
      $('#project').html(data);
    })
  }
</script>

@endsection
