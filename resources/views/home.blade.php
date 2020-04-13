@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @include('includes.alert')
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-4">Name</div>
                                <div class="col-sm-8">{{ $user->name }}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">Email</div>
                                <div class="col-sm-8">{{ $user->email }}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">Type</div>
                                <div class="col-sm-8">
                                    @if ($user->is_admin == 1)
                                    <span class="badge badge-success">Administrator</span>
                                    @elseif ($user->is_admin == 0)
                                    <span class="badge badge-info">User</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            @if ($socialGoogle == true && $socialFacebook == false)
                            <div class="alert alert-danger">Connected <strong>Google</strong> Account</div>
                            @elseif ($socialFacebook == true && $socialGoogle == false)
                            <div class="alert alert-primary">Connected <strong>Facebook</strong> Account</div>
                            @elseif ($socialGoogle == true && $socialFacebook == true)
                            <div class="alert alert-primary">Connected <strong>Facebook</strong> Account</div>
                            <div class="alert alert-danger">Connected <strong>Google</strong> Account</div>
                            @else
                            <div class="alert alert-secondary"><strong>Not Integrated</strong> Social Account</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
@endsection