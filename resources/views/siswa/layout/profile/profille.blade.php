@extends('siswa.main_siswa')
@section('profille')
    <div class="col-md-8 mx-auto" >
        @foreach ($profille as $p)
        <div class="text-center">
            <div class="m-3">
                <img src="{{ asset('post_image/' .  $p->foto_siswa ) }}" id="preview" class="rounded" alt="Cinque Terre" height="0%"
                    width="45%">
            </div>
        </div>
       
        
        <div >
            <label>NIS</label>
            <input type="text" class="form-control bg-dark" id="" value="{{ $p->nis }}" readonly>
        </div>
        
        <div>
            <label>Nama Lengkap</label>
            <input type="text" class="form-control bg-dark" id="" value="{{ $p->nama_lengkap }}" readonly>
        </div>

        <div>
            <label>Tanggal Lahir</label>
            <input type="text" class="form-control bg-dark" id="" value="{{ $p->tanggal_lahir }}" readonly>
        </div>

        <div>
            <label>Alamat</label>
            <input type="text" class="form-control bg-dark" id="" value="{{ $p->alamat }}" readonly>
        </div>

        <div>
            <label>Kelas</label>
            <input type="text" class="form-control bg-dark" id="" value="{{ $p->kelas_id }}" readonly>
        </div>

        <div>
            <label>No Hp</label>
            <input type="text" class="form-control bg-dark" id="" value="{{ $p->no_hp }}" readonly>
        </div>

        <div>
            <label>Nama Ayah</label>
            <input type="text" class="form-control bg-dark" id="" value="{{ $p->nama_ayah }}" readonly>
        </div>

        <div>
            <label>Nama Ibu</label>
            <input type="text" class="form-control bg-dark" id="" value="{{ $p->nama_ibu }}" readonly>
        </div>

        <div>
            <label>No Hp Ortu</label>
            <input type="text" class="form-control bg-dark" id="" value="{{ $p->no_hp_ortu }}" readonly>
        </div>
<br>
        <div class="text-center">
            <a href="/logout_siswa" class="btn btn-warning">Log Out</a>
        </div>
    </div>
    @endforeach
     
@endsection