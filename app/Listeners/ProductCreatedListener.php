<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use Illuminate\Support\Facades\Cache;

class ProductCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     */
    public function handle(ProductCreated $event)
    {
        $productId = $event->productId;

        if ($productId === null) {
            return response()->json(['error' => 'Product ID is missing'], 400);
        }

// Additional logic related to the $productId
        Cache::put('productId', $productId);

        return $productId;

    }
}