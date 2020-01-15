<!-- Modal -->
<div class="modal fade" 
@if (isset($row))
id="modalEdit{{$row->id}}"
@else
id="modalTambah"
@endif
tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
    <div class="modal-content bg-secondary">

        <div class="modal-header">
            <h6 class="modal-title" id="modal-title-default">
                @if (isset($row))
                    <i class="fas fa-user-edit pr-3 pt-1 text-warning"></i><span class="text-warning">Edit Profil</span></h6>
                @else
                    <i class="fas fa-plus pr-3 pt-1 text-primary"></i><span class="text-primary">Tambah Data</span></h6>
                @endif
                
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @if (isset($row))
            <form action="{{ url('/admin/'.$row->id) }}" method="post" enctype="multipart/form-data">
            @method('patch')
            @else
            <form action="{{url('admin')}}" method="post" enctype="multipart/form-data" id="form">
            @endif
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nik">NIA</label>
                        <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input class="form-control nik @error('nia') is-invalid @enderror" name="nia" placeholder="Nomer Identitas Admin" 
                        @if (isset($row))
                        value="{{$row->nia}}" id="nia" 
                        @else
                        value="{{ old('nia') }}"
                        @endif                
                        type="text">        
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input class="form-control @error('nama') is-invalid @enderror" autocomplete="off" name="nama" placeholder="Nama Lengkap (KTP)" 
                        @if (isset($row))
                        value="{{$row->nama}}" id="nama" 
                        @else
                        value="{{ old('nama') }}" 
                        @endif
                        type="text">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password"
                        @if (isset($row))
                        value="{{$row->password}}" id="password"
                        type="password"
                        @else
                        value="123456" 
                        type="text">
                        @endif
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <div class="modal-footer" >
                @if (isset($row))    
                <button type="submit" class="btn btn-warning">Simpan</button>
                <button type="button" class="btn btn-link text-warning  ml-auto" data-dismiss="modal">Close</button>                
                @else
                <button type="submit" class="btn btn-primary">Tambah</button>
                <button type="button" class="btn btn-warning" id="reset">Reset Form</button>
                <button type="button" class="btn btn-link ml-auto" data-dismiss="modal">Close</button>
                @endif
        </div>
        </div>             
    </form>
    </div>
</div>
<!-- End Modal -->