<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Validator;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

// use App\Models\Category; 

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $model_name;

    public function __construct()
    {
        auth()->setDefaultDriver('api');
        $this->model_name = 'App\Models\Category';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->model_name::get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validatorMain($request);

        if($validator->fails()){
            return response()->json(['error' => true, $validator->errors()], 400);
        }


        $category = $this->model_name::create($request->all());
        return response()->json($category, 201); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->model_name::find($id);

        if(is_null($category)){
            return response()->json(['error' => true, 'message' => 'not found'], 404);
        }

        return response()->json($category, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = $this->model_name::find($id);

        if(is_null($category)){
            return response()->json(['error' => true, 'message' => 'not found'], 404);
        }


        $category->update($request->all());

        return response()->json($category, 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->model_name::find($id);

        if(is_null($category)){
            return response()->json(['error' => true, 'message' => 'not found'], 404);
        }

        $category->delete();

        return response()->json(['message' => 'delited, category', 'category' => $category], 200); 
    }

    public function validatorMain(Request $request)
    {
        $rules = [
            'name' => 'required|min:2',
            'slug' => 'required|min:2',
        ];

        $validator = Validator::make($request->all(), $rules);

        return $validator;

    }

}
