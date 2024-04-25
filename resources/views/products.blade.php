@extends('layouts.app')

@section('title-block') Products page @endsection

@section('content')
    <h2 class="display-6 mb-4">Products:</h2>
    @if(isset($data['min']))
        @if($data['min']['id'] === $data['max']['id'])
            <div class="alert alert-warning">
                <h6><i>There is only one element in the database for this brand!</i></h6>
                <h4>«{{ $data['min']['name']  }}»</h4>
                <p>Цена: {{ $data['min']['price'] }}$</p>
                Бренд: <a href="{{ route('product-by-brand', $data['min']['name'] ) }}"><button type="button" class="btn btn-outline-secondary">{{ $data['min']['name']  }}</button></a>
                <a href="{{ route('product-detail', $data['min']['id']) }}"><button class="btn btn-warning">Детальнее</button></a>
            </div>
        @else
            <div class="alert alert-light">
                Ответ в виде JSON: <br>
                <strong>
                    {{ json_encode($data) }}
                </strong>
            </div>
            <div class="alert alert-info">
                <h4>Минимальная цена: {{ $data['min']['price'] }}$</h4>
                Бренд: <a href="{{ route('product-by-brand', $data['min']['name']) }}"><button type="button" class="btn btn-outline-secondary">{{ $data['min']['name'] }}</button></a>
                <a href="{{ route('product-detail', $data['min']['id']) }}"><button class="btn btn-warning">Детальнее</button></a>
            </div>
            <div class="alert alert-info">
                <h4>Максимальная цена: {{ $data['max']['price'] }}$</h4>
                Бренд: <a href="{{ route('product-by-brand', $data['max']['name']) }}"><button type="button" class="btn btn-outline-secondary">{{ $data['max']['name'] }}</button></a>
                <a href="{{ route('product-detail', $data['max']['id']) }}"><button class="btn btn-warning">Детальнее</button></a>
            </div>
        @endif
    @else
        @foreach($data as $el)
            
            <div class="alert alert-info">
                <h4>«{{ $el->name }}»</h4>
                <p>Цена: {{ $el->price }}$</p>
                Бренд: <a href="{{ route('product-by-brand', $el->name) }}"><button type="button" class="btn btn-outline-secondary">{{ $el->name }}</button></a>
                <a href="{{ route('product-detail', $el->id) }}" class="ml-auto"><button class="btn btn-warning">Детальнее</button></a>
            </div>
            
        @endforeach
    @endif

@endsection

@section('aside')
    @parent
    <h4>Add new product:</h4>
    <form method="POST" action="{{ route('product-form') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" placeholder="Enter product name" id="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" placeholder="Enter product price" id="price" class="form-control">
        </div>

        <button type="submit" class="btn btn-success mt-3">Добавить</button>
    </form>
    <hr class="mt-4">
@endsection