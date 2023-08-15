@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Add Instructor') }}
                    <a href="{{ route('instructors.index') }}" style="float: right" class="btn btn-secondary float-right"><-Back</a>
                </div>

                <div class="card-body bg-white">


                    <form action="{{ route('instructors.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="InstructorName">Instructor Name</label>
                            <input type="text" class="form-control" id="InstructorName" name="InstructorName" required>
                        </div>
                        <div class="form-group">
                            <label for="Age">Age</label>
                            <input type="number" class="form-control" id="Age" name="Age" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="ExpYear">Experience Year</label>
                            <input type="number" class="form-control" id="ExpYear" name="ExpYear" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="ExpDesc">Description</label>
                            <input type="text" class="form-control" id="ExpDesc" name="ExpDesc" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="Gender" required>
                                <option disabled selected value="">---Select---</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
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