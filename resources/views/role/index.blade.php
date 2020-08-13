@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Lista de Roles</h2></div>
                    @include('custom.message')
                    <div class="card-body">
                        @can('haveaccess','roles.create')
                            <a href="{{route('role.create')}}"
                               class="btn btn-primary float-right"
                            >Create
                            </a>
                            <br><br>
                        @endcan

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Description</th>
                                <th scope="col">Full access</th>
                                <th colspan="3"></th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach ($roles as $role)
                                <tr>
                                    <th scope="row">{{ $role->id}}</th>
                                    <td>{{ $role->name}}</td>
                                    <td>{{ $role->slug}}</td>
                                    <td>{{ $role->descripcion}}</td>
                                    <td>{{ $role['full-access']}}</td>
                                    <td>
                                        @can('haveaccess','roles.show')
                                            <a class="btn btn-info" href="{{ route('role.show',$role->id)}}">Show</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('haveaccess','roles.edit')
                                            <a class="btn btn-success" href="{{ route('role.edit',$role->id)}}">Edit</a>
                                        @endcan
                                    </td>

                                    <td>
                                        @can('haveaccess','roles.destroy')
                                            <form action="{{ route('role.destroy',$role->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        @endcan

                                    </td>
                                </tr>
                            @endforeach





                            </tbody>
                        </table>

                        {{ $roles->links() }}




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
