<table border="1" width="100%" cellpadding="5" style="border-collapse:collapse; background:#fff">
    <tr><th>Name</th><th>Category</th><th>Unit Price</th><th>Stock Status</th></tr>
    @forelse($plants as $p)
    <tr>
        <td>{{ $p->name }}</td>
        <td>{{ ucfirst($p->category) }}</td>
        <td>{{ number_format($p->unit_price, 2) }}</td>
        <td>{{ $p->stock_status == 'in_stock' ? 'In Stock' : 'Out of Stock' }}</td>
    </tr>
    @empty
    <tr><td colspan="4">No records found.</td></tr>
    @endforelse
</table>
<p>Total records: {{ $plants->count() }}</p>