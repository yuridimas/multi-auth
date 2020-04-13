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

    @if($user->is_admin == 1)
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Users</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Type</td>
                                <td>Social Account</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allUsers as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @if ($item->is_admin == 1)
                                    <span class="badge badge-success">Administrator</span>
                                    @else
                                    <span class="badge badge-info">User</span>
                                    @endif
                                </td>
                                <td>

                                    @forelse ($item->socialaccounts() as $social)

                                    @if ($social->socialaccounts()->type == 'google')
                                    <span class="badge badge-danger">Google</span>
                                    @elseif ($social->socialaccounts()->type == 'facebook')
                                    <span class="badge badge-primary">Facebook</span>
                                    @else
                                    <span class="badge badge-primary">Facebook</span>
                                    <span class="badge badge-danger">Google</span>
                                    @endif

                                    @empty
                                    <span class="badge badge-secondary">Not Integrated</span>
                                    @endforelse
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection