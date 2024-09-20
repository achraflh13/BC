@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href=" {{route('add.type')}} " class="btn btn-info">Ajouter des Fiches</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">all fiches de paie</h6>

    <div class="table-responsive">
        <table id="dataTableExample" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>

                    <th>PDF File</th> <!-- Colonne pour afficher le PDF -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->type_name }}</td>


                    <!-- Lien pour afficher ou télécharger le PDF -->
                    <td>
                        @if($type->pdf_file)
                            <a href="{{ asset('uploads/pdfs/' . $type->pdf_file) }}" target="_blank" class="btn btn-info">Voir PDF</a>
                        @else
                            <span>Aucun PDF</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('edit.type', $type->id) }}" class="btn btn-primary">Éditer</a>
                        <a href="{{ route('delete.type', $type->id) }}" id="delete" class="btn btn-danger">Supprimer</a>
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
