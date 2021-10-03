<?php

namespace App;

class Response
{
    private int $code;

    public function __construct(int $code, $data)
    {
        $this->code = $code;
        $this->handle($data);

    }

    private function handle($data)
    {
        echo json_encode([$data,  'status' => $this->code]);
    }

}
