<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Services\Api\v1\GasStationService;
use Illuminate\Http\Request;

class GasStationController extends Controller
{
    private $service;
    public function __construct(GasStationService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return response()->json($this->service->getItems());
    }

    public function edit($id)
    {
        return response()->json($this->service->getItemById($id));
    }

    public function create(Request $request)
    {
        $data = $request->all();
        return response()->json($this->service->storeItem($data));
    }

    public function update($id, Request $request)
    {
        $data = $request->all();
        return response()->json($this->service->updateItem($id, $data));
    }

    public function delete($id)
    {
        return response()->json($this->service->deleteItem($id));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        return response()->json($this->service->searchItem($query));
    }
}
