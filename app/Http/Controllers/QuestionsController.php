<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class QuestionsController extends Controller
{
    public function getData()
    {
        try {
            $users = Questions::select('id','question_type','qustion_text')->OrderBy('id','ASC')->get();
            return response()->json(['code' => 200, 'data' => $users], 200);
        } catch (Exception $e) {
            report($e);
            return response()->json(['code' => 500, 'message' => 'Error'], 500);
        }
    }
}