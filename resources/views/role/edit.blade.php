@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Editar Rol</h2></div>

                    <div class="card-body">
                        @include('custom.message')



                        <form action="{{ route('role.update', $role->id)}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="container">



                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           id="name"
                                           placeholder="Nombre"
                                           name="name"
                                           value="{{ old('name', $role->name)}}"
                                    >
                                </div>
                                <div class="form-group">
                                    <input type="text"
                                           class="form-control"
                                           id="slug"
                                           placeholder="Slug"
                                           name="slug"
                                           value="{{ old('slug' , $role->slug)}}"
                                    >
                                </div>

                                <div class="form-group">

                                    <textarea class="form-control" placeholder="Description" name="description" id="description" rows="3">{{old('descripcion', $role->descripcion)}}</textarea>
                                </div>

                                <hr>

                                <h3>Full Access</h3>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="fullaccessyes" name="full-access" class="custom-control-input" value="si"
                                           @if ( $role['full-access']=="si")
                                           checked
                                           @elseif (old('full-access')=="si")
                                           checked
                                        @endif


                                    >
                                    <label class="custom-control-label" for="fullaccessyes">si</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="fullaccessno" name="full-access" class="custom-control-input" value="no"

                                           @if ( $role['full-access']=="no")
                                           checked
                                           @elseif (old('full-access')=="no")
                                           checked
                                        @endif


                                    >
                                    <label class="custom-control-label" for="fullaccessno">No</label>
                                </div>

                                <hr>

                                <h3>Lista de permisos</h3>


                                @foreach($permisos as $permiso)


                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox"
                                               class="custom-control-input"
                                               id="permiso_{{$permiso->id}}"
                                               value="{{$permiso->id}}"
                                               name="permiso[]"

                                               @if( is_array(old('permiso')) && in_array("$permiso->id", old('permiso'))  )
                                               checked

                                               @elseif( is_array($permiso_role) && in_array("$permiso->id", $permiso_role)  )
                                               checked

                                            @endif
                                        >
                                        <label class="custom-control-label"
                                               for="permiso_{{$permiso->id}}">
                                            {{ $permiso->id }}
                                            -
                                            {{ $permiso->name }}
                                            <em>( {{ $permiso->descripcion }} )</em>

                                        </label>
                                    </div>


                                @endforeach
                                <hr>
                                <input class="btn btn-primary" type="submit" value="Guardar">

                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
