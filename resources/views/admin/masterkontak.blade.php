@extends('admin.admin')
@section('title', 'Master Kontak')

@section('content')

  <div class="card">
    <div class="card-body w-100 d-flex justify-content-between">
      <h3 class="card-title">Master Kontak</h3>
      <a href="{{route('tambahK')}}" class="btn btn-primary"><i class="fas fa-plus"></i>Tambah</a>
    </div>
  </div>

  <div class="card mt-3">
    <div class="card-body w-100 d-flex justify-content-between">
      <table class="table mt-2">
        <thead>
          <tr>
            <th class="text-center" scope="col">No.</th>
            <th class="text-center" scope="col">Nama</th>
            <th class="text-center" scope="col">Kelas</th>
            <th class="text-center" scope="col">Jurusan</th>
            <th class="text-center" scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th class="text-center" scope="row">1</th>
            <td class="text-center">Rabbani Nabil Musyaffa</td>
            <td class="text-center">12 RPL 2</td>
            <td class="text-center">Rekayasa Perangkat Lunak</td>
            <td class="text-center"> 
              <a href="" class="btn btn-warning">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/></svg></i>Edit</a>
              <a href="" class="btn btn-danger">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M576 128c0-35.3-28.7-64-64-64H205.3c-17 0-33.3 6.7-45.3 18.7L9.4 233.4c-6 6-9.4 14.1-9.4 22.6s3.4 16.6 9.4 22.6L160 429.3c12 12 28.3 18.7 45.3 18.7H512c35.3 0 64-28.7 64-64V128zM271 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/>
              
                </svg>Hapus</a>
            </td>
          </tr>
        </tbody>
      </table>
    
    </div>
  </div>
  

@endsection
