<div class="from-group">    
    {!! Form::label('nombre','Nombre') !!}
    
    {!! Form::text('nombre', null, ['class' => 'form-control nombre']) !!}   
    
</div>

<div class="from-group">    
    {!! Form::label('ap','Apellidos') !!}
    
    {!! Form::text('ap', null, ['class' => 'form-control ap']) !!}   
    
</div>

<div class="from-group">    
        
    {!! Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary insertar']) !!}   
    
</div>

<script src="{{  asset('js/jquery-3.min.js') }}"></script>

<script>
    $('.insertar').click(function(e){
        e.preventDefault();//cancela el submit
        $.ajax({
            type:'post',
            url:'clientes/store',
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