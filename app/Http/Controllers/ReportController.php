<?php

namespace App\Http\Controllers;

use App\Exports\PlantsExport;
use App\Models\Plant;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    // One shared query so the page, PDF and Excel ALWAYS use the same filters
    private function plants(Request $request)
    {
        $query = Plant::query();

        // Report type presets
        if ($request->report_type == 'in_stock')     $query->where('stock_status', 'in_stock');
        if ($request->report_type == 'out_of_stock') $query->where('stock_status', 'out_of_stock');

        // Manual filters
        if ($request->filled('category'))     $query->where('category', $request->category);
        if ($request->filled('stock_status')) $query->where('stock_status', $request->stock_status);

        // "Plants by category" groups by category first; everything else sorts by name
        if ($request->report_type == 'by_category') {
            $query->orderBy('category')->orderBy('name');
        } else {
            $query->orderBy('name');
        }

        return $query->get();
    }

    public function index(Request $request)
    {
        $plants = $this->plants($request);
        return view('reports.index', compact('plants'));
    }

    public function pdf(Request $request)
    {
        $plants = $this->plants($request);
        return Pdf::loadView('reports.pdf', compact('plants'))->download('plant-report.pdf');
    }

    public function excel(Request $request)
    {
        return Excel::download(new PlantsExport($this->plants($request)), 'plant-report.xlsx');
    }
}