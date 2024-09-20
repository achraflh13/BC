@extends('user.user_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href=" {{route('add.user')}} " class="btn btn-info">Ajouter des Equipier</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">all role</h6>

    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>id</th>

            <th>name</th>
            <th>email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($alladmin as $o)

          <tr>
            <td> {{$o->id}} </td>
            <td> {{$o->name}} </td>
            <td> {{$o->email}} </td>
            <td> {{$o->phone}} </td>
            <td> {{$o->role}} </td>
            <td>
<a href=" {{route('edit.user',$o->id)}} " class="btn btn-primary">Editer</a>
<a href=" {{route('delete.user',$o->id)}} " id="delete" class="btn btn-danger">Supprimer</a>

            </td>

          </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
        </div>
    </div>

</div>
@endsection
