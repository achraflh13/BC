@extends('user.user_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<style type="text/css">
.form-check-label {
    text-transform: capitalize;
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
                        <h6 class="card-title">Add Role in Permission</h6>
                        <form class="forms-sample" method="POST" action="{{ route('update.roles.permission', $role->id) }}">
                            @csrf

                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Add Role in Permission</label>
                                <h3>{{ $role->name }}</h3>
                            </div>

                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" id="checkDefaultMain" name="permission_all">
                                <label class="form-check-label" for="checkDefaultMain">Permission All</label>
                            </div>
                            <hr>

                            @foreach ($permission_groups as $pg)
                                <div class="row">
                                    <div class="col-3">
                                        @php
                                            $permissions = App\Models\User::getpermissionGroupName($pg->group_name);
                                        @endphp
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="group-{{ $pg->group_name }}"
                                                {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="group-{{ $pg->group_name }}">{{ $pg->group_name }}</label>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        @foreach ($permissions as $permission)
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" name="permissions[]"
                                                    id="permission-{{ $permission->id }}" value="{{ $permission->id }}"
                                                    {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
                                            </div>
                                        @endforeach
                                        <br>
                                    </div>
                                </div>
                            @endforeach

                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#checkDefaultMain').click(function(){
        if ($(this).is(':checked')) {
            $('input[type=checkbox]').not(this).prop('checked', true);
        } else {
            $('input[type=checkbox]').not(this).prop('checked', false);
        }
    });
</script>

@endsection
