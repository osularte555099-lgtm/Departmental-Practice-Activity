@extends('layouts.master')
@section('title', 'Plant List')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Plants</h3>
    <a href="{{ route('plants.create') }}" class="btn btn-success">+ Add Plant</a>
</div>

<table class="table table-bordered bg-white">
    <tr>
        <th>Name</th><th>Category</th><th>Price</th><th>Status</th><th>Added by</th><th>Actions</th>
    </tr>
    @forelse($plants as $p)
    <tr>
        <td>{{ $p->name }}</td>
        <td>{{ ucfirst($p->category) }}</td>
        <td>₱{{ number_format($p->unit_price, 2) }}</td>
        <td>{{ $p->stock_status == 'in_stock' ? 'In Stock' : 'Out of Stock' }}</td>
        <td>{{ $p->user->name }}</td>
        <td class="d-flex gap-1">
            <a class="btn btn-info btn-sm" href="{{ route('plants.show', $p) }}">View</a>
            <a class="btn btn-warning btn-sm" href="{{ route('plants.edit', $p) }}">Edit</a>
            <form method="POST" action="{{ route('plants.destroy', $p) }}" onsubmit="return confirm('Delete this plant?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>
    @empty
    <tr><td colspan="6">No plants yet.</td></tr>
    @endforelse
</table>

{{ $plants->links('pagination::bootstrap-5') }}
@endsection