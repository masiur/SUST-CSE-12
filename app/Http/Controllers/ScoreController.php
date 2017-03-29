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
            // $totalNumberofRating = $score->score_one + $score->score_two + $score->score_three + $score->score_four + $score->score_five;
            if($score != null){

                $finalScore =  $score->rscore; 

                return Response::json(['message' => 'Success','score' => $finalScore], 200);
            }else{
                $score = new Score();
                $score->url = $receivedLink;
                $score->save();
                $finalScore =  $score->rscore;
                return Response::json(['message' => 'Success','score' => 3.00], 200);
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
        $mean = 3; // $mean represents a prior for the average of the stars. It's actually the mean of all ratings provided 
        // We consider it 3 for base rate. 3 represents ok / satisfactory/ average in 1 to 5 scale. 
        $constantValue = 10; // $constantValue represents how confident we in our prior.
        // It is equivalent to a number of observations. $constantValue is, the higher the number of reviews required to “get away from $mean”.
        try{
            $score = Score::where('url', $receivedLink)->first();
            
            $totalNumberofRating = $score->score_one + $score->score_two + $score->score_three + $score->score_four + $score->score_five;
            if($totalNumberofRating < $constantValue) {
                    // $ss = new Score();
                    // $ss->url = $request->link;
                    if( $rating ==1){
                        $score->score_one++;
                    }elseif($rating ==2){

                        $score->score_two++;
                    }elseif($rating ==3){

                        $score->score_three++;
                    }elseif($rating ==4){

                        $score->score_four++;
                    }elseif($rating ==5){
                        $score->score_five++;
                    }
                    $totalNumberofRating = $score->score_one + $score->score_two + $score->score_three + $score->score_four + $score->score_five;
                    $totalSummation = (1* $score->score_one + 2 * $score->score_two + 3*$score->score_three + 4 * $score->score_four + 5 * $score->score_five);
                    $finalScore = ( ($constantValue * $mean) + ($totalNumberofRating * $totalSummation) ) / ( $constantValue + $totalNumberofRating );
                    $score->rscore = $finalScore;
                    $score->save();

                return Response::json(['success' => 'Posted Successfully'], 200);
                

            }else{
                // $score =Score::where('url',  $receivedLink)->first();
                // $score->url = $receivedLink;
                if($rating ==1 ){
                    $score->score_one = $score->score_one+ 1;
                }elseif($rating ==2){
                    $score->score_two = $score->score_two+ 1;
                }elseif($rating ==3){

                    $score->score_three = $score->score_three +1;
                }elseif($rating ==4){

                    $score->score_four = $score->score_four+ 1;
                }elseif($rating ==5){

                    $score->score_five =$score->score_five+ 1;
                }
                $totalNumberofRating = $score->score_one + $score->score_two + $score->score_three + $score->score_four + $score->score_five;
                $totalSummation = (1* $score->score_one + 2 * $score->score_two + 3*$score->score_three + 4 * $score->score_four + 5 * $score->score_five);
                $finalScore = ( ($constantValue * $mean) + ($totalNumberofRating * $totalSummation) ) / ( $constantValue + $totalNumberofRating );
                $score->rscore = $finalScore;
                $score->save();
                return Response::json(['success' => 'Updated Successfully'], 200);
            }

        }catch (Exception $e){
            return Response::json(['message' => 'Something went wrong', 'error_code' => 403], 403);
        }
    }

    // private function summationOfRating($rating) {
    //     if ($rating == 1 )
    // }

    // private function totalNumberofRating() {
    //     $score =
    //     return $score->score_one + $score->score_two + $score->score_three + $score->score_four + $score->score_five;
    // }

    


}
