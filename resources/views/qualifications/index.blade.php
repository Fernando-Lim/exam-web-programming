@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('failed'))
            <div class="alert alert-warning">
                {{ session('failed') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('List Qualification') }}
                        <a href="{{ route('qualifications.create') }}" style="float: right"
                            class="btn btn-primary float-right">+</a>
                    </div>

                    <div class="card-body bg-white">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Course</th>
                                    <th>Instructor</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($qualifications as $qualification)
                                    <tr>
                                        <td>{{ $qualification->course->CourseName }}</td>
                                        <td>{{ $qualification->instructor->InstructorName }}</td>
                                        <td>
                                            <a href="{{ route('qualifications.edit', $qualification->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <form action="{{ route('qualifications.destroy', $qualification->id) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this qualification?')">Delete</button>
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
