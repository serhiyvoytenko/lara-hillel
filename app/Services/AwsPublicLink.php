<?php

namespace App\Services;

use Aws\Exception\AwsException;
use Aws\S3\S3Client;
use Exception;
use Illuminate\Support\Facades\Storage;


class AwsPublicLink implements Contracts\AwsPublicLinkInterface
{

    public function generate(string $filePath): string
    {
        $bucket = 'laravel-bucket-hillel';
        logs()->info($bucket);
        logs()->info($filePath);

        try {
            $s3 = Storage::disk('s3')->getClient();

            $cmd = $s3->getCommand('GetObject', [
                'Bucket' => $bucket,
                'Key' => $filePath,
                'ACL' => 'public-read',
            ]);

            $request = $s3->createPresignedRequest($cmd, "+3 days");

            return (string)$request->getUri();
        } catch (Exception $exception) {
            logs()->warning(self::class . ' => ' . $exception->getMessage());
        }

        return '';
    }
}
