@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nuevo Supervisor</div>

                <div class="card-body">
                    <form action="{{ route('sup.store') }}" method="POST" id="frmSup">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="clave">Clave</label>
                                    <input type="text" class="form-control" name="clave" autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="salario">Salario</label>
                                    <input type="number" class="form-control" name="salario" autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label for="departament_id">Departamento</label>
                                    <select class="form-control" name="departament_id" id="dep">
                                        <option value="">- Seleccionar -</option>
                                        @foreach ($departament as $dep)
                                            <option value="{{ $dep->id }}">{{ $dep->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection