<?php

namespace App\Providers;

use App\Providers\ProductCreated;

class ProductCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */

    public function handle(ProductCreated $event): void
    {
     $productId = $event->productId;

        if ($productId === null) {
            return response()->json(['error' => 'Product ID is missing'], 400);
        }

        // Additional logic related to the $productId

        return $productId;

    }
}