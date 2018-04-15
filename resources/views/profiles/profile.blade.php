@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    {{ $users->name }} 's Profile
                </div>
                <div class="panel panel-body">
                    <img src="{{ Storage::url($users->avatar) }}" alt="" width="70px" height="70px" style="border-radius: 50px;">
                </div>
            </div>
        </div>
    </div>
@endsection