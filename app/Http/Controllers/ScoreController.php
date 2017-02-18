<?php

namespace App\Http\Controllers;

use App\Model\Score;
use Illuminate\Http\Request;
use Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mockery\CountValidator\Exception;

class ScoreController extends Controller
{



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        try{
            $score = Score::where('url', $request->link)->first();
            if($score != null){
                return Response::json(['message' => 'Success','score' => $score ], 200);
            }else{
                return Response::json(['message' => 'No data Found','score' => $score ], 200);
            }

        }catch (Exception $e){
            return Response::json(['message' => 'Something went wrong', 'error_code' => 403], 403);
        }
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function post(Request $request)
    {

        //return $request->all();


        try{
            $score = Score::where('url','LIKE', $request->link)->first();
            if($score == null){
                    $ss = new Score();
                    $ss->url = $request->link;
                    if($request->score_one != null){
                        $ss->score_one = 1;
                    }elseif($request->score_two != null){

                        $ss->score_two = 2;
                    }elseif($request->score_three != null){
                        $ss->score_three = 3;
                    }elseif($request->score_four != null){
                        $ss->score_four =4;
                    }elseif($request->score_five != null){

                        $ss->score_five =5;
                    }

                    $ss->save();

                return Response::json(['success' => 'Posted Successfully'], 200);

            }else{
                $ss =Score::where('url', 'LIKE', $request->link)->first();
                $ss->url = $request->link;
                if($request->score_one != null){
                    $ss->score_one =$score->score_one+ 1;
                }elseif($request->score_two != null){
                    $ss->score_two = $score->score_two+ 2;
                }elseif($request->score_three != null){

                    $ss->score_three = $score->score_three+ 3;
                }elseif($request->score_four != null){

                    $ss->score_four = $score->score_four+ 4;
                }elseif($request->score_five != null){

                    $ss->score_five =$score->score_five+ 5;
                }

                $ss->save();
                return Response::json(['success' => 'Posted Successfully'], 200);
            }

        }catch (Exception $e){
            return Response::json(['message' => 'Something went wrong', 'error_code' => 403], 403);
        }
    }


}
