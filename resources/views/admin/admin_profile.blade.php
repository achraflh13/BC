@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-content">


    <div class="row profile-body">
      <!-- left wrapper start -->
      <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
        <div class="card rounded">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-2">

              <div>
                <img class="wd-100 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('img/admin_images/'.$profileData->photo) : url('img/no_image.jpg') }}" alt="profile">
                <span class="h4 ms-3 "> {{$profileData->username}} </span>
              </div>

            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">NAME:</label>
              <p class="text-muted">{{$profileData->name}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
              <p class="text-muted">{{$profileData->email}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
              <p class="text-muted">{{$profileData->phone}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
              <p class="text-muted">{{$profileData->adress}}</p>
            </div>
            <div class="mt-3 d-flex social-links">
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="github"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="twitter"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="instagram"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">

                                  <h6 class="card-title">Modifier mes informations</h6>

                                  <form class="forms-sample" method="POST" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="exampleInputUsername1" autocomplete="on" placeholder="Username" name="username" value="{{ $profileData->username }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" value="{{ $profileData->email }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputName1" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="exampleInputName1" autocomplete="off" placeholder="Name" name="name" value="{{ $profileData->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPhone1" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="exampleInputPhone1" autocomplete="off" placeholder="Phone" name="phone" value="{{ $profileData->phone }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputAdress1" class="form-label">Adress</label>
                                        <input type="text" class="form-control" id="exampleInputAdress1" autocomplete="off" placeholder="Adress" name="adress" value="{{ $profileData->adress }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password" name="password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPhoto1" class="form-label">Photo</label>
                                        <input class="form-control" name="photo" type="file" id="image">
                                    </div>
                                    <div class="mb-3">
                                        <img id="showImage" class="wd-100 ht-100 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('img/admin_images/'.$profileData->photo) : url('img/no_image.jpg') }}" alt="profile photo">
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




        <script type="text/javascript">

$(document).ready(function() {

$('#image').change(function(e){
    var reader = new FileReader();
    reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
});


});

        </script>
@endsection
