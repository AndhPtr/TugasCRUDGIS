@extends('layouts.app')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                @include('notify::components.notify')
                <div class="card-header">Add New Place</div>
                <div class="card-body">
                    <a href="{{ route('places.create') }}" class="btn btn-primary btn-sm float-right">Add New Place</a>
                    <table class="table table-hovered" id="tablePlace">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Place Name</th>
                                <th>Address</th>
                                <th>Description</th>
                                <th>Longitude</th>
                                <th>Latitude</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($places as $key => $place)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $place->place_name }}</td>
                                <td>{{ $place->address }}</td>
                                <td>{{ $place->description }}</td>
                                <td>{{ $place->longitude }}</td>
                                <td>{{ $place->latitude }}</td>
                                <td>
                                    <a href={{ route ('places.show', $place->id) }} class="btn btn-sm btn-info">Detail</a>
                                    <a href="{{ route('places.edit', $place->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('places.destroy', $place->id) }}" method="POST" style="display:inline-block;">

                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
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
<form action="" method="post" id="deleteForm">
    @csrf
    @method("DELETE")
    <input type="submit" value="Hapus" style="display:none">
</form>
@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tablePlace').DataTable();
    });
</script>
@endpush