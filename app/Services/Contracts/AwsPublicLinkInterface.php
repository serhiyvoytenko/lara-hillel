<?php

namespace App\Services\Contracts;

interface AwsPublicLinkInterface
{
    public function generate(string $filePath): string;
}
