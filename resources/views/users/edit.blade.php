@extends('layout.layout')
@section('titulo')
Editar usuario
@endsection

@section('content')
{{HTML::ul($errors->all())}}

{{Form::model($modelo, 
        ["route"=>["users.update", $modelo->id], 
        "method"=>"PUT"])}}

<div class="form-group">
    {{Form::label('name', 'Nombre')}}
    {{Form::text('name', $modelo->name, 
    ["class"=>"form-control", "required"=>true])}}
</div>
<div class="form-group">
    {{Form::label('email', 'Email')}}
    {{Form::text('email', $modelo->email, 
    ["class"=>"form-control", "required"=>true])}}
</div>
<div class="form-group">
    {{Form::label('password', 'Nueva contraseña')}}
    {{Form::text('password', '', 
    ["class"=>"form-control", "required"=>false])}}
</div>

{{Form::submit('Actualizar usuario', ["class"=>"btn btn-primary"])}}

{{Form::close()}}

@endsection