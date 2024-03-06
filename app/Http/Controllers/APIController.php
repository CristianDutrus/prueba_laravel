<?php

namespace App\HTTP\Controllers;

use App\Models\Entity;
use App\Models\Category;

class APIController
{
    public function getThirdPartyData()
    {
        $url = "https://api.publicapis.org/entries";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);

        return response($response, 200);
    }

    public function saveThirdPartyData()
    {
        $data = $this->getThirdPartyData();
        $json = json_decode($data->getContent(), true);
        $entries = $json['entries'];

        /* Remover este query, el segundo foreach y cambiar $category->id por $entry['Category']
        en la insercion de Entidad para guardar todos los datos sin importar la categoria */
        $categories = Category::all();

        foreach ($entries as $entry) {
            foreach ($categories as $category) {
                if ($category->category == $entry['Category']) {
                    $query = Entity::firstOrNew(['api' => $entry['API']]);
                    $query->api = $entry['API'];
                    $query->description = $entry['Description'];
                    $query->link = $entry['Link'];
                    $query->category_id = $category->id;
                    $query->save();
                }
            }
        }
        return response($categories, 200);
    }
}
