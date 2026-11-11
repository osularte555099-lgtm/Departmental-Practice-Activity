@extends('layouts.master')
@section('title', 'Plant Reports')

@section('content')
<h3>Plant Reports</h3>
<form method="GET" class="row g-2 mb-3">
    <div class="col-md-3">
        <select name="report_type" class="form-select">
            <option value="">All Plants</option>
            <option value="in_stock" @selected(request('report_type')=='in_stock')>In-stock plants</option>
            <option value="out_of_stock" @selected(request('report_type')=='out_of_stock')>Out-of-stock plants</option>
            <option value="by_category" @selected(request('report_type')=='by_category')>Plants by category</option>
            <option value="price_list" @selected(request('report_type')=='price_list')>Plant price list</option>
        </select>
    </div>
    <div class="col-md-3">
        <select name="category" class="form-select">
            <option value="">All Categories</option>
            @foreach(['ornamental','flowering','succulent','herb'] as $c)
                <option value="{{ $c }}" @selected(request('category')==$c)>{{ ucfirst($c) }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <select name="stock_status" class="form-select">
            <option value="">Any Stock Status</option>
            <option value="in_stock" @selected(request('stock_status')=='in_stock')>In Stock</option>
            <option value="out_of_stock" @selected(request('stock_status')=='out_of_stock')>Out of Stock</option>
        </select>
    </div>
    <div class="col-md-3 d-flex gap-1">
        <button class="btn btn-primary">Filter</button>
        <a class="btn btn-danger" href="{{ route('reports.pdf', request()->query()) }}">PDF</a>
        <a class="btn btn-success" href="{{ route('reports.excel', request()->query()) }}">Excel</a>
    </div>
</form>

@include('reports._table')
@endsection