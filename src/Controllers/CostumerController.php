<?php

namespace App\Controllers;

use App\Models\Costumer;
use App\Request;
use App\Response;

class CostumerController
{
    private Request $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    public function index()
    {
        $costumers = (new Costumer())->all()->get();

        return new Response(200, $costumers);
    }

    public function show($id)
    {
        $costumer = (new Costumer())->where('id', $id)->first();
        if(empty($costumer)) {
            return new Response(404, ['error' => 'user could not find']);
        }

        return new Response(200, $costumer);
    }

    public function store()
    {
        parse_str($this->request->getQuery(), $data);

        $costumer = (new Costumer())->create([$data]);

        return $costumer ? new Response(200, ['message' => 'costumer added successfully'])
                         : new Response(402, ['error' => 'something wrong try again later']);
    }

    public function update($id)
    {
        parse_str($this->request->getQuery(), $data);

        $costumer = (new Costumer())->update($data ,$id);

        return $costumer ? new Response(200, ['message' => 'costumer updated successfully'])
                         : new Response(402, ['error' => 'something wrong try again later']);
    }

    public function delete($id)
    {
        $costumer = (new Costumer())->destroy($id);

        return $costumer ? new Response(200, ['message' => 'costumer deleted successfully'])
                         : new Response(402, ['error' => 'something wrong try again later']);
    }
}
