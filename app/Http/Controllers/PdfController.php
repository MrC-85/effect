<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePdfRequest;
use App\Services\PdfService;

class PdfController extends Controller
{
    public function store(StorePdfRequest $request, PdfService $service)
    {
        return response()->json();
    }
}
