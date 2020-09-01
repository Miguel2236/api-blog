@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="btn-group" role="group" aria-label="Grupo">
            <div class="col-md-12">
                <a href="{{ route('sup.new') }}" class="btn btn-outline-dark" title="Nuevo"><i class="fas fa-plus"></i></a>
                <a href="#" class="btn btn-outline-dark" title="Buscar"><i class="fas fa-search"></i></a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de Supervisores</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Departamento</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($supervisores as $sup)
                                <tr>
                                    <td>{{ $sup->id }}</td>
                                    <td>{{ $sup->clave }}</td>
                                    <td>{{ $sup->nombre }}</td>
                                    <td>{{ $sup->departamento }}</td>
                                    <td>
                                        <a href="#" class="btn btn-outline-dark btn-sm" title="Info "><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('sup.edit', $sup->id) }}" class="btn btn-outline-dark btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></a>
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