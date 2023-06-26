<?php
namespace App\Services;

use App\Http\Resources\ExportResource;
use App\Models\ExportProduct;

class ExportService
{
    public function showProducts()
    {
        $exportProducts = ExportProduct::join('product as p', 'export_product.product_id', 'p.id')
            ->join('company as c', 'c.id', 'p.company_id')
            ->join('product_category as pc', 'pc.id', 'p.category_id')
            ->select([
                'p.name',
                'p.description',
                'p.price',
                'p.views',
                'c.name as company_name',
                'c.country',
                'c.keywords',
                'pc.name as category_name',
                'p.id',
                'p.created_at'
            ])
            ->paginate(10);

        $numPages = $exportProducts->lastPage();
        return [
            'numPages' => $numPages,
            'exportProducts' => $exportProducts,
        ];

    }

    public function showProduct($id)
    {
        $exportProducts = ExportProduct::join('product as p', 'export_product.product_id', 'p.id')
            ->join('company as c', 'c.id', 'p.company_id')
            ->join('product_category as pc', 'pc.id', 'p.category_id')
            ->where('export_product.product_id', $id)
            ->get([
                'export_product.id',
                'p.name',
                'p.description',
                'p.price',
                'p.views',
                'c.name as company_name',
                'c.country',
                'c.keywords',
                'pc.name as category_name',
                'export_product.created_at'
            ]);

        return ExportResource::collection($exportProducts);
    }

}