@extends('layouts.app')
@section('title') Parametros @endsection
@section('nombre') Parametros @endsection
@section('ruta')Paramatros  @endsection
@section('content')

    @include('custom.message')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Logo inicio de sesion</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">

                        <IMG src="{{url($para->logoI)}}" class="rounded mx-auto d-block">
                        <form method="post" action="{{route('parametrizacion.update',$para->id)}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="pp" value="1">
                            <input type="file" name="logoI" class="form-control" >
                             <br />

                            <input type="submit" class="btn btn-block bg-gradient-danger btn-sm" value="Guardar">
                        </form>
                    </div>
                    <!-- /.card-body -->

                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Logo</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">

                        <IMG src="{{url($para->imagenP)}}" class="rounded mx-auto d-block">
                        <form method="post" action="{{route('parametrizacion.update',$para->id)}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="pp" value="2">
                            <input type="file" name="imagenP" class="form-control" >
                            <br />
                            <p>Nombre Logo</p>
                            <input type="text" name="nameL" value="{{old('nameL',$para->nameL)}}" class="form-control" >
                            <br />
                            <input type="submit" class="btn btn-block bg-gradient-danger btn-sm" value="Guardar">
                        </form>
                    </div>
                    <!-- /.card-body -->

                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Logo</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">

                        <IMG src="{{url($para->imagenS)}}" class="rounded mx-auto d-block">
                        <form method="post" action="{{route('parametrizacion.update',$para->id)}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="pp" value="3">
                            <input type="file" name="imagenS" class="form-control" >
                            <br />
                            <p>Mostrar Perfil</p>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="fullaccessyes" name="mostrarS" class="custom-control-input" value="si"
                                       @if ( $para->mostrarS=="si")
                                       checked
                                       @elseif (old('mostrarS')=="si")
                                       checked
                                    @endif


                                >
                                <label class="custom-control-label" for="fullaccessyes">si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="fullaccessno" name="mostrarS" class="custom-control-input" value="no"

                                       @if ( $para->mostrarS=="no")
                                       checked
                                       @elseif (old('mostrarS')=="no")
                                       checked
                                    @endif


                                >
                                <label class="custom-control-label" for="fullaccessno">No</label>
                            </div>

                            <br />
                            <input type="submit" class="btn btn-block bg-gradient-danger btn-sm" value="Guardar">
                        </form>
                    </div>
                    <!-- /.card-body -->

                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>



        </div>

    </div>



@endsection
