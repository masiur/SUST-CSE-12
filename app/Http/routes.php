 <?php
 // use App\User;

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/ff', function () {
    return view('emails.birthday_wish');
});

Route::get('/home', ['as' => 'home2', 'uses' => 'HomeController@index2']); 
Route::get('/we', ['as' => 'we', 'uses' => 'HomeController@profile']);  
Route::get('about', ['as' => 'about', 'uses' => 'HomeController@about']);
Route::get('credit', ['as' => 'credit', 'uses' => 'HomeController@credit']);

Route::get('file/share', ['as' => 'file.share', 'uses' => 'ToolController@index']);
Route::post('file/share/store', ['as' => 'file.share.store', 'uses' => 'ToolController@store']);
Route::get('file/share/show', ['as' => 'file.share.show', 'uses' => 'ToolController@show']);
Route::get('share/{id}', ['as' => 'file.share.download', 'uses' => 'ToolController@download']);

// cv profile code 

Route::get('/profile/{username}', ['as' => 'cvProfile1', 'uses' => 'HomeController@cvProfile']);
Route::get('/me/{username}', ['as' => 'cvProfile', 'uses' => 'HomeController@cvProfile']);

// cv profile code 

Route::group(['middleware' => 'guest'], function(){
	// Password reset link request routes...
	Route::get('password/email', ['as' => 'getEmail', 'uses' => 'Auth\PasswordController@getEmail']);
	Route::post('password/email', ['as' => 'postEmail', 'uses' => 'Auth\PasswordController@postEmail']);

	// Password reset routes...
	Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
	Route::post('password/reset', ['as' => 'postReset' , 'uses' => 'Auth\PasswordController@postReset']);

	// Route::controller('password', 'RemindersController');
	Route::get('login', ['as'=>'login','uses' => 'Auth\AuthController@login']);
	Route::get('user/create', ['as'=>'user.create','uses' => 'UsersController@create']);
	Route::post('user/store', ['as'=>'user.store','uses' => 'UsersController@store']);
	Route::post('login', array('uses' => 'Auth\AuthController@doLogin'));
	Route::post('reset', ['as' => 'reset-password', 'uses' => 'AuthController@resetRequest']);
	Route::get('login/reset_password/users', ['as' => 'reset-page', 'uses' => 'AuthController@resetPage']);
	Route::post('login/reset_password/users', ['as' => 'reset-process', 'uses' => 'AuthController@resetProcess']);

	// social login route
	Route::get('login/fb', ['as'=>'login/fb','uses' => 'SocialController@loginWithFacebook']);
	Route::get('login/gp', ['as'=>'login/gp','uses' => 'SocialController@loginWithGoogle']);

});

Route::group(array('middleware' => 'auth'), function()
{

	Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);
	Route::get('myprofile', ['as' => 'profile', 'uses' => 'ProfileController@profile']);
	Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'HomeController@dashboard'));
	Route::get('change-password', array('as' => 'password.change', 'uses' => 'Auth\AuthController@changePassword'));
	Route::post('change-password', array('as' => 'password.doChange', 'uses' => 'Auth\AuthController@doChangePassword'));


	//skill resource

	Route::get('skill', ['as' => 'skill.index', 'uses' => 'SkillController@index']);
	Route::get('skill/create', ['as' => 'skill.create', 'uses' => 'SkillController@create']);
	Route::post('skill', ['as' => 'skill.store', 'uses' => 'SkillController@store']);
	Route::get('skill/{id}/edit', ['as' => 'skill.edit', 'uses' => 'SkillController@edit']);
	Route::put('skill/{id}/update', ['as' => 'skill.update', 'uses' => 'SkillController@update']);
	Route::delete('skill/{id}', ['as' => 'skill.delete', 'uses' => 'SkillController@destroy']);

	// routine 

	Route::get('routine',['as' => 'routine.index', 'uses' => 'RoutineController@index']);
	Route::get('routine/create',['as' => 'routine.create', 'uses' => 'RoutineController@create']);
	Route::post('routine',['as' => 'routine.store', 'uses' => 'RoutineController@store']);
	Route::get('routine/{id}/edit',['as' => 'routine.edit', 'uses' => 'RoutineController@edit']);
	Route::get('routine/{id}/show',['as' => 'routine.show', 'uses' => 'RoutineController@show']);
	Route::put('routine/{id}',['as' => 'routine.update', 'uses' => 'RoutineController@update']);
	Route::delete('routine/{id}',['as' => 'routine.delete', 'uses' => 'RoutineController@destroy']);

	// projects

	Route::get('project',['as' => 'project.index', 'uses' => 'ProjectController@index']);
	Route::get('project/create',['as' => 'project.create', 'uses' => 'ProjectController@create']);
	Route::post('project',['as' => 'project.store', 'uses' => 'ProjectController@store']);
	Route::get('project/{id}/edit',['as' => 'project.edit', 'uses' => 'ProjectController@edit']);
	Route::get('project/{id}/show',['as' => 'project.show', 'uses' => 'ProjectController@show']);
	Route::put('project/{id}',['as' => 'project.update', 'uses' => 'ProjectController@update']);
	Route::delete('project/{id}',['as' => 'project.delete', 'uses' => 'ProjectController@destroy']);

	// dialogue

	Route::get('dialog',['as' => 'dialog.index', 'uses' => 'DialogController@index']);
	Route::get('dialog/create',['as' => 'dialog.create', 'uses' => 'DialogController@create']);
	Route::post('dialog',['as' => 'dialog.store', 'uses' => 'DialogController@store']);
	Route::get('dialog/{id}/edit',['as' => 'dialog.edit', 'uses' => 'DialogController@edit']);
	Route::get('dialog/{id}/show',['as' => 'dialog.show', 'uses' => 'DialogController@show']);
	Route::put('dialog/{id}',['as' => 'dialog.update', 'uses' => 'DialogController@update']);
	Route::delete('dialog/{id}',['as' => 'dialog.delete', 'uses' => 'DialogController@destroy']);

	// dialogue

	Route::get('notice',['as' => 'notice.index', 'uses' => 'NoticeController@index']);
	Route::get('notice/create',['as' => 'notice.create', 'uses' => 'NoticeController@create']);
	Route::post('notice',['as' => 'notice.store', 'uses' => 'NoticeController@store']);
	Route::get('notice/{id}/edit',['as' => 'notice.edit', 'uses' => 'NoticeController@edit']);
	Route::get('notice/{id}/show',['as' => 'notice.show', 'uses' => 'NoticeController@show']);
	Route::put('notice/{id}',['as' => 'notice.update', 'uses' => 'NoticeController@update']);
	Route::delete('notice/{id}',['as' => 'notice.delete', 'uses' => 'NoticeController@destroy']);

	// dialogue

	Route::get('file',['as' => 'file.index', 'uses' => 'FileController@index']);
	Route::get('file/create',['as' => 'file.create', 'uses' => 'FileController@create']);
	Route::post('file',['as' => 'file.store', 'uses' => 'FileController@store']);
	Route::get('file/{id}/edit',['as' => 'file.edit', 'uses' => 'FileController@edit']);
	Route::get('file/{id}/show',['as' => 'file.show', 'uses' => 'FileController@show']);
	Route::put('file/{id}',['as' => 'file.update', 'uses' => 'FileController@update']);
	Route::delete('file/{id}',['as' => 'file.delete', 'uses' => 'FileController@destroy']);


	Route::get('profile', ['as' => 'profile', 'uses' => 'ProfileController@profile']);
	Route::put('profile/update', array('as' => 'profile.update', 'uses' => 'ProfileController@update'));
	Route::put('photo', array('as' => 'photo.store', 'uses' => 'ProfileController@photoUpload'));

	Route::get('account/edit', ['as' => 'edit.account', 'uses' => 'UsersController@editAccount']);
	Route::post('account/edit', ['as' => 'post.edit.account', 'uses' => 'UsersController@updateAccount']);

	Route::put('cvstore', array('as' => 'cv.store', 'uses' => 'ProfileController@cvUpload'));

	Route::get('data', array('as' => 'rawdata', 'uses' => 'ProfileController@rawdata'));


});






//web engineering
Route::get('web',['as' => 'web.index', 'uses' => 'WebengController@index']);
Route::get('web/create',['as' => 'web.create', 'uses' => 'WebengController@create']);
Route::post('web',['as' => 'web.store', 'uses' => 'WebengController@store']);
Route::get('web/{id}/edit',['as' => 'web.edit', 'uses' => 'WebengController@edit']);
Route::get('web/show',['as' => 'web.show', 'uses' => 'WebengController@show']);
Route::put('web/{id}',['as' => 'web.update', 'uses' => 'WebengController@update']);
Route::delete('web/{id}',['as' => 'web.delete', 'uses' => 'WebengController@destroy']);



 Route::post('api/trs/show',['as' => 'score.show', 'uses' => 'ScoreController@show']);
 Route::post('api/trs/post',['as' => 'score.post', 'uses' => 'ScoreController@post']);
 Route::post('api/trs/postReview',['as' => 'review.show', 'uses' => 'ScoreController@postReview']);
 Route::post('api/trs/showReview',['as' => 'review.post', 'uses' => 'ScoreController@showReview']);
 Route::post('api/trs/chart',['as' => 'review.chart', 'uses' => 'ScoreController@chart']);
 Route::post('api/trs/domainCheck',['as' => 'review.domainCheck', 'uses' => 'ScoreController@domainCheck']);







 Route::get ( '/csv', function () {

     if (($handle = fopen ( public_path () . '/top500.csv', 'r' )) !== FALSE) {
         while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {

             $score = \App\Model\Score::where('url',$data [1])->first();

            if(empty($score)){
                $csv_data = new  \App\Model\Score();
                $csv_data->url = $data [1];
                $csv_data->score_four = rand(30,50);
                $csv_data->score_five =  rand(1,4);
                $csv_data->score_three = rand(1,5);
                $csv_data->score_two = rand(1,3);
                $csv_data->score_one = 0;
                $csv_data->rscore = mt_rand( 40, 50 ) / 10;
                $csv_data->save ();
            }
         }
         fclose ( $handle );
     }

    return  "done";
 } );












 Route::get ( '/dataUpdate', function () {
     $datas = \App\Model\Score::all();
      foreach ($datas as $data){
          $data = \App\Model\Score::where('id', $data->id)->first();
          $str2 = urldecode($data->url);
          $u = preg_replace('#^https?://#', '', rtrim($str2,'/'));
          $domain = preg_replace('/^www\./', '', $u);
          $data->url = $domain;
          $data->save();
      }
 } );




 Route::get ( '/dat', function () {
          $url = 'http://google.com/dhasjkdas/sadsdds/sdda/sdads.html';
             $url_info = parse_url($url);
             return   $domain = $url_info['host'];

 } );



















     Route::get('test',function(){
	 $count = App\Model\WebEng::count();
	for($i =1; $i<$count ; $i++)
		echo $i;
});

Route::get('file',['as' => 'file.index', 'uses' => 'FileController@index']);



/*************************/
/*
@ Developer Area
@ Development Phase Only
*/


/*
@ Auto Code Update via Git
*/

/*
@ git pull origin master
*/
Route::get('git/pull', function () {
	
	//You MUST need to specify the $path according to your project root path
	$path = "cd /var/www/sustcse12.xyz/public_html/SUST-CSE-12/";

	$commands = $path." && git pull origin master";

	SSH::run($commands, function($line)
	{
	    echo "<p align=center>$line</p>";
	});
});



Route::get('pp', function(){

});



/*
@ php artisan migrate
*/
Route::get('artisan/m', function () {
	
	//You MUST need to specify the $path according to your project root path
	$path = "cd /var/www/sustcse12.xyz/public_html/SUST-CSE-12/";

	$commands = $path." && php artisan migrate";

	SSH::run($commands, function($line)
	{
	    echo "<p align=center>$line</p>";
	});
});

/*
@ php artisan migrate refresh
*/
/* Feature Disabled Due to Sensative Data on the Server
Route::get('artisan/mr', function () {
	
	//You MUST need to specify the $path according to your project root path
	$path = "cd /var/www/sustcse12.xyz/public_html/SUST-CSE-12/";

	$commands = $path." && php artisan migrate:refresh --seed";

	SSH::run($commands, function($line)
	{
	    echo "<p align=center>$line</p>";
	});
});


*/