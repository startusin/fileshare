@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @auth
                        <div class="row">
                        <div class="col-6">
                        <a href="/load">Upload file</a>
                        </div>
                        <div class="col-5">
                        <a href="/profile">File list</a></div></div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
