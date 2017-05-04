 <?php
 // use App\User;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/',  function(){
//  $students = [ 
//                         '2012331002',
//                         '2012331005',
//                         '2012331007',
//                         '2012331008',
//                         '2012331009',
//                         '2012331012',
//                         '2012331013',
//                         '2012331014',
//                         '2012331015',
//                         '2012331016',
//                         '2012331017',
//                         '2012331019',
//                         '2012331020',
//                         '2012331023',
//                         '2012331024',
//                         '2012331025',
//                         '2012331027',
//                         '2012331028',
//                         '2012331029',
//                         '2012331030',
//                         '2012331031',
//                         '2012331033',
//                         '2012331034',
//                         '2012331035',
//                         '2012331039',
//                         '2012331039',
//                         '2012331041',
//                         '2012331043',
//                         '2012331045',
//                         '2012331046',
//                         '2012331047',
//                         '2012331048',
//                         '2012331049',
//                         '2012331051',
//                         '2012331052',
//                         '2012331054',
//                         '2012331055',
//                         '2012331056',
//                         '2012331057',
//                         '2012331057',
//                         '2012331059',
//                         '2012331060',
//                         '2012331062',
//                         '2012331063',
//                         '2012331064',
//                         '2012331065',
//                         '2012331066',
//                         '2012331067',
//                         '2012331068',
//                         '2012331069',
//                         '2012331070',
//                         '2012331071',
//                         '2012331072',
//                         '2012331073',
//                         '2012331074'
//                     ];
//         // foreach ($students as  $user) {
//         //     echo "<br>".$user; 
//         // }
//                     // $file = pubic_path('upload/data.csv')
//      $csv = array_map('str_getcsv', file(public_path('upload/data.csv')));
//      foreach ($csv as $key => $value) {
//      	if ($key != 0) {
//      		echo $value[0]."<br>"; // reg
//      		echo $value[1]."<br>"; // email
//      		echo $value[2]."<br>"; // sustmail
//      		echo $value[3]."<br>"; // firstname
//      		echo $value[4]."<br>"; // lastname 
//      		echo $value[5]."<br>"; // mobile
//      		echo $value[6]."<br>"; // dept
//      		echo $value[7]."<br>"; // sesion
//      		// echo $value[8]."<br>";

//      		echo "<br><br>";
//      	}

//      }
// });

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('/home', ['as' => 'home2', 'uses' => 'HomeController@index2']); // 

Route::get('file/share', ['as' => 'file.share', 'uses' => 'ToolController@index']);
Route::post('file/share/store', ['as' => 'file.share.store', 'uses' => 'ToolController@store']);
Route::get('file/share/show', ['as' => 'file.share.show', 'uses' => 'ToolController@show']);
Route::get('share/{id}', ['as' => 'file.share.download', 'uses' => 'ToolController@download']);

// cv profile code 

Route::get('/profile/{username}', ['as' => 'cvProfile', 'uses' => 'HomeController@cvProfile']);

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


	Route::get('account/edit', ['as' => 'edit.account', 'uses' => 'UsersController@editAccount']);
	Route::post('account/edit', ['as' => 'post.edit.account', 'uses' => 'UsersController@updateAccount']);
	Route::put('profile/update', array('as' => 'profile.update', 'uses' => 'ProfileController@update'));
	Route::put('photo', array('as' => 'photo.store', 'uses' => 'ProfileController@photoUpload'));

	Route::put('cvstore', array('as' => 'cv.store', 'uses' => 'ProfileController@cvUpload'));


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











Route::get('test',function(){
	 $count = App\Model\WebEng::count();
	for($i =1; $i<$count ; $i++)
		echo $i;
});

Route::get('file',['as' => 'file.index', 'uses' => 'FileController@index']);
