<?php

namespace App\Controllers;

use App\Models\Food;
use Config\Base\ApiPlatform;

class FoodController extends ApiPlatform
{
    public function index()
    {
        $foods = (new Food)->all();
        if ($foods) {
            $this->response($foods);
        } else {
            $this->error('Informations non trouvé');
        }
    }

    public function show(int $id)
    {
        $food = (new Food)->findBy($id);
        if ($food) {
            $this->response($food);
        } else {
            $this->error('Information non trouvé');
        }
    }
}