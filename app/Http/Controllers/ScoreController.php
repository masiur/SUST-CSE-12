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
        $data = $request->all();
        $receivedLink = $data['link'];

        try{
            $score = Score::where('url', $receivedLink)->first();
            
            if($score != null){

                $finalScore = $score->score_one + $score->score_two + $score->score_three + $score->score_four + $score->score_five;
                    $finalScore = $finalScore/5;
                return Response::json(['message' => 'Success','score' => $finalScore], 200);
            }else{
                $score = new Score();
                $score->url = $receivedLink;
                $score->save();
                $finalScore = $score->score_one + $score->score_two + $score->score_three + $score->score_four + $score->score_five;
                $finalScore = $finalScore/5;
                return Response::json(['message' => 'Success','score' => $finalScore], 200);
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

        $data = $request->all();
        $receivedLink = $data['link'];
        $rating = $data['rating'];
        // $rating;
        try{
            $score = Score::where('url', $request->link)->first();
            if($score == null) {
                    // $ss = new Score();
                    // $ss->url = $request->link;
                    if( $request->rating ==1){
                        $score->score_one = 1;
                    }elseif($request->rating ==2){

                        $score->score_two = 2;
                    }elseif($request->rating ==3){

                        $score->score_three = 3;
                    }elseif($request->rating ==4){

                        $score->score_four =4;
                    }elseif($request->rating ==5){
                        $score->score_five =5;
                    }

                    // $score
                        $score->save();

                return Response::json(['success' => 'Posted Successfully'], 200);

            }else{
                $score =Score::where('url',  $request->link)->first();
                // $score->url = $request->link;
                if($request->rating ==1 ){
                    $score->score_one = $score->score_one+ 1;
                }elseif($request->rating ==2){
                    $score->score_two = $score->score_two+ 1;
                }elseif($request->rating ==3){

                    $score->score_three = $score->score_three +2;
                }elseif($request->rating ==4){

                    $score->score_four = $score->score_four+ 4;
                }elseif($request->rating ==5){

                    $score->score_five =$score->score_five+ 5;
                }

                $score->save();
                return Response::json(['success' => 'Updated Successfully'], 200);
            }

        }catch (Exception $e){
            return Response::json(['message' => 'Something went wrong', 'error_code' => 403], 403);
        }
    }


}
