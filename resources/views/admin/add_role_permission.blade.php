@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<style type="text/css">
.form-check-label{
    text-transform: capitalize
}


</style>

<div class="page-content">

        <div class="row profile-body">
            <!-- left wrapper start -->

            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">add role in permission</h6>

                            <form class="forms-sample" method="POST" action="{{route('role.permission.store')}}">
                                @csrf

                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">add role in permission</label>
                                    <select name="role_id" id="roleSelect" class="form-select">
                                        <option selected="" disabled="">Select Group</option>
                                        @foreach ($role as $r)
                                            <option value="{{ $r->id }}">{{ $r->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="checkDefaultmain">
                                    <label class="form-check-label" for="checkDefaultmain">
                                        Permission All
                                    </label>
                                </div>
                                <hr>
@foreach ($permission_groups as $pg)
    <div class="row">
        <div class="col-3">
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="checkDefault">
                <label class="form-check-label" for="checkDefault">
                    {{ $pg->group_name }}
                </label>
            </div>
        </div>
        <div class="col-9">
            @php
                $permissions = App\Models\User::getpermissionGroupName($pg->group_name);
            @endphp
            @foreach ($permissions as $ps)
                <div class="form-check mb-2">
                    <input type="checkbox" class="form-check-input" name="permission[]" id="checkDefault{{$ps->id}}" value="{{$ps->id}}">
                    <label class="form-check-label" for="checkDefault{{$ps->id}}">
                        {{ $ps->name }}
                    </label>
                </div>
            @endforeach
            <br>
        </div>
    </div>
@endforeach


                                <button type="submit" class="btn btn-primary me-2">Save change</button>
                            </form>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<script type="text/javascript">
    $('#checkDefaultmain').click(function(){
        if ($(this).is(':checked')) {
            $('input[type=checkbox]').prop('checked', true);
        } else {
            $('input[type=checkbox]').prop('checked', false);
        }
    });
</script>

@endsection
