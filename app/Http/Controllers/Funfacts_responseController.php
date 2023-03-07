<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Funfacts;
use App\Mail\sendmail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Funfacts_response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Validator;


class Funfacts_responseController extends Controller
{
    public function addAnswer(Request $request, $funfacts_id)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    // 'answer_text' => 'required|min:3|max:100'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['code' => 422, 'message' => $validator->errors()], 422);
            }

            foreach ($request->funfact_response as $text) {

                $response = new Funfacts_response;
                $response->funfacts_id = $funfacts_id;

                $response->questions_id = $text['questions_id'];
                $response->answer_text = $text['answer_text'];
                $response->save();
            }
            return response()->json(['code' => 200, 'message' => 'Success ! Answer has been submitted'], 200);
        } catch (Exception $e) {
            report($e);
            return response()->json(['code' => 500, 'message' => 'Error ! Answer has been not submitted'], 500);
        }
    }
    public function createSendPdf()
    {
        try {

            $query = Funfacts_response::join('funfacts', 'funfacts.id', '=', 'funfact_response.funfacts_id')
                ->select('funfacts.full_name', 'funfacts.photo')
                ->first();
            
            $users = Funfacts_response::join('questions', 'questions.id', '=', 'funfact_response.questions_id')
                ->join('funfacts', 'funfacts.id', '=', 'funfact_response.funfacts_id')
                ->select('funfact_response.*', 'funfacts.full_name', 'funfacts.photo', 'questions.question_type', 'questions.qustion_text')
                ->get();


            $detailespdf = Pdf::loadView('/fun facts', compact('users', 'query'));

            $pdf = Storage::put('/public/OpenEyes Funfacts.pdf/', $detailespdf->output());
             $downloadpdf = $detailespdf->download('OpenEyes Funfacts.pdf');
            Mail::to('ankitkyada23@gmail.com')->send(new sendmail($detailespdf));
            return response()->json(['status' => 'Success', 'code' => 200, 'message' => 'Fun facts has been sent successfully.'], 200);
        } catch (Exception $e) {
            report($e);
            return response()->json(['code' => 500, 'message' => 'Error'], 500);
        }
    }
}