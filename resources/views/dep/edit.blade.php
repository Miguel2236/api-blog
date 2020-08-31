@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Departamento</div>

                <div class="card-body">
                    <form action="{{ route('dep.update',$dep->id) }}" method="POST" id="frmDepEdit">
                        @csrf
                        @method('PUT')
                        <div class="container-fluid">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" value="{{ $dep->nombre }}" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="observacion">Obcervación</label>
                                <input type="text" class="form-control" name="observacion" value="{{ $dep->observacion }}" autocomplete="off">
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