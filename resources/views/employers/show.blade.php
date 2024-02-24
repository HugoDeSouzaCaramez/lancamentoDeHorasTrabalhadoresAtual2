<!-- resources/views/employers/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $employer->name }}</div>

                    <div class="card-body">
                        <p><strong>Email:</strong> {{ $employer->email }}</p>
                        <!-- Adicione mais informações aqui conforme necessário -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
