<h1>Actualizar Registro</h1><hr>
<div class="from-group">    
    {!! Form::label('nombre','Nombre') !!}
    
    {!! Form::text('nombre', null, ['class' => 'form-control nombre']) !!}   
    
</div>

<div class="from-group">    
    {!! Form::label('ap','Apellidos') !!}
    
    {!! Form::text('ap', null, ['class' => 'form-control ap']) !!}   
    
</div>
<hr>
<div class="from-group">    
        
    {!! Form::submit('Actualizar', ['class' => 'btn btn-sm btn-primary actualizar']) !!}   
    
</div>

<script src="{{  asset('js/jquery-3.min.js') }}"></script>

<script>
    
    $('.actualizar').click(function(e){
        e.preventDefault();//cancela el submit
        $.ajax({
            type:'put',
            url:'clientes/{clientes}',
            data:{
                'nombre':$('.nombre').val(),
                'ap':$('.ap').val(),
            },
            success:function(data){
                window.location.reload();
            },
        });
    });

   

</script>