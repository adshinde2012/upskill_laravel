@extends('main')

@section('content')

    <div class="pagetitle">
      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible" role="alert">
          {{ $message }}
          <a type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></a>
      </div> 
      @endif

      <a href="{{ route('companies.create') }}" type="button" class="btn btn-primary float-end"><i class="bi bi-plus me-1"></i> Add Company</a>
      <h1>Company List</h1>
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
            <div class="card-body ">
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Website</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($companies as $comp)
                  <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $comp->name }}</td>
                    <td>{{ $comp->email }}</td>
                    <td>
                    <a href="{{ asset('storage/app/public/img') . '/' . $comp->logo }}" data-fancybox="gallery" data-caption="Caption Images 1">
                      <img src="{{ asset('storage/app/public/img') . '/' . $comp->logo }}" height="75" width="75" alt="" />
                    </a>
                    </td>
                    <td>{{ $comp->website }}</td>
                    <td class="">
                      <a href="{{ route('companies.edit', $comp) }}" class="float-start" id="editCompanyBtn" data-info="{{ $comp }}"><i class="bi bi-pencil-square p-2 text-success"></i></a>

                      <a href="#deleteConfirmModal{{ $comp->id }}" class="" data-bs-toggle="modal" ><i class="bi bi-trash-fill text-danger"></i></a>
                      
                      <!-- Modal HTML -->
                      <div id="deleteConfirmModal{{ $comp->id }}" class="modal fade">
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
                                  <form action="{{ route('companies.destroy', $comp->id) }}" method="POST">
                                  <div class="modal-footer justify-content-center">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                      @method('DELETE')
                                      @csrf
                                      <!-- <button class="btn p-0" type="submit"><i class="bi bi-trash-fill text-danger"></i></button> -->
                                      <button type="submit" class="btn btn-danger" id="deleteCompany">Delete</button>
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
