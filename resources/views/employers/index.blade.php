@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h1>Colaboradores</h1>
        <employer-list></employer-list>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>CPF</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employers as $employer)
                <tr>
                    <td>{{ $employer->id }}</td>
                    <td>{{ $employer->name }}</td>
                    <td>{{ $employer->email }}</td>
                    <td>{{ $employer->cpf }}</td>
                    <td><a href="{{ route('employers.edit', $employer->id) }}">Editar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                {{ $employers->links() }}
            </ul>
        </nav>
    </div>
@endsection
