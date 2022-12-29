<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product as Category;

use Validator;

class ProductController extends Controller
{
    public function category()
    {
        return response()->json(Category::get(), 200);
    }

    public function categoryById($id)
    {

        $category = Category::find($id);

        if(is_null($category)){
            return response()->json(['error' => true, 'message' => 'not found'], 404);
        }


        return response()->json($category, 200);
    }

    public function categoryEdit(Request $request, $id)
    {

        $category = Category::find($id);

        if(is_null($category)){
            return response()->json(['error' => true, 'message' => 'not found'], 404);
        }


        $category->update($request->all());

        return response()->json($category, 200); 
        
    }

    public function categoryDelete(Request $request, $id)
    {

        $category = Category::find($id);

        if(is_null($category)){
            return response()->json(['error' => true, 'message' => 'not found'], 404);
        }

        $category->delete();

        return response()->json(['message' => 'delited, category', 'category' => $category], 200); 
    }

    public function categorySave(Request $request)
    {
        $validator = $this->validatorMain($request);

        if($validator->fails()){
            return response()->json(['error' => true, $validator->errors()], 400);
        }


        $category = Category::create($request->all());
        return response()->json($category, 201); 
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
