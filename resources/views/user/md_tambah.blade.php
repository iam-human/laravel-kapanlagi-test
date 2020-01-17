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
        <div class="modal-body pb-0">
            @if (isset($row))
            <form action="{{ url('/registrant/'.$row->id) }}" method="post" enctype="multipart/form-data">
            @method('patch')
            @else
            <form action="{{url('registrant')}}" method="post" enctype="multipart/form-data" id="form">
            @endif
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input class="form-control @error('nama') is-invalid @enderror" autocomplete="off" name="nama" placeholder="Nama Lengkap (KTP)" id="nama" 
                        @if (isset($row))
                        value="{{$row->nama}}" 
                        @else
                        value="{{ old('nama') }}" 
                        @endif
                        type="text">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Alamat Surel</label>
                        <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input class="form-control @error('email') is-invalid @enderror" autocomplete="off" name="email" placeholder="Surel/Email Aktiv" 
                        @if (isset($row))
                        value="{{$row->email}}" id="email" 
                        @else
                        value="{{ old('email') }}" 
                        @endif
                        type="email">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Nomer Telepon</label>
                        <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input class="form-control @error('phone') is-invalid @enderror" autocomplete="off" name="phone" placeholder="Telepon Aktiv" 
                        @if (isset($row))
                        value="{{$row->phone}}" id="phone" 
                        @else
                        value="{{ old('phone') }}" 
                        @endif
                        type="phone">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input data-date-format="dd/mm/yyyy" data-date="dd/mm/yyyy" class="form-control datepicker @error('tgl_lahir') is-invalid @enderror" autocomplete="off" name="tgl_lahir" placeholder="Tanggal Lahir" 
                        @if (isset($row))
                        value="{{Carbon\Carbon::parse($row->tgl_lahir)->formatLocalized('%d/%m/%Y')}}" id="tgl_lahir"
                        @else
                        value="{{ old('tgl_lahir') }}"
                        @endif
                        type="text">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                            <select class="form-control gender @error('gender') is-invalid @enderror" data-toggle="select" data-placeholder="Pilih -" name="gender">
                            @if (isset($row))
                                <option>{{$row->gender}}</option>
                                <option>Laki - Laki</option>
                                <option>Perempuan</option>
                                <option>Lainnya</option>
                            @else
                                <option></option>
                                <option>Laki - Laki</option>
                                <option>Perempuan</option>
                                <option>Lainnya</option>
                            @endif
                            </select>
                    </div>
                </div>
                <div class="col-md-12 mb-0">
                    <div class="form-group mb-0">
                        <label for="foto">Upload Foto</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" 
                            @if (isset($row))
                            id="foto{{$row->id}}"
                            @else
                            id="viewfoto"                                
                            @endif
                            lang="en" name="foto">
                            <label class="custom-file-label text-left" style="font-size:14px !important;" for="viewfoto">
                            @if (isset($row))
                                {{$row->foto}}
                            @else
                                Pilih File
                            @endif
                            </label>
                        </div>
                        <div class="text-center mt-0 mb-0">
                            @if (isset($row))                            
                            <img style="padding-top: 10px;" src="{{asset('storage/registrant/foto/'.$row->foto)}}" class="img-fluid" id="profile-img-tag{{$row->id}}" style="width: 300px;">
                            <script>
                                $('input[type="file"]').change(function(e){
                                    var fileName = e.target.files[0].name;
                                    $('.custom-file-label').html(fileName);
                                });
                                //view photo
                                function readImg{{$row->id}}(input) {
                                    console.log(input);
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();
                                        
                                        reader.onload = function (e) {
                                            $('#profile-img-tag{{$row->id}}').attr('src', e.target.result);
                                        }
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                                $("#foto{{$row->id}}").change(function(){
                                    readImg{{$row->id}}(this);
                                });
                            </script>
                            @else
                            <img style="padding-top: 10px;" src="" class="img-fluid" id="profile-img-tag" style="width: 300px;">
                            @endif
                            @include('js.view')
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