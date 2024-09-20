@extends('user.user_dashboard')
@section('admin')
<div class="page-content">


    <div class="row profile-body">
      <!-- left wrapper start -->

      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">

                                  <h6 class="card-title">add role</h6>

                                  <form class="forms-sample" method="POST" action="{{ route('store.role') }}" >
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">Role name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" autocomplete="on"   name="name">
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
