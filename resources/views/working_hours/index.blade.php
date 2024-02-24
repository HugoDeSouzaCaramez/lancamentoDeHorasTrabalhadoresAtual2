
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Horas trabalhadas</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Employer</th>
                    <th>Hours Worked</th>
                    <th>Date</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($workingHours as $workingHour)
                <tr>
                    <td>{{ $workingHour->employer->id }}-{{ $workingHour->employer->name }}</td>
                    <td>{{ $workingHour->hours_worked }}</td>
                    <td>{{ $workingHour->date }}</td>
                    <td><a href="{{ route('working-hours.edit', $workingHour->id) }}">Editar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center"> {{-- Aplicando a classe pagination-sm --}}
                {{-- Links de paginação --}}
                {{ $workingHours->links() }}
            </ul>
        </nav>
    </div>
@endsection
