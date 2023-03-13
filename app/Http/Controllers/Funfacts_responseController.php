<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Mail\sendmail;
use App\Models\Funfacts;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Funfacts_response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class Funfacts_responseController extends Controller
{
    public function addAnswer(Request $request,$funfacts_id)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'funfact_response.*.questions_id' => 'required|exists:questions,id',
                    'funfact_response.*.answer_text' => 'required|max:100'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['code' => 422, 'message' => $validator->errors()], 422);
            }
            
            $funfactsid=Funfacts::where('id',$funfacts_id)->first();
            if(!$funfactsid){
                return response()->json(['code' => 500, 'message' => 'Error ! funfact id is not correct .'], 500);
            
            }
            foreach ($request->funfact_response as $text) {

                $response = new Funfacts_response;
                $response->funfacts_id = $funfacts_id;
                $response->questions_id = $text['questions_id'];
                $response->answer_text = $text['answer_text'];
                $response->save();
            }
            $this->createSendPdf($funfacts_id);
            return response()->json(['code' => 200, 'message' => 'Success ! Fun facts has been sent successfully.'], 200);
        } catch (Exception $e) {
            report($e);
            return response()->json(['code' => 500, 'message' => 'Error !Something went wrong .'], 500);
        }
    }
    public function createSendPdf($funfacts_id)
    {
        try {
            $query = Funfacts_response::join('funfacts', 'funfacts.id', '=', 'funfact_response.funfacts_id')
                ->select('funfacts.full_name', 'funfacts.photo','funfacts.date')->where('funfacts_id', $funfacts_id)
                ->first();
            $users = Funfacts_response::join('questions', 'questions.id', '=', 'funfact_response.questions_id')
                ->join('funfacts', 'funfacts.id', '=', 'funfact_response.funfacts_id')
                ->select('funfact_response.*', 'questions.question_type', 'questions.qustion_text')
                ->limit(19)
                ->get();

            $detailespdf = Pdf::loadView('/fun facts', compact('users', 'query'));
            Storage::put(('/public').'/'.$query->full_name.'-OpenEyes Funfacts.pdf', $detailespdf->output());
            $downloadpdf = $detailespdf->download('OpenEyes Funfacts.pdf');

            $mailData = [
                
                "full_name" => $query->full_name,
                "date"=>$query->date
            ];

            Mail::to('ankitkyada23@gmail.com')->send(new sendmail($detailespdf, $mailData));
            return response()->json(['status' => 'Success', 'code' => 200, 'message' => 'Fun facts has been sent successfully.'], 200);
        } catch (Exception $e) {
            report($e);
            return response()->json(['code' => 500, 'message' => 'Error'], 500);
        }
    }
}