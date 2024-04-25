@extends('layouts.app')

@section('title-block') Update product @endsection

@section('content')
    <h2 class="display-6 mb-4">Update product:</h2>

    <form method="POST" action="{{ route('product-update-submit', $data->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{$data->name}}" id="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" value="{{$data->price}}" id="price" class="form-control">
        </div>

        <button type="submit" class="btn btn-success mt-2">Обновить</button>
    </form>

@endsection