@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <img src="{{ $pelicula->poster }}">
        </div>
        <div class="col-sm-8">
            <h1>{{ $pelicula->title }}</h1>
            <h2>Año: {{ $pelicula->year }}</h2>
            <h2>Director: {{ $pelicula->director }}</h2>
            <p>Resumen: {{ $pelicula->synopsis }}</p>
            <p>Estado: Pelicula {{ $pelicula->rented ? 'actualmente alquilada' : 'disponible' }} </p>

            @if ($pelicula->rented)
                <a class="btn btn-danger">Devolver película</a>
            @else
                <a class="btn btn-primary">Alquilar película</a>
            @endif

            <a href="{{ route('edit', $id) }}" class="btn btn-warning">Editar película</a>
            <a href="{{ route('index') }}" class="btn btn-light">Volver al listado</a>
        </div>
    </div>
@endsection
