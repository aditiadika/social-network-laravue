@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="text-center">
                        {{ $users->name }} 's Profile
                    </p>
                </div>
                <div class="panel-body">
                    <center>
                        <img src="{{ Storage::url($users->avatar) }}" alt="" width="70px" height="70px" style="border-radius: 50px;">
                    </center>
                    <br>
                    <p class="text-center">
                        {{ $users->profile->location }}
                    </p>
                    <p class="text-center">
                        @if(Auth::id() == $users->id)
                            <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-info">Edit Your Profile</a>
                        @endif
                    </p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="text-center">
                        About me
                    </p>
                </div>
                <div class="panel-body">
                    <p class="text-center">
                        {{ $users->profile->about }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection