<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #333; padding: 5px; text-align: left; }
        th { background: #198754; color: #fff; }
    </style>
</head>
<body>
    <h2>Plant Report</h2>
    <p>Generated: {{ now()->format('M d, Y h:i A') }}</p>

    <table>
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
</body>
</html>
