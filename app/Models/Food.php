<?php

namespace App\Models;

use Config\Database\BaseModel;

class Food extends BaseModel
{
    public int $id;
    public string $rname;
    public string $imgdata;
    public string $address;
    public string $delimg;
    public string $somedata;
    public float $price;
    public float $rating;
    public string $arrimg;
    public mixed $created_at;
}