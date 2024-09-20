@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">
<div class="col-md-9 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

                        <h6 class="card-title">Add Planing</h6>

                        <form class="forms-sample" action="{{ route('store.amentie') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" autocomplete="off" placeholder="name">
                            </div>

                            <div class="mb-3">
                                <label for="pdf_file" class="form-label">Upload PDF</label>
                                <input type="file" class="form-control" name="pdf_file" accept="application/pdf">
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </form>


      </div>
    </div>
            </div>
            </div>
@endsection
