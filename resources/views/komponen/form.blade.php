{{-- Package Form Laravel Collective  --}}
{!! Form::model($model, [
    'route' => 'karyawan.store',
    'method' => 'POST'
]) !!}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">NIK</label>
                <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                {!! Form::text('nik', null, [
                    'class' => 'form-control ' . ( $errors->has('nik') ? ' is-invalid' : '' ),
                    'id' => 'nik',
                    'placeholder' => 'NIK'
                ]) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Password</label>
                <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-people"></i></span>
                    </div>
                {!! Form::text('password', '123456', [
                    'class' => 'form-control ' . ( $errors->has('password') ? ' is-invalid' : '' ),
                    'id' => 'password'
                ]) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Nama</label>
                <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                {!! Form::text('nama', null, [
                    'class' => 'form-control  ' . ( $errors->has('nama') ? ' is-invalid' : '' ),
                    'id' => 'nama',
                    'placeholder' => 'Sesuai KTP'
                ]) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Email</label>
                <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-people"></i></span>
                    </div>
                {!! Form::email('email', null, [
                    'class' => 'form-control ' . ( $errors->has('email') ? ' is-invalid' : '' ),
                    'id' => 'email',
                    'placeholder' => 'Email Aktiv'
                ]) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Pendidikan</label>
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                    {!! Form::text('pendidikan', null, [
                        'class' => 'form-control ' . ( $errors->has('pendidikan') ? ' is-invalid' : '' ),
                        'id' => 'pendidikan',
                        'placeholder' => 'Pendidikan Terakhir (Jurusan)'
                    ]) !!}
                    </div>
                </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Kontak</label>
                <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-people"></i></span>
                    </div>
                {!! Form::text('phone', null, [
                    'class' => 'form-control ' . ( $errors->has('phone') ? ' is-invalid' : '' ),
                    'id' => 'phone',
                    'placeholder' => 'Nomer Aktiv'
                ]) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Tempat Lahir</label>
                <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                {!! Form::text('tempat_lahir', null, [
                    'class' => 'form-control ' . ( $errors->has('tempat_lahir') ? ' is-invalid' : '' ),
                    'id' => 'tempat_lahir',
                    'placeholder' => 'Kota Lahir'
                ]) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Tanggal Lahir</label>
                <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-people"></i></span>
                    </div>
                {!! Form::date('tgl_lahir', null, [
                    'class' => 'form-control datepicker ' . ( $errors->has('tgl_lahir') ? ' is-invalid' : '' ),
                    'id' => 'tgl_lahir',
                    'data-date-format' => 'dd/mm/yyyy',
                    'data-date' => 'dd/mm/yyyy',
                    'placeholder' => 'Tanggal/Bulan/Tahun'
                ]) !!}
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="">Alamat</label>
                {!! Form::textarea('alamat', null, [
                    'class' => 'form-control ' . ( $errors->has('alamat') ? ' is-invalid' : '' ),
                    'id' => 'alamat',
                    'placeholder' => 'Sesuai KTP'
                ]) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Kontrak</label>
                {!! Form::select('kontrak',  ['Ya','Tidak'], [
                    'class' => 'form-control ',
                    'data-toggle' => 'select',
                    'data-placeholder' => 'Pilih -'
                ]) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Cabang</label>
                {!! Form::select('cabang', ['Malang','Surabaya'], [
                    'class' => 'form-control ',
                    'data-toggle' => 'select',
                    'data-placeholder' => 'Pilih -'
                ]) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Jabatan</label>
                {!! Form::select('jabatan',  $jabatan->pluck('jabatan'), [
                    'class' => 'form-control ',
                    'data-toggle' => 'select',
                    'data-placeholder' => 'Pilih -'
                ]) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Departemen</label>
                {!! Form::select('departemen',  $departemen->pluck('departemen'), [
                    'class' => 'form-control ',
                    'data-toggle' => 'select',
                    'data-placeholder' => 'Pilih -'
                ]) !!}
            </div>
        </div>

    </div>
    
{!! Form::close() !!}