<!-- resources/views/employers/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <a href="{{ route('employers.create') }}">Adicionar Employer</a>
                    <div class="card-header">Listagem de Colaboradores</div>
                    <div class="card-body">
                        <ul>
                            @foreach ($employers as $employer)
                                <li>{{ $employer->name }} - {{ $employer->email }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection