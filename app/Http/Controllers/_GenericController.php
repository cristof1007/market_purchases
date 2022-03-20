<?php

namespace App\Http\Controllers;

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

        if(isset($obj['id']) && $obj['id'] > 0) {
            return $this->update($obj, $obj['id']);
        }

        else {
            $currentApiUser = _Util::getCurrentApiUser($request);
            if($currentApiUser == null) {
                return response()->json(['message' => "Operation invalid user is not logged"], 403);
            }

            return $this->insertNew($obj, $currentApiUser->name);
        }
    }

    public function insertNew($obj, $userName) {
        try {
            $obj['user'] = $userName;
            $obj = $this->modelName::create($obj);
            return response()->json($obj, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function update($obj, $id) {
        try {
            $this->modelName::find($id)->update($obj);
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
