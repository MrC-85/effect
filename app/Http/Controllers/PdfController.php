<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePdfRequest;
use App\Models\Pdf;
use App\Services\PdfService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PdfController extends Controller
{
    /**
     * @param StorePdfRequest $request
     * @param PdfService $service
     * @return Pdf|JsonResponse
     */
    public function store(StorePdfRequest $request, PdfService $service):  Pdf|JsonResponse
    {
        $file = $request->file('file');
        try {
            $response = $service->processPdf($file);
            $text = $service->extractTextFromResponse($response);
            $pdf = Pdf::create(['text' => $text, 'created_by' => auth()->id()]);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $pdf;
    }
}
