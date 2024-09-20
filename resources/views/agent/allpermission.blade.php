@extends('agent.agent_dashboard')

@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href=" {{route('add.permission')}} " class="btn btn-info">Ajouter des Permission</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">all permission</h6>

    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th> Permission Name </th>
            <th> group Name </th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $p)

          <tr>
            <td> {{$p->id}} </td>
            <td> {{$p->name}} </td>
            <td> {{$p->group_name}} </td>

            <td>
<a href=" {{route('edit.permission',$p->id)}} " class="btn btn-primary">Editer</a>
<a href=" {{route('delete.permission',$p->id)}} " id="delete" class="btn btn-danger">Supprimer</a>

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
