@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Información de un Supervisor</div>

                <div class="card-body">
                    <div class="container-fluid">
                        @php
                            $info = 'Clave: '.$supervisor[0]->clave.' Nombre: '.$supervisor[0]->nombre;
                            $info .= ' ';
                            $info .= 'Salario: '.$supervisor[0]->salario.' Dpto: '.$supervisor[0]->departamento;
                        @endphp
                        <div class="row">
                            {!! QrCode::size(300)->generate($info) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection