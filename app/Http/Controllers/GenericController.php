<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    private $tableName ='';


    public function get($id) {

    }

    public function list() {

    }

    
    public function save($obj) {
        if($obj == null || !isset($obj->id)) {
            throw new Exception(`Error saving ${$tableName}`, 1);
        }

        if($obj->id > 0) {
            return $this->update($obj);
        }
        else {
            return $this->insertNew($obj);
        }
    }

    public function insertNew($obj) {

    }

    public function update($obj) {

    }
}
