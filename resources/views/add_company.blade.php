@extends('main')

@section('content')
        <div class="card col-md-8 mx-auto pb-4">
            <div class="card-body">

            @if (!empty($company))
                <h5 class="card-title">Edit Company</h5>
                <form method="post" action = "{{ route('companies.update', $company->id) }}" enctype='multipart/form-data'>
                @method('put')
            @else
                <h5 class="card-title">Add Company</h5>
                <form method="post" action = "{{ url('companies') }}" enctype='multipart/form-data'>
            @endif
              @csrf               
                <div class="row g-3">
                    <div class="col-12">
                        <label for="name" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $company->name ?? old('name') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $company->email ?? old('email') }}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="logo" class="form-label">Logo</label>
                        <input type="file" class="form-control" id="logo" name="logo" value="{{ $company->logo ?? '' }}">
                        @error('logo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="website" class="form-label">Website</label>
                        <input type="text" class="form-control" id="website" name="website" value="{{ $company->website ?? old('website') }}">
                        @error('website')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <input type="hidden" class="form-control" id="id" name="id"> --}}
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