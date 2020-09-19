<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function GuzzleHttp\Promise\all;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\Product as ProductResource;

class ProductController extends Controller
{
    // add product
    public function add(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            'brand_name'=>'required',
            'price'=>'required',
    ]);

        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()->all()], 409);
        }
        $p = new product();
        $p->brand_name=$request->brand_name;
        $p->model_name= $request->model_name;

        $p->price=$request->price;
        $p->front_cam= $request->front_cam;

        $p->back_cam = $request->back_cam;
        $p->display_size = $request->display_size;

        $p->internal_storage = $request->internal_storage;
        $p->ram= $request->ram;

        $p->battery=$request->battery;
        $p->os= $request->os;

        $p->chip = $request->chip;
        $p->sensor= $request->sensor;

        $p->color = $request->color;
        $p->save();
        //return response()->json(['message'=>"product successfully added"]);

        // storing image
        // $url="http://127.0.0.1:8000/storage/";
        // $file= $request->file('imagePath');
        // $extension = $file->getClientOriginalExtension();
        // $path = $request->file('imagePath')->storeAs('proimages/',$p->id.'.'.$extension);
        // $p->image=$path;
        // $p->imagePath=$url.$path;
        // $p->save();

    }

    // update product
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'price'=>'required',
            'id'=>'required'
    ]);

        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()->all()], 409);
        }
        $p = product::find($request->id);
        $p->model_name= $request->model_name;

        $p->price=$request->price;
        $p->os= $request->os;

        $p->chip = $request->chip;
        $p->sensor= $request->sensor;

        $p->color = $request->color;
        $p->imagePath = $request->imagePath;
        $p->save();
        return response()->json(['message'=>"product successfully updated"]);


    }

     // delete product
     public function delete(Request $request)
     {
         $validator = Validator::make($request->all(),[
             'id'=>'required'
            ]);
 
         if($validator->fails())
         {
             return response()->json(['error'=>$validator->errors()->all()], 409);
         }
         $p = product::find($request->id)->delete();
         
         return response()->json(['message'=>"product successfully deleted"]);
     }

     // show product
     public function show()
     {
        
         
         $products=product::get()->toArray();

         return response()->json(['products'=>$products]);
     }

     //get data by id
     public function getDataById($id)
     {
        $data = Product::where('id', $id)->first();
        
        return response()->json(['showproducts'=>$data]);
      
     }
}
