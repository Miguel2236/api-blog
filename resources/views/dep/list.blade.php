@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="btn-group" role="group" aria-label="Grupo">
            <div class="col-md-12">
                <a href="{{ route('dep.new') }}" class="btn btn-outline-dark" title="Nuevo"><i class="fas fa-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de Departamentos</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departamentos as $dep)
                                <tr>
                                    <td>{{ $dep->id }}</td>
                                    <td>{{ $dep->nombre }}</td>
                                    <td>{{ $dep->observacion }}</td>
                                    <td>
                                        <div class="btn-group mr-2" role="group">
                                            <div class="col-md-12">
                                                <a href="{{ route('dep.edit', $dep->id) }}" class="btn btn-success btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="{{ route('dep.erase',$dep->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="bActivo" value="0">
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                                                </form>
                                            </div>
                                        </div>
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