@extends('agent.agent_dashboard')
@section('admin')
<div class="page-content">
    <div class="col-md-9 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

                            <h6 class="card-title">Edit role</h6>

                            <form class="forms-sample" action="{{route('update.role')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data->id }}">

                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Role Name</label>
                                    <input type="text"  class="form-control" value="{{$data->name}}" name="name" autocomplete="off" placeholder="name">
                                </div>


                                <button type="submit" class="btn btn-primary me-2">Submit</button>

                            </form>

          </div>
        </div>
                </div>
                </div>
@endsection
