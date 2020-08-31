@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nuevo Departamento</div>

                <div class="card-body">
                    <form action="{{ route('dep.store') }}" method="POST" id="frmDep">
                        @csrf
                        <div class="container-fluid">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="observacion">Obcervación</label>
                                <input type="text" class="form-control" name="observacion" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection