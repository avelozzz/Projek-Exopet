    @extends('layouts/main')
    @section('title', "masterdata")
    @section('artikel')
        <div class="card">
            <div class="card-header">
                <a href="/masterdata/form-add" class ="btn btn-primary" ><i class="bi bi-plus-square"></i> Add Data</a>
            </div>
            <div class="card-body">
                @if (session('alert'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{session('alert')}}</strong>
                        <button type="button" class="close" data-dissmis="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Owner Name</th>
                                <th>Animal Type</th>
                                <th>Animal Age</th>
                                <th>Animal Price</th>
                                <th>Location</th>
                                <th>Picture</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ex as $idx => $m)
                            <tr>
                                <td>{{$idx + 1}}</td>
                                <td>{{ $m->ownerName}}</td>
                                <td>{{ $m->animalType}}</td>
                                <td>{{ $m->animalAge}}</td>
                                <td>{{ $m->animalPrice}}</td>
                                <td>{{ $m->location}}</td>
                                <td>
                                    <img src="{{asset('/storage/'.$m->picture) }}" alt="{{$m->picture }}" height="80" width="80">
                                </td>
                                <td>
                                    <a href="/form-edit/{{ $m->id }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                    <a href="/delete/{{ $m->id }}" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
