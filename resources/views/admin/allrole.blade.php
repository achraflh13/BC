@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href=" {{route('add.role')}} " class="btn btn-info">Ajouter des role</a>
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
            <th>Role Name</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($data as $a)

          <tr>
            <td> {{$a->id}} </td>
            <td> {{$a->name}} </td>
            <td>
<a href=" {{route('edit.role',$a->id)}} " class="btn btn-primary">Editer</a>
<a href=" {{route('delete.role',$a->id)}} " id="delete" class="btn btn-danger">Supprimer</a>

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
