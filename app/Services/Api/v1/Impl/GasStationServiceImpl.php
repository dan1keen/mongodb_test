<?php


namespace App\Services\Api\v1\Impl;

use App\Models\GasStation;
use App\Services\Api\v1\GasStationService;
use MongoDB\BSON\Regex;
class GasStationServiceImpl implements GasStationService
{

    public function getItems()
    {
        $data = GasStation::all();

        return [
            'data' => $data,
        ];
    }

    public function getItemById($id)
    {
        $data = GasStation::findOrFail($id);
        return [
            'data' => $data,
        ];
    }

    public function storeItem($data)
    {
        return [
            'data' => $this->updateOrStore($data),
        ];
    }

    public function updateItem($id, $data)
    {
        return [
            'data' => $this->updateOrStore($data, $id),
        ];
    }

    private function updateOrStore($data, $id = null)
    {
        $model = $id ? GasStation::find($id) : new GasStation();
        $model->rejym_raboty      = $data['rejym_raboty'];
        $model->naimenovanie_azs  = $data['naimenovanie_azs'];
        $model->№                 = $data['№'];
        $model->kontaktnye_dannye = $data['kontaktnye_dannye'];
        $model->adres             = $data['adres'];
        $model->region            = $data['region'];

        $model->save();

        return $model;
    }

    public function deleteItem($id)
    {
        $model = GasStation::find($id);
        $model->delete();
        return [
            'data'    => $model,
            'message' => 'Deleted',
        ];
    }


    public function searchItem($query)
    {
        $fields = [
            'naimenovanie_azs',
            'rejym_raboty',
            '№',
            'kontaktnye_dannye',
            'adres',
            'region'
        ];
        $result = GasStation::where(function ($q) use ($query, $fields) {
            foreach ($fields as $field) {
                $q->orWhere($field, 'regex', new Regex($query, 'i'));
            }
        })
            ->get();

        return [
            'data' => $result,
        ];

    }

}
