a
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
                        <h6 class="card-title">Modifier la permission </h6>
                        <form class="forms-sample" method="POST" action="{{ route('update.permission') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">

                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">name_permission</label>
                                <input type="text" class="form-control" autocomplete="on" value="{{$data->name}}" name="name_permission">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">group_name</label>
                                <select name="group_name" id="" class="form-select">
                                    <option selected="" disabled="">Select Group</option>
                                    <option value="type" {{$data->group_name == 'type' ? 'selected' : ''   }} >Property type</option>
                                    <option value="amentie" {{$data->group_name == 'amentie' ? 'selected' : ''   }} >Amenties</option>
                                </select>
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
