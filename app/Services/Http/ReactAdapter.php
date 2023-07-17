<?php

namespace       app\Services\Http;

use app\Interfaces\HttpAdapterInterface;

class ReactAdapter implements HttpAdapterInterface
{
    public function post(string $url, array $data = []): void
    {
        echo "ReactPHP";
    }
}
