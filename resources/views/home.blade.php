<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>

                <div class="card-body">
                    <p>Bem-vindo à tela principal!</p>
                    <!-- Aqui você pode adicionar o conteúdo da tela principal conforme necessário -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
