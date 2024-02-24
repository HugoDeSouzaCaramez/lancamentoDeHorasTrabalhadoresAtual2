<!-- resources/views/working_hours/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastrar Horas Trabalhadas</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('working-hours.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="employer_id">Employer:</label>
                            <select name="employer_id" id="employer_id" class="form-control" required>
                                @foreach($employers as $employer)
                                    <option value="{{ $employer->id }}">{{ $employer->id }}: {{ $employer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="date">Data:</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>

                        <div class="form-group">
                            <label for="hours_worked">Horas Trabalhadas:</label>
                            <input type="number" class="form-control" id="hours_worked" name="hours_worked" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
