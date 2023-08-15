@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('List Instructor') }}
                        <a href="{{ route('instructors.create') }}" style="float: right"
                            class="btn btn-primary float-right">+</a>
                    </div>

                    <div class="card-body bg-white">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Experience</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($instructors as $instructor)
                                    <tr>
                                        <td>{{ $instructor->InstructorName }}</td>
                                        <td>{{ $instructor->Age }}</td>
                                        <td>{{ $instructor->Gender }}</td>
                                        <td>{{ $instructor->ExpYear }}</td>
                                        <td>{{ $instructor->ExpDesc }}</td>
                                        <td>
                                            <a href="{{ route('instructors.edit', $instructor->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <form action="{{ route('instructors.destroy', $instructor->id) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this instructor?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
