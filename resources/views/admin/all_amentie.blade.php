@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href=" {{route('add.amentie')}} " class="btn btn-info">Ajouter des Planing</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">all planing</h6>

    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
            <tr>
              <th>ID</th>
              <th>Name Planing</th>
              <th>PDF File</th> <!-- Nouvelle colonne pour afficher le PDF -->
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $d)
              <tr>
                <td>{{ $d->id }}</td>
                <td>{{ $d->name }}</td>

                <!-- Colonne pour afficher le lien du PDF -->
                <td>
                  @if($d->pdf_file)
                    <a href="{{ asset('uploads/pdfs/' . $d->pdf_file) }}" target="_blank" class="btn btn-info">Voir PDF</a>
                  @else
                    <span>Aucun PDF</span>
                  @endif
                </td>

                <td>
                  <a href="{{ route('edit.amentie', $d->id) }}" class="btn btn-primary">Éditer</a>
                  <a href="{{ route('delete.amentie', $d->id) }}" id="delete" class="btn btn-danger">Supprimer</a>
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
