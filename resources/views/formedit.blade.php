@extends('layouts/main')
@section('title', 'Form Add Data')
@section('artikel')
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="/update/{{ $ex->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Owner Name</label>
                    <input type="text" name="ownerName" class="form-control" value="{{ $ex->title }}" required>
                </div>
                <div class="form-group">
                    <label>Animal Type</label>
                    <select name="animalType" class="form-control">
                        <option value="0">--Choose Animal Type--</option>
                        <option value="Reptile">Reptile</option>
                        <option value="Insect">Insect</option>
                        <option value="Fish">Fish</option>
                        <option value="Bird">Bird</option>
                        <option value="Mammal">Mammal</option>
                    </select>
                </div>
                <div class="form-group">
                <label>Animal Age</label>
                <input type="number" min="1" max="10" name="animalAge" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Animal Price</label>
                    <input type="text" name="animalPrice" class="form-control" value="{{ $ex->animalPrice }}" required>
                </div>                
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Picture</label>
                    <input type="file" accept="image/*" name="picture" class="form-control" required>
                </div>
                <div class="form-group">
                    <img src="{{asset('/storage/'.$ex->picture) }}" alt="{{$ex->picture }}" height="80" width="80">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
@endsection