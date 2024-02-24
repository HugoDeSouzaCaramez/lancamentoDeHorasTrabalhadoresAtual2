<!-- resources/views/employers/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">
            <h1>Edit Working Hour</h1>
    
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
            <form action="{{ route('working-hours.update', $workingHour->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="employer_id" value="{{ $workingHour->employer_id }}">
    
                <div class="form-group">
                    <label for="hours_worked">Hours Worked</label>
                    <input type="number" class="form-control" id="hours_worked" name="hours_worked" value="{{ $workingHour->hours_worked }}">
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{ $workingHour->date }}">
                </div>
    
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
