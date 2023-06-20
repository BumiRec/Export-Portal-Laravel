<?php
namespace App\Services;

use App\Http\Resources\ImportResource;
use App\Models\ImportProduct;

class ImportProductService
{

    public function importProducts()
    {
        $importProducts = ImportProduct::join('product as p', 'import_product.product_id', 'p.id')
            ->join('company as c', 'c.id', 'p.company_id')
            ->join('product_category as pc', 'pc.id', 'p.category_id')
            ->select([
                'p.id',
                'p.name',
                'p.description',
                'p.price',
                'p.imageURL',
                'p.views',
                'c.name as company_name',
                'c.country',
                'c.keywords',
                'pc.name as category_name',
                'p.created_at'
            ])
            ->paginate(10);

        $numPages = $importProducts->lastPage();
        return [
            'numPages' => $numPages,
            'exportProducts' => $importProducts,
        ];
    }

    public function importProduct($id)
    {
        $importProducts = ImportProduct::join('product as p', 'import_product.product_id', 'p.id')
            ->join('company as c', 'c.id', 'p.company_id')
            ->join('product_category as pc', 'pc.id', 'p.category_id')
            ->where('import_product.product_id', $id)
            ->get([
                'p.name',
                'p.description',
                'p.price',
                'p.imageURL',
                'p.views',
                'c.name as company_name',
                'c.country',
                'c.keywords',
                'pc.name as category_name',
                'import_product.created_at'
            ]);

        return ImportResource::collection($importProducts);
    }
}