<?php

namespace app\Interfaces;

interface HttpAdapterInterface
{
    public function post(string $url, array $data=[]):void;
    
}

