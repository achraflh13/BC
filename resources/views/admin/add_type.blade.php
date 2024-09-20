
@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">


    <div class="row profile-body">
      <!-- left wrapper start -->

      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">

                                  <h6 class="card-title">Ajouter des fiches</h6>

                                  <form class="forms-sample" method="POST" action="{{ route('store.type') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">Name</label>
                                        <input type="text" class="form-control @error('type_name') is-invalid @enderror" name="type_name" autocomplete="off">
                                    </div>



                                    <div class="mb-3">
                                        <label for="pdf_file" class="form-label">Upload PDF</label>
                                        <input type="file" class="form-control @error('pdf_file') is-invalid @enderror" name="pdf_file" accept="application/pdf">
                                    </div>

                                    <button type="submit" class="btn btn-primary me-2">Save change</button>
                                </form>



                </div>
              </div>
        </div>
      </div>
      <!-- middle wrapper end -->
      <!-- right wrapper start -->

      <!-- right wrapper end -->
    </div>

        </div>

@endsection
