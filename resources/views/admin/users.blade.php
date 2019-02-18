@extends('layouts.admin')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Listado de Usuarios</h3>
            
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr class="{{ ($user->active == 0) ? 'danger' : '' }}">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach ($user->roles()->pluck('name') as $role)
                                <span class="label label-default">{{ $role }}</span>
                            @endforeach
                        </td>
                        <td>
                            @if (Auth::id() != $user->id)
                                <button type="button" class="btn-modal-change-role btn btn-info btn-sm" data-userid="{{ $user->id }}" data-userrole="{{ $role }}">Change role</button>
                               
                            @endif
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5">No results</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
 
<div class="modal fade" id="roleModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Change role</h3>
            </div>
            <div class="modal-body">
                
            </div>
        </div>
    </div>
</div>
 
@endsection