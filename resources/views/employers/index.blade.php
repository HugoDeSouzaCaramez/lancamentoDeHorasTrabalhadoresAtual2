<!-- resources/views/employers/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Listagem de Colaboradores</div>
                    <div class="card-body">
                        <ul>
                            @foreach ($employers as $employer)
                                <li>{{ $employer->name }} - {{ $employer->email }}</li>
                                <li><a href="{{ route('employers.edit', $employer->id) }}">Editar</a></li>
                            @endforeach
                        </ul>
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center"> {{-- Aplicando a classe pagination-sm --}}
                                {{-- Links de paginação --}}
                                {{ $employers->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
