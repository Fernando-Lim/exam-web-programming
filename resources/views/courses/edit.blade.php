@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit') }}
                    <a href="{{ route('courses.index') }}" style="float: right" class="btn btn-secondary float-right"><-Back</a>
                </div>

                <div class="card-body bg-white">


                    <form action="{{ route('courses.update', $course->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="course_name">Course Name</label>
                            <input type="text" class="form-control" id="course_name" name="CourseName" value="{{ isset($course) ? $course->CourseName : old('CourseName') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="Price" value="{{isset($course) ? number_format($course->Price, 0, '', '') : old('Price') }}" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="days">Days</label>
                            <input type="number" class="form-control" id="days" name="Days" value="{{isset($course) ? $course->Days : old('Days') }}" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="certificate">Certificate</label>
                            <select class="form-control" id="certificate" name="IsCertificate" required>
                                <option disabled value="">---Select---</option>
                                <option value="1" {{ (isset($course) && $course->IsCertificate == '1') || old('IsCertificate') == '1' ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ (isset($course) && $course->IsCertificate == '0') || old('IsCertificate') == '0' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="active">Active</label>
                            <select class="form-control" id="active" name="IsActive" required>
                                <option disabled value="">---Select---</option>
                                <option value="1" {{ (isset($course) && $course->IsActive == '1') || old('IsActive') == '1' ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ (isset($course) && $course->IsActive == '0') || old('IsActive') == '0' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection