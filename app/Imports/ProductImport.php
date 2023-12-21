<?php


namespace App\Imports;
use App\Models\Product;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ProductImport implements ToModel, WithChunkReading, WithStartRow, WithBatchInserts
{

    public function startRow(): int
    {
        return 2;
    }
    public function model(array $row)
    {
        $categoryName = $row[1];

        $category = Category::firstOrNew(['name' => $categoryName]);
        $category->save();

        $product = new Product([
            'name' => $row[0],
            'category_id' => $category->id,
            'price' => $row[2],
            'size' => $row[3],
            'color' => $row[4],
        ]);
        $product->save();
    }


    public function chunkSize(): int
    {
        return 1000;
    }

    public function batchSize(): int
    {
        return 1000;
    }

}
