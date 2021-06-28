<!-- <h1>{{$titulo }}</h1>

<p>
    Descripción de la misión de la empresa
</p> -->

@extends('layout.layout')
@section('titulo')
Misión
@endsection

@section('content')

<p>
    Descripción de la misión de la empresa
</p>

@forelse($servicios as $servicio)
@include("site.detalleServicio")
<!-- Servicio de {{$servicio}}<br> -->
@empty
<h4>No hay servicio disponibles</h4>
@endforelse

@endsection

<!-- @if($activo == true)
<h4>El servicio esta activo</h4>
@else
<h4>El servicio NO esta activo</h4>
@endif -->


<!-- @foreach ($servicios as $servicio)
    Servicio de {{$servicio}}<br>
@endforeach -->




<!-- <!doctype html>
<html lang="en">

<head>
    <title>Mision | IDGS902 Laravel</title>
    Required meta tags
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    Bootstrap CSS
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col text-center">
            <h1>¡Hola mundo!</h1>
        </div>
    </div>
</div>

</body>

</html> -->