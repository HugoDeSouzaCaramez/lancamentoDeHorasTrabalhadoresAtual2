<!-- resources/views/employers/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h1>Colaboradores</h1>
        <div id="app">
            <employer-list></employer-list>
        </div>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employers as $employer)
                <tr>
                    <td>{{ $employer->id }}</td>
                    <td>{{ $employer->name }}</td>
                    <td>{{ $employer->email }}</td>
                    <td><a href="{{ route('employers.edit', $employer->id) }}">Editar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center"> {{-- Aplicando a classe pagination-sm --}}
                {{-- Links de paginação --}}
                {{ $employers->links() }}
            </ul>
        </nav>
    </div>
@endsection
