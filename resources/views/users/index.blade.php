@extends('layout.layout')
@section('titulo')
Lista de usuarios
@endsection

@section('content')

<a href="{{route('users.create')}}">Registrar nuevo</a>
<br>
@if(Session::has('message'))
    {{Session::get('message')}}<br>
@endif()



<table class="table text-white table-striped">
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>ID</td>
        <td>Nombre de usuario</td>
    </tr>

    @forelse($table as $row)
    <tr>
        <td><a href="{{route('users.show', $row->id)}}">Ver detalle</a></td>
        <td><a href="{{route('users.edit', $row->id)}}">Editar</a></td>
        <td>
            {{Form::open(["url"=>route('users.destroy', $row->id)])}}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Borrar', ["class"=>"btn btn-danger"])}}

            {{Form::close()}}
        </td>
        <td>{{$row->id}}</td>
        <td>{{$row->email}}</td>
    </tr>
    @empty
    <tr>
        <td colspan="2">No hay usuarios registrados.</td>
    </tr>
    @endforelse

</table>

@endsection