@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Rol {{$role->name}}</h2></div>

                    <div class="card-body">
                        @include('custom.message')



                        <form action="{{ route('role.update', $role->id)}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="container">

                                 <div class="form-group">
                                    <input type="text" class="form-control"
                                           id="name"
                                           placeholder="Name"
                                           name="name"
                                           value="{{ old('name', $role->name)}}"
                                           readonly>
                                </div>
                                <div class="form-group">
                                    <input type="text"
                                           class="form-control"
                                           id="slug"
                                           placeholder="Slug"
                                           name="slug"
                                           value="{{ old('slug' , $role->slug)}}"
                                           readonly>
                                </div>

                                <div class="form-group">

                                    <textarea  readonly class="form-control" placeholder="Description" name="description" id="description" rows="3">{{old('description', $role->description)}}</textarea>
                                </div>

                                <hr>

                                <h3>Full Access</h3>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input disabled type="radio" id="fullaccessyes" name="full-access" class="custom-control-input" value="yes"
                                           @if ( $role['full-access']=="yes")
                                           checked
                                           @elseif (old('full-access')=="yes")
                                           checked
                                        @endif


                                    >
                                    <label class="custom-control-label" for="fullaccessyes">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input disabled type="radio" id="fullaccessno" name="full-access" class="custom-control-input" value="no"

                                           @if ( $role['full-access']=="no")
                                           checked
                                           @elseif (old('full-access')=="no")
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
                                               disabled
                                               class="custom-control-input"
                                               id="permission_{{$permiso->id}}"
                                               value="{{$permiso->id}}"
                                               name="permission[]"

                                               @if( is_array(old('permission')) && in_array("$permiso->id", old('permission'))    )
                                               checked

                                               @elseif( is_array($permiso_role) && in_array("$permiso->id", $permiso_role)    )
                                               checked

                                            @endif
                                        >
                                        <label class="custom-control-label"
                                               for="permission_{{$permiso->id}}">
                                            {{ $permiso->id }}
                                            -
                                            {{ $permiso->name }}
                                            <em>( {{ $permiso->description }} )</em>

                                        </label>
                                    </div>


                                @endforeach
                                <hr>

                                <a class="btn btn-success" href="{{route('role.edit',$role->id)}}">Editar <i class="fas fa-pen"></i></a>
                                <a class="btn btn-danger" href="{{route('role.index')}}">Volver <i class="fas fa-chevron-circle-left"></i></a>








                            </div>




















                        </form>








                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
