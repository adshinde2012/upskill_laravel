@extends('main')

@section('content')

    <div class="pagetitle">
      <a href="{{ route('employees.create') }}" type="button" class="btn btn-primary float-end"><i class="bi bi-plus me-1"></i> Add Employee</a>
      <!-- Modal -->
      <div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Vertical Form -->
            <form method="post" action = "{{ url('employees') }}">
              @csrf
            <div class="modal-body">
               
              <div class="row g-3">
                <div class="col-12">
                  <label for="firstname" class="form-label">Firstname</label>
                  <input type="text" class="form-control" id="firstname" name="firstname">
                  @error('firstname')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="lastname" class="form-label">Lastname</label>
                  <input type="text" class="form-control" id="lastname" name="lastname">
                </div>
                <div class="col-12">
                  <label class="col-sm-2 col-form-label">Select</label>
                  <select class="form-select" id="company_id" name="company_id">
                    <option selected="">Select Company</option>
                    @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                  </select>
                </div>
                <input type="hidden" class="form-control" id="id" name="id">
              </div> 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
          </div>
        </div>
      </div>


      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible" role="alert">
          {{ $message }}
          <a type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></a>
      </div> 
      @endif

      <h1>Employee List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card pt-2">
            <div class="card-body">              
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Company</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($employees as $emp)
                  <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $emp->firstname }}</td>
                    <td>{{ $emp->lastname }}</td>
                    <td>{{ $emp->name }}</td>
                    <td class="d-flex">
                      <a href="{{ route('employees.edit', $emp->id) }}" class="float-start" id="editEmployeeBtn"><i class="bi bi-pencil-square p-2 text-success"></i></a>
                          <a href="#deleteConfirmModal{{ $emp->id }}" class="" data-bs-toggle="modal" ><i class="bi bi-trash-fill text-danger"></i></a>
                          <!-- Modal HTML -->
                          <div id="deleteConfirmModal{{ $emp->id }}" class="modal fade">
                              <div class="modal-dialog modal-confirm modal-sm">
                                  <div class="modal-content">
                                      <div class="modal-header flex-column">
                                          <div class="icon-box">
                                              <i class="material-icons">&times;</i>
                                          </div>
                                          <h4 class="modal-title w-100">Are you sure?</h4>
                                          <a class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</a>
                                      </div>
                                      <div class="modal-body">
                                          <p>Do you really want to delete these records? This process cannot be undone.</p>
                                      </div>
                                      <form action="{{ route('employees.destroy', $emp->id) }}" method="POST">
                                      <div class="modal-footer justify-content-center">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                          @method('DELETE')
                                          @csrf
                                          <!-- <button class="btn p-0" type="submit"><i class="bi bi-trash-fill text-danger"></i></button> -->
                                          <button type="submit" class="btn btn-danger" id="deleteEmployee">Delete</button>
                                      </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
    
@endsection('content')
