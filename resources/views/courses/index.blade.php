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
                        {{ __('List Course') }}
                        @can('isAdmin')
                            <a href="{{ route('courses.create') }}" style="float: right" class="btn btn-primary float-right">+</a>
                        @endcan
                    </div>

                    <div class="card-body bg-white">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Price</th>
                                    <th>Days</th>
                                    <th>Certificate</th>
                                    <th>Active</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr>
                                        <td>{{ $course->CourseName }}</td>
                                        <td>{{ number_format($course->Price, 2, ',', '.') }}</td>
                                        <td>{{ $course->Days }}</td>
                                        <td>{{ $course->IsCertificate === 1 ? 'Yes' : 'No' }}</td>
                                        <td>{{ $course->IsActive === 1 ? 'Yes' : 'No' }}</td>
                                        <td>
                                            @can('isAdmin')
                                                <a href="{{ route('courses.edit', $course->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
                                                </form>
                                            @else
                                                <a href="{{ route('transactions.create', ['CourseID'=>$course->id]) }}" class="btn btn-primary">Enroll</a>
                                            @endcan
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
