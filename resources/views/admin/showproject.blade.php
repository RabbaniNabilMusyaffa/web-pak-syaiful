@if ($datas->isEmpty())
    <h6 class="text-center">Siswa belum mempunyai project</h6>
@else
  @foreach ($datas as $data)
    <div class="card">
      <div class="card-header bg-primary">
        <span style="color: white;" class="fw-bold">
          {{$data -> project_name}}
        </span>
      </div>
      <div class="card-body">
        <h6>Tanggal Project</h6>
        <p>{{$data->project_date}}</p>
        <img src="{{asset('/storage/'.$data->photo)}}" width="200px" style="border-radius: 50px;" alt="">
        {{-- {{$$data -> photo}} --}}
      </div>
      <div class="card-footer text-right">
        <form action="{{route('project.delete', $data -> id)}}" enctype="multipart/form-data" method="post">
          @csrf
          @method('delete')
          <a class="btn btn-sm btn-warning" href="{{route('project.edit', $data -> id)}}"><i class="fas fa-edit"></i>Edit</a>
          {{-- <a class="btn btn-sm btn-danger ms-3" href="{{route('project.delete', $data -> id)}}"><i class="fas fa-trash"></i>Delete</a> --}}
          <button class="btn btn-sm btn-danger ms-3" role="button"><i class="fas fa-trash"></i>Hapus</button>
        </form>
      </div>
    </div>
    <br>
  @endforeach
@endif

