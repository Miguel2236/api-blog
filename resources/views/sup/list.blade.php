@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="btn-group" role="group" aria-label="Grupo">
            <div class="col-md-12">
                <a href="{{ route('sup.new') }}" class="btn btn-outline-dark" title="Nuevo"><i class="fas fa-plus"></i></a>
                <a href="{{ route('sup.report') }}" class="btn btn-outline-dark" target="_blank" title="Buscar"><i class="fas fa-file-pdf   "></i></a>
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
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Departamento</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($supervisores as $sup)
                                <tr>
                                    <td>{{ $sup->clave }}</td>
                                    <td>{{ $sup->nombre }}</td>
                                    <td>{{ $sup->departamento }}</td>
                                    <td>
                                        {{-- <a href="#" class="btn btn-outline-dark btn-sm" title="PDF"><i class="fas fa-file-pdf"></i></a> --}}
                                        <a href="{{ route('sup.edit', $sup->id) }}" class="btn btn-outline-dark btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="{{ route('sup.erase', $sup->id) }}" class="btn btn-outline-dark btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></a>
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