<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class _GenericController extends _Controller
{
    protected $tableName ='';
    protected $modelName ='';

    public function __construct($modelName, $tableName = '')
    {
        if($tableName == '') {
            $tableName = Str::plural($modelName);;
        }

        $this->tableName = Str::lower($tableName);
        $this->modelName = "App\\Models\\{$modelName}";
    }

    public function get($id) {
        $result = $this->modelName::find($id);
        if(isset($result)) {
            return response()->json($result, 200);
        } else {
            return response()->json(['message' => "Record not found in tableName:{$this->tableName}, id:{$id}"], 404);
        }
    }

    public function list() {
        try {
            $result = $this->modelName::where('active', 1)->get();
            if(isset($result)) {
                return response()->json($result, 200);
            } else {
                return response()->json(['message' => "No records found in tableName:{$this->tableName}"], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }


    public function save(Request $request) {
        $obj = $request->all();
        if($obj == null) {
            return response()->json(['message' => "the object received is null"], 500);
        }

        // if id is major of 0 them is a update
        if(isset($obj->id) && $obj->id > 0) {
            return $this->update($obj);
        }
        else {
            return $this->insertNew($obj);
        }
    }

    public function insertNew($obj) {
        try {
            $obj->user = Auth::user()->name;;
            $obj->save();
            return response()->json($obj, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function update($obj) {
        try {
            $obj->save();
            return response()->json($obj, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function delete($id) {
        try {
            $obj = $this->modelName::find($id);
            if(isset($obj)) {
                $obj->active = 0;
                $obj->save();
                return response()->json($obj, 200);
            } else {
                return response()->json(['message' => "Record not found in tableName:{$this->tableName}, id:{$id}"], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
