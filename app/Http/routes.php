<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('api/user', function (Request $request) {
    return $request->user();
});

Route::get('api/users/current', 'UsersController@current');



Route::get('api/admin/evenements/{id}/comments', 'EvenementController@getComments');
Route::get('api/admin/articles/{id}/comments', 'ArticleControllerApi@getComments');


Route::get('api/admin/getAllCategoriesArticle', 'ArticleControllerApi@getAllCategoriesArticle');
Route::get('api/admin/getAllCategoriesEvenement', 'EvenementController@getAllCategoriesEvenement');
Route::get('api/admin/getCurrentAssociation', 'AssociationController@getCurrentAssociation');

Route::post('api/inscription', 'InscriptionController@inscription');
Route::post('api/desinscription', 'InscriptionController@desinscription');
Route::resource('api/admin/articles', 'ArticleControllerApi');
Route::resource('api/admin/evenements', 'EvenementController');
Route::resource('api/comments', 'CommentController');
Route::post('/api/sendEmailAsso', ['uses' => 'AssociationController@sendEmail'])->name('sendEmailAsso');


Route::get('/', ['uses' => 'PagesController@home']);

Route::get('asso/{diminutif}', ['uses' => 'PagesController@index']);
Route::resource('evenements', 'EvenementController', ['only' => ['show']]);
Route::resource('articles', 'ArticleController', ['only' => ['show']]);
Route::get('/calabar', ['uses' => 'PagesController@calabar']);
Route::get('/famille', ['uses' => 'PagesController@famille']);
Route::get('/monCompte', ['uses' => 'PagesController@monCompte']);

Route::get('login/google', 'Auth\LoginController@redirectToProvider')->name('login');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('admin', ['uses' => 'AdminController@dashboard'])->name('admin');
    Route::resource('admin/articles', 'ArticleController', ['except' => ['show']]);
    Route::resource('admin/evenements', 'EvenementController', ['except' => ['show']]);
    Route::resource('admin/bieres', 'BiereController', ['except' => ['show']]);
    Route::resource('admin/membres', 'MembreController', ['except' => ['show', 'index']]);
    Route::resource('admin/associations', 'AssociationController', ['except' => ['show', 'index', 'destroy']]);
});
Route::resource('admin/actionsFamilles', 'ActionFamilleController', ['except' => ['show']]);


Route::post('inscription', 'InscriptionController@inscription');
Route::post('desinscription', 'InscriptionController@desinscription');

//POUR TEST
//Route::get('logintest', function() {
//    $user = App\User::where('email', 'bde@ensc.fr')->first();
//    Auth::login($user);
//    return back();
//})->name('logintest');
//
//
//Route::get('/back/{all}', function () {
//    return view('pages.back');
//})->where(['all' => '.*']);;


Route::get('/front/{all}', function () {
    return view('front');
})->where(['all' => '.*']);;

// Route::any('{all}', function () {
//     return view('index');
// })
