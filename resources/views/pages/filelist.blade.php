@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">File Name</th>
                            <th scope="col">Info</th>
                            <th scope="col">Link</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach (\App\Resource::where('user_id', Auth::user()->id)->get() as $item)
                            <tr>
                                <td>{{ substr($item->file_name, strripos($item->file_name,'/') + 1) }}</td>
                                <td><a href="{{ url('info/'.$item->public_link)}}">Info</a></td>
                                <td><input type="text" value="{{ url('get/'.$item-> public_link)}}" /></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
