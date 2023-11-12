<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithChunkReading;



class ProductExport implements FromView,WithChunkReading
{
    public function chunkSize(): int
    {
        return 100;
    }

    public function view(): View
    {
        $products = Product::query()
        ->where('status', '1')
        ->get();

        return view('backend.pages.product.export', [
            'products' => $products,
        ]);
    }
}
