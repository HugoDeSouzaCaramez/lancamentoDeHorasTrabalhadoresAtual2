@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h1>Horas Lançadas</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Colaborador</th>
                    <th>CPF</th>
                    <th>Hora Lançada</th>
                    <th>Data</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($workingHours as $workingHour)
                <tr>
                    <td>{{ $workingHour->employer->name }}</td>
                    <td>{{ $workingHour->employer->cpf }}</td>
                    <td>{{ $workingHour->hours_worked }}</td>
                    <td>{{ $workingHour->date }}</td>
                    <td><a href="{{ route('working-hours.edit', $workingHour->id) }}">Editar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                {{ $workingHours->links() }}
            </ul>
        </nav>
    </div>
@endsection
