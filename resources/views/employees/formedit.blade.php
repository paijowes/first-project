@extends('layouts.main')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Form Data Karyawan
        </div>
        <div class="card-body">
            <button class="btn btn-sm btn-warning" type="button" onclick="window.location.href = '{{ url('employees') }}'">Kembali</button>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('employees/'.$txtnip) }}">
                @csrf
                @method('PUT')
                <div class="form-group row mb-3">
                    <label for="txtnip" class="col-sm-2 col-form-label">NIP</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control-plaintext " id="txtnip" name="txtnip" value="{{ $txtnip }}" readonly>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="txtname" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-sm " id="txtname" name="txtname" value="{{ $txtname }}">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="txtgender" class="col-sm-2 col-form-label">Gender</label>
                    <div class="col-sm-4">
                        <select class="form-select form-select-sm @error('txtgender') is-invalid @enderror" name="txtgender" id="txtgender">
                            <option value="" selected>Pilih</option>
                            <option value="M" {{ $txtgender== 'M' ? 'selected' : '' }}>Male</option>
                            <option value="F" {{ $txtgender== 'F' ? 'selected' : '' }}>Female<option>
                        </select>
                        @error('txtgender')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="txtalamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control form-control-sm @error('txtalamat') is-invalid @enderror" id="txtalamat" name="txtalamat">{{ $txtalamat }}</textarea>
                        @error('txtalamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="txtemail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control form-control-sm @error('txtemail') is-invalid @enderror" id="txtemail" name="txtemail" value="{{ $txtemail }}">
                        @error('txtemail')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>
                <div class="form-group row mb-3">
                    <label for="txtnotelp" class="col-sm-2 col-form-label">No Telp</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-sm @error('txtnotelp') is-invalid @enderror" id="txtnotelp" name="txtnotelp" value="{{ $txtnotelp }}">
                        @error('txtnotelp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-4 offset-sm-2">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
