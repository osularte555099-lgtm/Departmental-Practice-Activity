@extends('layouts.master')
@section('title', 'View Plant')

@section('content')
<div class="card">
    <div class="card-body">
        <h3>{{ $plant->name }}</h3>
        <p><b>Category:</b> {{ ucfirst($plant->category) }}</p>
        <p><b>Price:</b> ₱{{ number_format($plant->unit_price, 2) }}</p>
        <p><b>Status:</b> {{ $plant->stock_status == 'in_stock' ? 'In Stock' : 'Out of Stock' }}</p>
        <p><b>Description:</b> {{ $plant->description }}</p>
        <p><b>Added by:</b> {{ $plant->user->name }}</p>
        <a href="{{ route('plants.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection