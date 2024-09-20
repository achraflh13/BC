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
                        <h6 class="card-title">Modifier le type</h6>
                        <form class="forms-sample" method="POST" action="{{ route('update.type') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $types->id }}">

                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Type name</label>
                                <input type="text" class="form-control" autocomplete="on" value="{{$types->type_name}}" name="type_name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Type icon</label>
                                <input type="text" class="form-control" autocomplete="on" value="{{$types->type_icon}}" name="type_icon">
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
