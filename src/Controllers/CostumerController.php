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

    public function store()
    {
//        TODO add request method
        (new Costumer())->create([[
            'name' => 'Joe',
            'surname' => 'Doe',
            'email' => 'doe@gmail.com'
        ]]);
    }

    public function update($id)
    {
        (new Costumer())->update([
            'name' => 'kalo'
        ],$id);
    }

    public function delete($id)
    {
        (new Costumer())->destroy($id);
    }
}
