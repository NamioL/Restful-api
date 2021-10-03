<?php

namespace App\Controllers;

use App\Models\Costumer;

class CostumerController
{
    public function index()
    {
//        TODO create response method
        echo json_encode((new Costumer())->where('name','vaso')->get());
    }

    public function show($id)
    {
//        TODO when false add exception with 401
//        TODO add nicer call of custumer I have a time
        echo json_encode((new Costumer())->where('id',$id)->first());
    }
}
