<?php


namespace App\Services\Api\v1;


interface GasStationService
{
    public function getItems();

    public function getItemById($id);

    public function storeItem($data);

    public function updateItem($id, $data);

    public function deleteItem($id);

    public function searchItem($query);
}
