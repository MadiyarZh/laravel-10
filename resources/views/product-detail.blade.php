@extends('layouts.app')

@section('title-block') Product update page @endsection

@section('content')
    <h2 class="display-6 mb-4">{{ $data->name }}</h2>

    <div class="alert alert-info">
        <h4>«{{ $data->name }}»</h4>
        <p>{{ $data->price }}$</p>
        <p><small>{{ $data->create_at }}</small></p>
        <a href="{{ route('product-update', $data->id) }}"><button class="btn btn-warning">Редактировать</button></a>
        <a href="{{ route('product-delete', $data->id) }}"><button class="btn btn-danger">Удалить</button></a>
    </div>

@endsection