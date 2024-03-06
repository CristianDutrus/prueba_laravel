<?php

namespace App\HTTP\Controllers;

use App\Models\Entity;
use App\Models\Category;

class EntitiesController
{
    public function getEntities()
    {
        $entities = Entity::all();

        if ($entities->isEmpty()) {
            $response['success'] = false;
            $response['message'] = "No entities found";
            return response($response, 422);
        }

        $categories = Category::all();

        if ($categories->isEmpty()) {
            $response['success'] = false;
            $response['message'] = "No categories found";
            return response($response, 422);
        }

        $response = [
            "success" => true,
            "data" => []
        ];

        foreach ($entities as $entity) {
            foreach ($categories as $category) {
                if ($category->id == $entity->category_id) {
                    $arr =  [
                        "api" => $entity->api,
                        "description" =>  $entity->description,
                        "link" => $entity->link,
                        "category" => [
                            "id" => $category->id,
                            "category" => $category->category
                        ]
                    ];
                    array_push($response['data'], $arr);
                }
            }
        }
        return response($response, 200);
    }
}
