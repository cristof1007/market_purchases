<?php

namespace App\Http\Controllers;

class CatalogueController extends _GenericController
{
    /*
        model example:
        {
            "id": 1,
            "fk_father": 1,
            "level" : 0,
            "description": "description",
            "active": 1
        }
    */

    public function __construct() {
        parent::__construct('Catalogue');
    }
}
