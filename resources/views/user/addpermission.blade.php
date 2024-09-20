
@extends('user.user_dashboard')
@section('admin')

<div class="page-content">
    <div class="col-md-9 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

                            <h6 class="card-title">Add Permission</h6>

                            <form class="forms-sample" action="{{route('store.permission')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">permission name</label>
                                    <input type="text"  class="form-control" name="permission_name" autocomplete="off" placeholder="name">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">group name</label>
                                    <select name="group_name" id="" class="form-select  @error('group_name') is-invalid @enderror" required >
                                        <option selected="" disabled="">Select Group</option>
                                        <option value="type">Property type</option>
                                        <option value="amentie">Amenties</option>
                                    </select>
                                </div>


                                <button type="submit" class="btn btn-primary me-2">Submit</button>

                            </form>

          </div>
        </div>
                </div>
                </div>
@endsection
