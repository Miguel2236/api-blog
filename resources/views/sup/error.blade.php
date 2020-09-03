@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Información de un Supervisor</div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="error-template">
                                        <h1>Oops!</h1>

                                        <h2>404 No encontrado</h2>

                                        <div class="error-details">
                                            Registro Inexistente
                                        </div>

                                        <div class="error-actions">
                                            <a href="{{ route('sup.list') }}" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span> Regresar </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection