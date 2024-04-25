@extends('layouts.app')

@section('title-block') About page @endsection

@section('content')
    <h2 class="display-6 mb-4">About page</h2>
@endsection

@section('aside')
    @parent
    <h4>Contacts:</h4>
    <p>
        <small><strong>Phone:</strong> +7-(111)-111-11-11</small>
        <br>
        <small><strong>Email:</strong> mzhorakhan00@mail.com</small>
    </p>
@endsection