@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href=" {{route('add.roles.permission')}} " class="btn btn-info">Ajouter des ROLE Permission</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">all Role permission</h6>

    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th> Role Name </th>
            <th> Permission </th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($roles as $key =>$item)

          <tr>
            <td> {{$item->id}} </td>
            <td> {{$item->name}} </td>


            <td>
                @if(!is_null($item->permissions))
                    @foreach ($item->permissions as $prem)
                        <span class="badge bg-danger">{{ $prem->name }}</span>
                    @endforeach
                @else
                    <span>Aucune permission</span>
                @endif
            </td>

            <td>
<a href="{{route('edit.roles.permission',$item->id)}}" class="btn btn-primary">Editer</a>
<a href="{{route('delete.roles.permission',$item->id)}}" id="delete" class="btn btn-danger">Supprimer</a>

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
