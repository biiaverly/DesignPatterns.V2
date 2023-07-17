<?php

namespace       app\Services\Http;

use app\Interfaces\HttpAdapterInterface;

class CurlAdapter implements HttpAdapterInterface
{
    public function post(string $url, array $data = []): void
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, $data);

        curl_exec($curl);  
    }
}

