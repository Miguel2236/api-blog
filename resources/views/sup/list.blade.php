@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="btn-group" role="group" aria-label="Grupo">
            <div class="col-md-12">
                <a href="{{ route('sup.new') }}" class="btn btn-outline-dark" title="Nuevo"><i class="fas fa-plus"></i></a>

                <button class="btn btn-outline-dark" title="buscar" data-toggle="modal" data-target="#searchModal"><i class="fas fa-search"></i></button>

                <a href="{{ route('sup.report') }}" class="btn btn-outline-dark" target="_blank" title="Reporte"><i class="fas fa-file-pdf"></i></a>
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

<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="modalBusqueda" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Buscar Registro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="content">
              <form method="POST" action="{{ route('sup.search') }}" id="frmSearch">
                <div class="row">
                    <div class="col-md-3">
                        <label for="clave">Clave</label>
                    </div>
                    <div class="col-md-9">
                        @csrf
                        <input type="text" class="form-control" name="clave" autocomplete="off" required>
                    </div>
                </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" form="frmSearch" class="btn btn-primary">Buscar</button>
        </div>
      </div>
    </div>
  </div>
@endsection