<?php

namespace App\Http\Controllers;

use App\Models\BUNIT;

class BusinessUnitContorller extends Controller
{
    public function businessUnit()
    {
        $categories = BUNIT::whereNull('parent_id')
            ->get();
        return view('pages.BusinessUnits',
            [
                'categories' => $categories,
                'allCategories' => BUNIT::get(),
            ]);
    }
}
