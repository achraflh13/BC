@extends('agent.agent_dashboard')
@section('admin')
<div class="page-content">
    <div class="col-md-9 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

                            <h6 class="card-title">Edit admin</h6>

                            <form class="forms-sample" action="{{route('update.admin')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $admin->id }}">

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$admin->name}}" autocomplete="on">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{$admin->username}}" autocomplete="on">
                                    @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$admin->email}}" autocomplete="on">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{$admin->phone}}" autocomplete="on">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control @error('adress') is-invalid @enderror" id="adress" name="adress" value="{{$admin->adress}}" autocomplete="on">
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>








                                <button type="submit" class="btn btn-primary me-2">Submit</button>

                            </form>

          </div>
        </div>
                </div>
                </div>
@endsection
