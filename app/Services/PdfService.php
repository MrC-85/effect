<?php

namespace App\Services;


use Aws\Result;
use Aws\Textract\TextractClient;
use Illuminate\Http\UploadedFile;


class PdfService
{
    /**
     * @param UploadedFile $pdf
     * @return Result
     */
    public function processPdf(UploadedFile $pdf): Result
    {
        /** @var TextractClient $aws */
        $aws = \AWS::createClient('textract');

        $options = [
            'Document' => [
                'Bytes' => $pdf->getContent()
            ],
            'FeatureTypes' => ['FORMS','TABLES'],
        ];

        return $aws->analyzeDocument($options);
    }

    /**
     * @param Result $response
     * @return string
     */
    public function extractTextFromResponse(Result $response): string
    {
        $lines = [];
        foreach ($response['Blocks'] as $key => $value) {
            if (!empty($value['BlockType'])) {
                $blockType = $value['BlockType'];
                if (!empty($value['Text'])) {
                    $text = $value['Text'];
                    if ($blockType === 'LINE') {
                        $lines[] = $text;
                    }
                }
            }
        }

        return implode("\n", $lines);
    }
}
