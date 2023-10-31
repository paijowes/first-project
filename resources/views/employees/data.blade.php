@extends('layouts.main')

@section('content')
<div class="container">
    <div class="card">
      <div class="card-header">
        Data Karyawan
      </div>
      <div class="card-body">
        @if (session('msg'))
        <div class="alert alert-success alert-dismissable fade show" role="alert">
            {{ session('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <button class="btn btn-sm btn-primary" type="button" onclick="window.location.href = '{{ url('employees/add') }}'">Tambah Data
        </button>
      </div>
      <div class="container">
      <form method="GET">
        <div class="form-group row mb-3">
            <label for="search" class="col-sm-2 col-form-label">Cari Data</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm"  name="search" placeholder="Masukkan kata kunci" autofocus value='{{ $search }}'>
            </div>
        </div>
      </form>
      <table class='table table-sm table-striped table-bordered'>
          <thead>
              <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>NIP</th>
                  <th>Gender</th>
                  <th>Alamat</th>
                  <th>Email</th>
                  <th>No Telp</th>
                  <th>#</th>
              </tr>
          </thead>
          <tbody>
            @php
                $nomor = 1 + (($employees -> currentPage() -1) * $employees->perPage());
            @endphp
            @foreach ($employees as $row)
              <tr>
                    <td>{{ $nomor++ }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->nip }}</td>
                    <td>{{ $row->JenisKelamin }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->notelp }}</td>
                    <td>
                        <button onclick="window.location='{{ url('employees/'.$row->nip) }}'" type="button" class="btn btn-success btn-sm" title="Edit Data">Edit</button>
                        <form onsubmit="return deleteData ('{{ $row->nama }}')" style="display: inline" method="POST" action="{{ url('employees/'.$row->nip) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Hapus Data" class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                        </form>
                    </td>
            @endforeach
              </tr>
          </tbody>
      </table>
    </div>
      {{-- {{ $employees->links() }} --}}
      {!!  $employees->appends(Request::except('page'))->render() !!}
    </div>
</div>
<script>
function deleteData (nama){
    pesan = confirm (`Apakah anda ingin menghapus data dari ${nama}?`);
    if(pesan) return true;
    else return false;
}
</script>

@endsection
