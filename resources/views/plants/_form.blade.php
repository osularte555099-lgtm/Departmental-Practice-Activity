{{-- Show server-side validation errors --}}
@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mb-3">
    <label class="form-label">Plant Name</label>
    <input name="name" class="form-control" value="{{ old('name', $plant->name ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Category</label>
    <select name="category" class="form-select">
        @foreach(['ornamental','flowering','succulent','herb'] as $c)
            <option value="{{ $c }}" @selected(old('category', $plant->category ?? '') == $c)>{{ ucfirst($c) }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Unit Price</label>
    <input name="unit_price" type="number" step="0.01" min="0" class="form-control"
           value="{{ old('unit_price', $plant->unit_price ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control" rows="3">{{ old('description', $plant->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Stock Status</label>
    <select name="stock_status" class="form-select">
        <option value="in_stock" @selected(old('stock_status', $plant->stock_status ?? '') == 'in_stock')>In Stock</option>
        <option value="out_of_stock" @selected(old('stock_status', $plant->stock_status ?? '') == 'out_of_stock')>Out of Stock</option>
    </select>
</div>

<button class="btn btn-success">Save</button>
<a href="{{ route('plants.index') }}" class="btn btn-secondary">Cancel</a>