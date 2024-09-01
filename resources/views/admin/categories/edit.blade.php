@extends('layouts.master')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('categories.update', $categories->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">KODEL</label>
                            <input type="text" class="form-control @error('kode') is-invalid @enderror" name="kode" value="{{ old('kode', $categories->kode) }}" placeholder="Masukkan Kode">

                            <!-- error message untuk kode -->
                            @error('kode')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">NAMA</label>
                            <textarea class="form-control @error('nama') is-invalid @enderror" name="nama" rows="5" placeholder="Masukkan Nama">{{ old('nama', $categories->nama) }}</textarea>

                            <!-- error message untuk nama -->
                            @error('nama')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
