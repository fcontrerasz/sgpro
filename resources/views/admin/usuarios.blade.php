@extends('layouts.admin')
 
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <transition name="ini-anim" enter-active-class="animated flipInX" leave-active-class="animated fadeOut" >
                <listar-usuarios-component></listar-usuarios-component>
            </transition>
        </div>
    </div>
    <div class="row hide">
        <div class="col-md-10 col-md-offset-1">
            <h3>Listado de Usuarios</h3>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-5 m-b-xs"><select class="input-sm form-control input-s-sm inline">
                                    <option value="0">Option 1</option>
                                    <option value="1">Option 2</option>
                                    <option value="2">Option 3</option>
                                    <option value="3">Option 4</option>
                                </select>
                                </div>
                                <div class="col-sm-4 m-b-xs">
                                    <div data-toggle="buttons" class="btn-group">
                                        <label class="btn btn-sm btn-white"> <input type="radio" id="option1" name="options"> Day </label>
                                        <label class="btn btn-sm btn-white active"> <input type="radio" id="option2" name="options"> Week </label>
                                        <label class="btn btn-sm btn-white"> <input type="radio" id="option3" name="options"> Month </label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
                                </div>
                            </div>

                             
                            
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>

                                        <th>#</th>
                                        <th>Nombre Completo</th>
                                        <th>Usuario</th>
                                        <th>Perfil</th>
                                        <th>Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    	 @forelse ($users as $user)
					                    <tr class="{{ ($user->activo == 0) ? 'danger' : '' }}">
					                        <td>{{ $user->idusuario }}</td>
					                        <td>{{ $user->name }}</td>
					                        <td>{{ $user->email }}</td>
					                        <td>
					                            @foreach ($user->roles()->pluck('perfil_glosa') as $role)
					                                <span class="label label-default">{{ $role }}</span>
					                            @endforeach
					                        </td>
					                        <td>
					                            @if (Auth::id() != $user->idusuario)
					                                <a class="btn btn-white btn-bitbucket"><i class="fa fa-exchange"></i></a>
					                            @endif
					                             <a class="btn btn-white btn-bitbucket"><i class="fa fa-pencil"></i></a>
					                             <a class="btn btn-white btn-bitbucket"><i class="fa fa-trash"></i></a>
					                        </td>
					                    </tr>
					                    @empty
					                        <tr>
					                            <td colspan="6">No existen usuarios</td>
					                        </tr>
					                    @endforelse


                                    </tbody>
                                </table>


                            </div>

                            <usuarios-component></usuarios-component>

                        </div>
                    </div>
         </div>
    </div>
</div>
@endsection

@section('scripts')



@endsection