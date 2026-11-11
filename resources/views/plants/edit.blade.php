@extends('layouts.master')
@section('title', 'Edit Plant')

@section('content')
<h3>Edit Plant</h3>
<form method="POST" action="{{ route('plants.update', $plant) }}">
    @csrf
    @method('PUT')
    @include('plants._form')
</form>
@endsection