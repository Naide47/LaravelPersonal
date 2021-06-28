@extends('layout.layout')
@section('titulo')
Registro de usuarios
@endsection

@section('content')
{{HTML::ul($errors->all())}}

{{Form::open(["url"=>"users"])}}

<div class="form-group">
    {{Form::label('name', 'Nombre')}}
    {{Form::text('name', Request::old('name'), 
    ["class"=>"form-control", "required"=>true])}}
</div>
<div class="form-group">
    {{Form::label('email', 'Email')}}
    {{Form::text('email', Request::old('email'), 
    ["class"=>"form-control", "required"=>true])}}
</div>
<div class="form-group">
    {{Form::label('password', 'Contraseña')}}
    {{Form::text('password', Request::old('password'), 
    ["class"=>"form-control", "required"=>true])}}
</div>

{{Form::submit('Registrar usuario', ["class"=>"btn btn-primary"])}}

{{Form::close()}}

@endsection