@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Add Course') }}
                    <a href="{{ route('courses.index') }}" style="float: right" class="btn btn-secondary float-right"><-Back</a>
                </div>

                <div class="card-body bg-white">


                    <form action="{{ route('courses.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="course_name">Course Name</label>
                            <input type="text" class="form-control" id="course_name" name="CourseName" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="Price" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="days">Days</label>
                            <input type="number" class="form-control" id="days" name="Days" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="certificate">Certificate</label>
                            <select class="form-control" id="certificate" name="IsCertificate" required>
                                <option disabled selected value="">---Select---</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="active">Active</label>
                            <select class="form-control" id="active" name="IsActive" required>
                                <option disabled selected value="">---Select---</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Add</button>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection