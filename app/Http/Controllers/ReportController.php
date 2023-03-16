<?php

namespace App\Http\Controllers;


use App\Exports\ProductExport;
use App\Http\Services\CasheLoanService;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    /**
     * Display a listing of books.
     *
     * @param  ClientService  $service
     */
    public function index(CasheLoanService $service)
    {
        return view('report.index', with(array(
            'products'=>$service->fetchAll()
        )));
    }

    public function export(CasheLoanService $service){
        return Excel::download(new ProductExport($service), 'products.xlsx');
    }

}
