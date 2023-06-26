<?php

namespace app\Interfaces;
use App\Http\Requests\CategoryStatusRequest;
interface CategoryStatusInterface
{
    public function updateCategory(CategoryStatusRequest $catrgoryStatusRequest, $companyId);

    public function updateStatus(CategoryStatusRequest $catrgoryStatusRequest, $companyId);
}