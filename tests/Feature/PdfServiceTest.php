<?php

namespace Tests\Feature;

use App\Services\PdfService;
use Aws\CommandInterface;
use Aws\Exception\AwsException;
use Aws\MockHandler;
use Aws\Result;
use Illuminate\Http\UploadedFile;
use Psr\Http\Message\RequestInterface;
use Tests\TestCase;

class PdfServiceTest extends TestCase
{
    public function testProcessPdf()
    {
        $mock = new MockHandler();
        $mock->append(new Result(['test' => 'result']));
        \AWS::fake($mock);

        $service = app()->make(PdfService::class);

        $pdf = UploadedFile::fake()->create('document.pdf', 1024);

        $response = $service->processPdf($pdf);

        $this->assertTrue($response['test'] === 'result');
    }

    public function testProcessBadPdf()
    {
        $mock = new MockHandler();
        $mock->append(function (CommandInterface $cmd, RequestInterface $req) {
            return new AwsException('Invalid PDF exception', $cmd);
        });
        \AWS::fake($mock);

        $this->expectExceptionMessage('Invalid PDF exception');
        $service = app()->make(PdfService::class);

        $pdf = UploadedFile::fake()->create('bad.pdf', 1024);

        $service->processPdf($pdf);
    }
}
