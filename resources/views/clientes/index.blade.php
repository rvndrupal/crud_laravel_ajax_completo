@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Clientes
                    @can('clientes.create')
                    <a href="#" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#modalInsertar">Nuevo</a>
                    @endcan
                </div>

                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($clientes as $cliente )
                            <tr>
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->ap }}</td>
                                <td width="10px">
                                @can('clientes.show')
                                    <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-sm btn-default">Ver</a>
                                @endcan
                                </td>
                                <td width="10px">
                                @can('clientes.edit')
                                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-default" >Editar</a>
                                @endcan
                                </td>
                                <td width="10px">
                                @can('clientes.destroy')
                                    
                                {!! Form::open(['route'=>['clientes.destroy', $cliente->id],
                                'method'=>'DELETE']) !!}
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                                
                                {!! Form::close() !!}                               
                                    
                                @endcan
                                </td>

                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table>

                    {{ $clientes->render() }}
                   
                </div>
            </div>
        </div>
    </div>


</div>

{{--  Modal para insertar  --}}
<div class="modal fade" id="modalInsertar" tabindex="-1" role="dialog" aria-labelledby="modalInsertarLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalInsertarLabel">Nuevo Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            {{ csrf_field() }}
        <label for="">Nombre</label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control">
        <label for="">Apellidos</label>
        <input type="text" name="ap" id="ap" placeholder="Nombre" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary " id="insertar">Guardar</button>
      </div>
    </div>
  </div>
</div>


{{--  Modal para editar  --}}
<div class="modal fade" id="modalActualizar" tabindex="-1" role="dialog" aria-labelledby="modalActualizarLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalActualizarLabel">Editar Cliente</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  {{ csrf_field() }}
                
              <label for="">Nombre</label>
              <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="{{ $cliente->nombre }}" class="form-control">
              <label for="">Apellidos</label>
              <input type="text" name="ap" id="ap" placeholder="Nombre" class="form-control">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary " id="insertar">Guardar</button>
            </div>
          </div>
        </div>
      </div>
      


<script src="{{  asset('js/jquery-3.min.js') }}"></script>

<script>
$(document).ready(function(){

    $('#insertar').click(function(e){
        
        e.preventDefault();//cancela el submit
        var nombre = $('input[name=nombre]').val();
        var ap = $('input[name=ap]').val();
        
        $.ajax({
            type:'post',
            url:'clientes/store',
            data:{
                '_token': $('input[name=_token').val(),
                'nombre': nombre,
                'ap': ap
            },
            success:function(data){
                window.location.reload();
            },
        });
    });
});//ready

   

</script>


@endsection