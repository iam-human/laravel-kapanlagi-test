<form action="{{url('/karyawan')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nik">NIK</label>
                <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input id="nik" class="form-control @error('nik') is-invalid @enderror" name="nik" placeholder="NIK" type="text">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" value="123456">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="nama">Nama</label>
                <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input class="form-control @error('nama') is-invalid @enderror" autocomplete="off" name="nama" placeholder="Nama Lengkap (KTP)" type="text">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text @error('nama') is-invalid @enderror"><i class="fas fa-envelope"></i></span>
                </div>
                <input class="form-control" name="email" autocomplete="off" placeholder="Email Aktiv" type="email">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="pendidikan">Pendidikan</label>
                <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-school"></i></span>
                </div>
                <input class="form-control @error('pendidikan') is-invalid @enderror" name="pendidikan" autocomplete="off" placeholder="Pendidikan Terakhir" type="text">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="phone">Phone</label>
                <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
                <input class="form-control @error('phone') is-invalid @enderror" name="phone" autocomplete="off" placeholder="Nomer Telfon Aktiv" type="text">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                </div>
                <input class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" autocomplete="off" placeholder="Tempat Lahir" type="text">
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
                <input data-date-format="dd/mm/yyyy" data-date="dd/mm/yyyy" class="form-control datepicker @error('tgl_lahir') is-invalid @enderror" autocomplete="off" name="tgl_lahir" placeholder="Tanggal Lahir" type="date">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="alamat">Alamat</label>    
                <textarea class="text-left form-control @error('alamat') is-invalid @enderror" autocomplete="off" rows="3" name="alamat" placeholder="Alamat Lengkap (KTP)">{{ old('alamat') }}</textarea>
                </textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="kontrak">Kontrak</label>
                <select class="form-control @error('kontrak') is-invalid @enderror" data-toggle="select" data-placeholder="Pilih -" name="kontrak">
                    <option></option>
                    <option>Ya</option>
                    <option>Tidak</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="cabang">Cabang</label>
                <select class="form-control @error('cabang') is-invalid @enderror" data-toggle="select" data-placeholder="Pilih -" name="cabang">
                    <option></option>
                    <option>Malang</option>
                    <option>Surabaya</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <select class="form-control @error('id_jabatan') is-invalid @enderror" data-toggle="select" data-placeholder="Pilih -" name="id_jabatan">
                    <option></option> 
                    @foreach ($jabatan as $jbt) 
                        <option value="{{$jbt->kode}}">{{$jbt->jabatan}}</option>  
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="departemen">Departemen</label>
                <select class="form-control @error('id_departemen') is-invalid @enderror" data-toggle="select" data-placeholder="Pilih -" name="id_departemen">
                    <option></option>
                    @foreach ($departemen as $dpt)
                        <option value="{{$dpt->kode}}">{{$dpt->departemen}}</option> 
                    @endforeach
                </select>
            </div>
        </div>   
    </div>
</form>