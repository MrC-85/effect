<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePdfRequest;
use App\Http\Requests\UpdatePdfRequest;
use App\Models\Pdf;
use App\Services\PdfService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PdfController extends Controller
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return Pdf::all();
    }

    /**
     * @param Pdf $pdf
     * @return Pdf
     */
    public function show(Pdf $pdf): Pdf
    {
        return $pdf;
    }

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

    /**
     * @param UpdatePdfRequest $request
     * @param Pdf $pdf
     * @return Pdf
     */
    public function update(UpdatePdfRequest $request, Pdf $pdf): Pdf
    {
        $data = $request->validated();

        $pdf->update($data);

        return $pdf;
    }

    /**
     * @param Pdf $pdf
     * @return JsonResponse
     */
    public function destroy(Pdf $pdf): JsonResponse
    {
        $pdf->delete();

        return response()->json();
    }
}
