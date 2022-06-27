@extends('main')

@section('content')
        <div class="card col-md-8 mx-auto pb-4">
            <div class="card-body">
            @if (!empty($employee))
                <h5 class="card-title">Edit Employee</h5>
                <form method="post" action = "{{ route('employees.update', $employee->id) }}">
                @method('put')
            @else
                <h5 class="card-title">Add Employee</h5>
                <form method="post" action = "{{ url('employees') }}">
            @endif
              @csrf               
                <div class="row g-3">
			<div class="col-12">
			    <label for="firstname" class="form-label">Firstname</label>
			    <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $employee->firstname ?? '' }}">
			    @error('firstname')
			    <div class="text-danger">{{ $message }}</div>
			    @enderror
			</div>
			<div class="col-12">
			    <label for="lastname" class="form-label">Lastname</label>
			    <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $employee->lastname ?? '' }}">
			    @error('lastname')
			    <div class="text-danger">{{ $message }}</div>
			    @enderror
			</div>
			<div class="col-12">
			  <label class="col-sm-2 col-form-label">Select</label>
			  <select class="form-select" id="company_id" name="company_id">
			    <option selected="" value="">Select Company</option>
			    @foreach ($companies as $company)
			    	@if (!empty($employee) && $company->id == $employee->company_id)
			    	    <option value="{{ $company->id }}" selected>{{ $company->name }}</option>
			    	@else
			    	    <option value="{{ $company->id }}">{{ $company->name }}</option>
			    	@endif
			    @endforeach
			  </select>
			  @error('company_id')
			      <div class="text-danger">{{ $message }}</div>
			  @enderror
			</div>
                </div> 
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>            
            </form>

            </div>
        </div>
@endsection('content')
