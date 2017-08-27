<?php

namespace App\Http\Controllers;

use App\Model\Score;
use App\Model\Review;
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
        $receivedLink = $this->parseUrl($data['link']);

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

        }catch (\Exception $e){
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
        $receivedLink = $this->parseUrl($data['link']);
        $rating = $data['rating'];
        // $rating;
        $mean = 3; // $mean represents a prior for the average of the stars. It's actually the mean of all ratings provided 
        // We consider it 3 for base rate. 3 represents ok / satisfactory/ average in 1 to 5 scale. 
        $constantValue = 10; // $constantValue represents how confident we in our prior.
        // It is equivalent to a number of observations. $constantValue is, the higher the number of reviews required to “get away from $mean”.
        try{
            $score = Score::where('url', $receivedLink)->first();
            
            // $totalNumberofRating = $score->score_one + $score->score_two + $score->score_three + $score->score_four + $score->score_five;
            // if($totalNumberofRating < $constantValue) {
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

                    // $totalSummation = (1* $score->score_one + 2 * $score->score_two + 3*$score->score_three + 4 * $score->score_four + 5 * $score->score_five);
                    // $finalScore = ( ($constantValue * $mean) +  $totalSummation ) / ( $constantValue + $totalNumberofRating );

                    // score of different rating levels

                    // votes of diffrent rating level
                    $votes = 
                    [
                        'L1' => $score->score_one,
                        'L2' => $score->score_two,
                        'L3' => $score->score_three,
                        'L4' => $score->score_four,
                        'L5' => $score->score_five
                    ];

                    $C = 2; // value of choice

                    $levelBaseRate = // base rate of each level
                        [ 
                            'L1' => 0.2,
                            'L2' => 0.2,
                            'L3' => 0.2,
                            'L4' => 0.2,
                            'L5' => 0.2
                        ];

                    $S1 = ($votes['L1'] + ( $C * $levelBaseRate['L1']))/($C + $totalNumberofRating);
                    $S2 = ($votes['L2'] + ( $C * $levelBaseRate['L2']))/($C + $totalNumberofRating);
                    $S3 = ($votes['L3'] + ( $C * $levelBaseRate['L3']))/($C + $totalNumberofRating);
                    $S4 = ($votes['L4'] + ( $C * $levelBaseRate['L4']))/($C + $totalNumberofRating);
                    $S5 = ($votes['L5'] + ( $C * $levelBaseRate['L5']))/($C + $totalNumberofRating);

                    $actualReputationScore = (0*$S1) + (0.25*$S2) + (0.50*$S3) + (0.75*$S4) + (1*$S5);

                    $ratingInOneToFiveScale = ($actualReputationScore*4) + 1;


                    $score->rscore = $ratingInOneToFiveScale;
                    $score->save();

                return Response::json(['success' => 'Posted Successfully'], 200);
                

            // }else{
            //     // $score =Score::where('url',  $receivedLink)->first();
            //     // $score->url = $receivedLink;
            //     if($rating ==1 ){
            //         $score->score_one = $score->score_one+ 1;
            //     }elseif($rating ==2){
            //         $score->score_two = $score->score_two+ 1;
            //     }elseif($rating ==3){

            //         $score->score_three = $score->score_three +1;
            //     }elseif($rating ==4){

            //         $score->score_four = $score->score_four+ 1;
            //     }elseif($rating ==5){

            //         $score->score_five =$score->score_five+ 1;
            //     }
            //     $totalNumberofRating = $score->score_one + $score->score_two + $score->score_three + $score->score_four + $score->score_five;
            //     $totalSummation = (1* $score->score_one + 2 * $score->score_two + 3*$score->score_three + 4 * $score->score_four + 5 * $score->score_five);
            //     $finalScore = ( ($constantValue * $mean) + ( $totalSummation) ) / ( $constantValue + $totalNumberofRating );
            //     $score->rscore = $finalScore;
            //     $score->save();
            //     return Response::json(['success' => 'Updated Successfully'], 200);
            // }

        }catch (\Exception $e){
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

    public function postReview(Request $request) {
        $data = $request->all();
        $receivedLink = $this->parseUrl($data['link']);
        $content = $data['review'];
        $name = $data['name'];

        try{
            $urlId = Score::where('url', $receivedLink)->pluck('id');       
            $review = new Review();
            $review->name = $name;
            $review->content = $content;
            $review->score_id = $urlId;
            $review->save();
            return Response::json(['message' => 'Success'], 200);
        }catch (\Exception $e){
            return Response::json(['message' => 'Something went wrong', 'error_code' => 403], 403);
        }

    }

    public function showReview(Request $request) {
        $data = $request->all();
        $receivedLink = $this->parseUrl($data['link']);
        try{
            $urlId = Score::where('url', $receivedLink)->pluck('id');
            $review = Review::where('score_id', $urlId)->get();

             foreach ($review as $rev){
                 if(empty($rev->name)){
                     $rev['name'] = 'Anonymous';
                 }else{
                     $rev['name'] = $rev->name;
                 }
             }

            return Response::json(['message' => 'Success', 'review' => $review], 200);
        }catch (Exception $e){
            return Response::json(['message' => 'Something went wrong', 'error_code' => 403], 403);
        }

    }

    


    public function chart(Request $request){
        $data = $request->all();
        $receivedLink = $this->parseUrl($data['link']);
        try{
         return   $urlId = Score::where('url', $receivedLink)->first();

            return Response::json(['message' => 'Success', 'review' => $review], 200);
        }catch (Exception $e){
            return Response::json(['message' => 'Something went wrong', 'error_code' => 403], 403);
        }
    }







    public function domainCheck(Request $request){
        $data = $request->all();
        $receivedLink = $this->parseUrl($data['link']);   //remove http(s) and  www
        $url_info = parse_url(urldecode($data['link']));  // decode url
        $domain = $url_info['host'];  //domain
        $main_url = preg_replace('/^www\./', '', $domain); //domain without www


        try{
         $totalScore = Score::where('url', 'LIKE','%'.$main_url.'%')->sum('rscore');
         $totalInput = Score::where('url', 'LIKE','%'.$main_url.'%')->count();

         $domainReputation = $totalScore/$totalInput;

         $array =[
             'domain' => $domain,
             'reputation' => $totalInput,
         ];

            return $array;
        }catch (Exception $e){
            return Response::json(['message' => 'Something went wrong', 'error_code' => 403], 403);
        }
    }





    public  static function parseUrl($str){
        $str2 = urldecode($str);
        $parse = preg_replace('#^https?://#', '', rtrim($str2,'/'));
        return  preg_replace('/^www\./', '', $parse);
    }





}
