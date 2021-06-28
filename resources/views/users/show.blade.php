@extends('layout.layout')
@section('titulo')
Mostrar usuario
@endsection

@section('content')
<a href="{{route('users.index')}}">Regresar</a><br>
<table class="table table-striped text-white">
    <tbody>
        <tr>
            <td>Nombre</td>
            <td>Correo:</td>
        </tr>
        <tr>
            <td>{{$modelo->name}}</td>
            <td>{{$modelo->email}}</td>
        </tr>
    </tbody>
</table>
@endsection