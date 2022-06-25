@extends('main')

@section('content')
        <div class="card col-md-8 mx-auto pb-4">
            <div class="card-body">
            <h5 class="card-title">Add Company</h5>

            <form method="post" action = "{{ url('companies') }}" enctype='multipart/form-data'>
              @csrf               
                <div class="row g-3">
                    <div class="col-12">
                        <label for="name" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="col-12">
                        <label for="logo" class="form-label">Logo</label>
                        <input type="file" class="form-control" id="logo" name="logo">
                    </div>
                    <div class="col-12">
                        <label for="website" class="form-label">Website</label>
                        <input type="text" class="form-control" id="website" name="website">
                    </div>
                    <input type="hidden" class="form-control" id="id" name="id">
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