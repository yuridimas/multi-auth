@extends('layouts.app')

@section('content')
<div class="container">
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
                            @foreach ($users as $item)
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

                                    @forelse ($item->socialaccounts as $social)

                                    @if ($social->type == 'google')
                                    <span class="badge badge-danger">Google</span>
                                    @elseif ($social->type == 'facebook')
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
</div>
@endsection