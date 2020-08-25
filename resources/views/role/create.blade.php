@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Create Role</h2></div>

                    <div class="card-body">

                        @include('custom.message')

                        <form action="{{ route('role.store')}}" method="POST">
                            @csrf

                            <div class="container">

                                <h3>Required data</h3>

                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           id="name"
                                           placeholder="Nombre"
                                           name="name"
                                           value="{{ old('name')}}"
                                    >
                                </div>
                                <div class="form-group">
                                    <input type="text"
                                           class="form-control"
                                           id="slug"
                                           placeholder="Slug"
                                           name="slug"
                                           value="{{ old('slug')}}"
                                    >
                                </div>

                                <div class="form-group">

                            <textarea class="form-control" placeholder="Descripción" name="descripcion" id="description" rows="3">
                             {{ old('descripcion')}}
                            </textarea>
                                </div>

                                <hr>

                                <h3>Full Access</h3>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="fullaccessyes" name="full-access" class="custom-control-input" value="si"
                                           @if (old('full-access')=="si")
                                           checked
                                        @endif


                                    >
                                    <label class="custom-control-label" for="fullaccessyes">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="fullaccessno" name="full-access" class="custom-control-input" value="no"
                                           @if (old('full-access')=="no")
                                           checked
                                           @endif
                                           @if (old('full-access')===null)
                                           checked
                                        @endif

                                    >
                                    <label class="custom-control-label" for="fullaccessno">No</label>
                                </div>

                                <hr>


                                <h3>Permission List</h3>


                                @foreach($permisos as $permiso)


                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox"
                                               class="custom-control-input"
                                               id="permiso_{{$permiso->id}}"
                                               value="{{$permiso->id}}"
                                               name="permiso[]"

                                               @if( is_array(old('permiso')) && in_array("$permiso->id", old('permiso'))    )
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
