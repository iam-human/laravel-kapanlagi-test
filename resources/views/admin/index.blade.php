@extends('layout.main')
@section('title','Data Admin')
@section('navbar')
<body>
@include('layout.navbar')
@endsection
@section('container')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
          <div class="header-body">
            <br> 
          </div>
        </div>
      </div>
      <div class="container-fluid mt--6">
        <!-- Table -->
        <div class="row">
          <input type="hidden" class="angka" value="100">
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="card-header">
                {{-- {{dd($jabatan)}} --}}
                <div class="row align-items-center">
                  <div class="col-lg-6 col-7 title-card">
                    <h3 class="mb-0">Data Admin <?php echo date("Y"); ?></h3>
                    <p class="text-sm mb-0">
                      * Data ini dapat berubah sewaktu - waktu
                    </p>
                  </div>
                  <div class="col-lg-6 col-5 text-right super-btn" style="position: reative; padding-right: 105px;" >
                    {{-- Tambah  --}}
                    <button class="btn btn-custom btn-sm btn-icon btn-primary" type="button"  id="tambah">
                      <span><i class="fas fa-plus"></i></span>
                      <span class="btn-inner--text">Tambah</span>
                    </button>
                    {{-- <a href="{{route('karyawan.create')}}" class="btn btn-info btn-sm btn-icon btn-custom modal-show" title="Tambah Data">
                      <span><i class="fas fa-file-import"></i></span>
                      <span class="btn-inner--text">Tambah</span>
                    </a> --}}
                  </div>
                  {{-- @include('hrd.karyawan.md_import') --}}
                  @include('admin.md_tambah')
                </div>
              </div>
              {{-- @include('layout.with') --}}
              <span id="with"></span>
              <form action="{{url('/admin/deladmin')}}" method="post"> 
              @csrf
              <button type="submit" class="btn ml-1 btn-custom btn-sm btn-icon btn-danger" style="position: absolute; right: 15px; top: 30px;"  id="hapus">
                <span><i class="fas fa-trash-alt"></i></span>
                <span class="btn-inner--text">Hapus</span>
              </button>
              <div class="table-responsive py-3" id="load">
                <table class="table table-flush" id="datatable-basic">
                  <thead class="thead-light">
                    <tr class="">
                      <th><input type="checkbox" class="selectall"></th>
                      <th>No.</th>
                      <th>NIA</th>
                      <th>Nama</th>
                      <th>Created At</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($admin as $row)
                    <tr class="select" id="row">
                      <td><input name="ids[]" value="{{$row->id}}" type="checkbox" class="selectbox"></td>
                      </form>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$row->nia}}</td>
                      <td>{{$row->nama}}</td>
                      <td>{{$row->created_at}}</td>
                      <td>
                          <a href="#" class="table-action text-info modal-edit" data-tooltip="tooltip" data-original-title="Edit" data-toggle="modal" data-target="#modalEdit{{$row->id}}">
                            <i class="fas fa-user-edit"></i>
                          </a>
                          <a href="#" class="table-action text-danger ini" data-tooltip="tooltip" data-original-title="Hapus" data-toggle="modal" data-target="#modalHapus{{$row->id}}">
                            <i class="fas fa-trash-alt"></i>
                          </a>
                      </td>
                      @include('admin.md_hapus')
                      @include('admin.md_tambah')
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                {{-- @include('komponen.modal') --}}
                @include('js.checkdelete')
              </div>
            </div>
          </div>
        </div>
        {{-- @include('hrd.karyawan.md_tambah') --}}
        <?php if (isset($_GET['del'])) { ?>
          @include('admin.md_delall')
          <script type="text/javascript">
              $(window).on('load',function(){
                  $('#modalDelall').modal('show');
              });
          </script>
        <?php } ?>
@endsection
@section('footer')
@include('layout.footer')
</body>
@endsection