@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Editar Cliente
                </div>

                <div class="panel-body">
                
                {!! Form::model($clientes, ['route'=> ['clientes.update', $clientes->id],
                 'method'=>'PUT']) !!}

                @include('clientes.partials.actualizar')
                
                {!! Form::close() !!}
                
                
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection 