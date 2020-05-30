
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <?php $res = \App\Resource::where('public_link', $path.'/'.$subpath)->first() ?>
                        @if($res)
                            <div class="row" role="alert">
                                <div class="col-4"><a class="btn btn-primary" href="{{ url('get/'.$res-> public_link)}}">Download</a></div>
                                <div class="col-4">Filename: {{substr($res->file_name,strripos($res->file_name,'/')+1)}}</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
