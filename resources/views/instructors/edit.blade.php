@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit') }}
                    <a href="{{ route('instructors.index') }}" style="float: right" class="btn btn-secondary float-right"><-Back</a>
                </div>

                <div class="card-body bg-white">


                    <form action="{{ route('instructors.update', $instructor->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="InstructorName">Instructor Name</label>
                            <input type="text" class="form-control" id="InstructorName" name="InstructorName" value="{{ isset($instructor) ? $instructor->InstructorName : old('InstructorName') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="Age">Age</label>
                            <input type="number" class="form-control" id="Age" name="Age" value="{{ isset($instructor) ? $instructor->Age : old('Age') }}" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="ExpYear">Experience Year</label>
                            <input type="number" class="form-control" id="ExpYear" name="ExpYear" value="{{ isset($instructor) ? $instructor->ExpYear : old('ExpYear') }}" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="ExpDesc">Description</label>
                            <input type="text" class="form-control" id="ExpDesc" name="ExpDesc" value="{{ isset($instructor) ? $instructor->ExpDesc : old('ExpDesc') }}" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="Gender" required>
                                <option disabled selected value="">---Select---</option>
                                <option value="Male" {{ (isset($instructor) && $instructor->Gender == 'Male') || old('Gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ (isset($instructor) && $instructor->Gender == 'Female') || old('Gender') == 'Female' ? 'selected' : '' }}>Female</option>
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