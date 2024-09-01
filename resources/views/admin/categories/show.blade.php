@extends('layouts.master')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h4>{{ $categories->kode }}</h4>
                    <p class="tmt-3">
                        {!! $categories->nama !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
