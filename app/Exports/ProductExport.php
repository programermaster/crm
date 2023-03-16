<?php

namespace App\Exports;

use App\Http\Services\CasheLoanService;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProductExport implements FromCollection,WithHeadings,WithMapping,ShouldAutoSize
{
    public function __construct(CasheLoanService $service){
        $this->service = $service;
    }
    public function headings(): array
    {
        return [
            'Product Type',
            'Product Value',
            'Creation date',
        ];
    }
    public function collection()
    {
        return $this->service->fetchAll();
    }
    public function map($product): array
    {
        return [
            isset($product->property_value) ? "Home Loan": "Cash Loan",
            !empty($product->amount)? $product->amount : $product->property_value . "-" . $product->down_payment_amount,
            $product->created_at
        ];
    }
}
