<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Funfacts;
use Illuminate\Http\Request;
use TheSeer\Tokenizer\Exception;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;


class FunfactsController extends Controller
{
    public function add(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'full_name' => 'required',
                    'photo'=> 'required|mimes:png,jpeg,jpg,jfif'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['code' => 422, 'message' => $validator->errors()], 422);
            }
 
            $funfacts = new Funfacts;
            $funfacts->full_name = $request->full_name;
            $funfacts->date = Carbon::now();

            if ($request->hasfile('photo')) {
                $file = $request->file('photo');
                $xyz = $file->getClientOriginalName();
                $filename = time() . '.' . $xyz;
                $file->move('reports/', $filename);
                $funfacts->photo = $filename;
            }
            $funfacts->save();
            $funfact_id = $funfacts->id;
            return response()->json(['code' => 200, 'message' => 'Success', 'funfact_id' => $funfact_id], 200);
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'message' => 'Error'], 500);
        }
    }
}