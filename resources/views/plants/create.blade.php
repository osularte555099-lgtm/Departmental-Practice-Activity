@extends('layouts.master')
@section('title', 'Add Plant')

@section('content')
<h3>Add Plant</h3>
<form method="POST" action="{{ route('plants.store') }}">
    @csrf
    @include('plants._form')
</form>
@endsection