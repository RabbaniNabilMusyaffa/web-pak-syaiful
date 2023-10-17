@extends('admin.admin')
@section('title', 'Master Siswa')
@section('content-title', 'Master Siswa')

@section('content')

  <div class="card-shadow">
    <div class="card-header">
      <a href="{{route('siswa.create')}}" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Tambah</a>
    </div>
  </div>
    
  <div class="card-body mt-2 col-lg-12" >
    @if (Session::has('message'))
        <div class="alert alert-success">
          {{Session::get('message')}}
        </div>
        @elseif (Session::has('validation'))
        <div class="alert alert-danger">
          {{Session::get('validation')}}
        </div>
    @endif


    <div class="card-body w-100 d-flex justify-content-between">
      <table class="table">
        <thead>
          <tr>
            <th class="text-center" scope="col">No. </th>
            <th class="text-center" scope="col">Nama</th>
            <th class="text-center" scope="col">Tentang</th>
            <th class="text-center" scope="col">Foto</th>
            <th class="text-center" scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($siswas as $siswa)
          <tr>
            <th class="text-center" scope="row">{{$loop -> iteration}}</th>
            <td class="text-center">{{$siswa -> name}}</td>
            <td class="text-center">{{$siswa -> about}}</td>
            <td class="text-center">
              <img src="{{asset('/storage/'.$siswa->photo)}}" width="200px" style="border-radius: 50px;" alt="">
            </td>
            <td class="text-center"> 
              <form action="{{route('siswa.delete', $siswa->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('delete')
                <a class="btn btn-warning" href="{{ route ('siswa.edit', $siswa->id) }}">
                  <i class="fas fa-edit" style="color: #000000;"></i>
                  Edit
               </a>
               <button role="button" class="btn btn-danger deleteButton">
                <i class="fas fa-trash" style="color: #000000;"></i>
                Delete
              </button>
            
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
  // Menangani klik tombol "Delete"
    $('.deleteButton').click(function (e) {
    e.preventDefault(); // Mencegah form dikirim secara langsung
    
    const form = $(this).closest('form'); // Find the nearest form element
    
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger mr-2'
      },
      buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
      title: 'Sudah Yakin?',
      text: "Perubahan tidak akan bisa dikembalikan",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yakin',
      cancelButtonText: 'Tidak',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        // Jika pengguna mengonfirmasi, kirim form penghapusan
        form.submit(); // Submit only the form associated with the clicked button
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        swalWithBootstrapButtons.fire(
          'Dibatalkan',
          'Tidak ada perubahan terhadap data ini',
          'error'
        );
      }
    });
  });
});
</script>





@endsection
