@extends('layouts.admin')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success text-white" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7 card">
        <div class="container border-bottom">
            <div class="row justify-space-between py-2">
                <div class="col-4 me-auto">
                    <p class="lead text-dark pt-1 mb-0">List of All Users</p>
                </div>
            </div>
        </div>
        <div class="card-body p-2">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Email</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Username</th>
                            <th width="8%" class="text-uppercase text-secondary text-xxs font-weight-bolder">Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-sm font-weight-normal mb-0">{{ $user->name }}</td>
                                <td class="text-sm font-weight-normal mb-0">{{ $user->email }}</td>
                                <td class="text-sm font-weight-normal mb-0">{{ $user->username }}</td>
                                <td class="justify-content-center d-flex">
                                    <a href="{{ route('admin.user.edit', $user->uuid) }}" class="text-info px-1 btn edit"
                                        title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.user.destroy', $user->uuid) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-danger px-1 btn delete" title="delete">
                                            <span class="btn-inner--icon">
                                                <i class="fa fa-trash"></i>
                                            </span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
