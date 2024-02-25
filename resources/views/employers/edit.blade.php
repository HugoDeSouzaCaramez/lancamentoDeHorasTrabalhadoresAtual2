@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Colaborador</div>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{ route('employers.update', $employer->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nome:</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $employer->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $employer->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="cpf">CPF:</label>
                                <input type="text" id="cpf" name="cpf" value="{{ $employer->cpf }}" class="form-control" placeholder="000.000.000-0" required>
                            </div>
                            <div class="form-group">
                                <label for="birth_date">Data de Nascimento:</label>
                                <input type="date" id="birth_date" name="birth_date" value="{{ $employer->birth_date }}" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
