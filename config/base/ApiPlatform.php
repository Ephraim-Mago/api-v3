<?php

namespace Config\Base;

abstract class ApiPlatform
{
    public function __construct()
    {
        date_default_timezone_set("Europe/Paris");;
        header("Access-Control-Allow-Origin: *");
        //header("Access-Control-Allow-Origin: http://ecom-admin.test");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: X-Requested-With");
        header("Content-type: application/json; charset=UTF-8");
    }

    private function answer($response)
    {
        $response['args'] = ['url' => $_SERVER['REQUEST_URI']];
        unset($response['args']['password']);
        $response['time'] = date('d/m/Y H:i:s');
        echo json_encode($response);
    }

    public function error($message)
    {
        $this->answer(['status' => 404, 'message' => $message]);
    }

    public function errorAuth()
    {
        $this->answer(['status' => 401, 'message' => 'Authentification requise !']);
    }

    public function errorRequest()
    {
        $this->answer(['status' => 400, 'message' => 'Requête mal formulée']);
    }

    public function response($data)
    {
        $this->answer(['status' => 200, 'data' => $data]);
    }
}