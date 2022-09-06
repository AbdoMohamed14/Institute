<?php

use App\Http\Controllers\UserController;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Frontend\EventsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GalleryPhotoController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestimonialController;
use App\Models\Article;
use App\Models\Event;
use App\Models\Instructor;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/changeLang/{locale}', function($locale){

    Session::put('locale', $locale);
    App::setLocale($locale);
   
    return redirect()->back();

})->middleware('check.locale')->name('set_locale');


Route::middleware(['check.locale'])->group(function () {
    
    Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('contact-us', function(){
    $events= Event::latest()->take(3)->get();
    $articles= Article::latest()->take(3)->get();
    return view('frontend.contact-us.contact-us', compact('events', 'articles') );
})->name('contact-us');

Route::get('about-us', function(){
    $events= Event::latest()->take(3)->get();
    $articles= Article::latest()->take(3)->get();

    return view('frontend.about-us.about-us', compact('events', 'articles'));
})->name('about-us');

Route::get('articles', function(){
     $articles=Article::all();
     $events= Event::latest()->take(3)->get();
    return view('frontend.articles.index',compact('articles', 'events'));

})->name('articles.index');

Route::get('articles/{id}', function($id){
    $events= Event::latest()->take(3)->get();
    $article=Article::find($id);
   return view('frontend.articles.show',compact('article', 'events'));

})->name('articles.show');

Route::get('instructors', function(){
    $events= Event::latest()->take(3)->get();
    $instructors = Instructor::all();
    return view('frontend.instructors.index', compact('instructors', 'events'));

})->name('instructors.index');

Route::get('instructors/{id}', function($id){

    $instructors = Instructor::find($id);
    $events= Event::latest()->take(3)->get();
    $articles=Article::latest()->take(3)->get();
    return view('frontend.instructors.show', compact('instructors', 'events', 'articles'));

})->name('instructors.show');

Route::resource('events', EventsController::class);
});





            /////// Dashboard Routes//////

Auth::routes();

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth', 'as' => 'dashboard.'], function(){

    Route::get('', [IndexController::class, 'index']);

    Route::resource('articles', ArticleController::class);

    Route::post('user/reset_password', [UserController::class, 'reset_password'])->name('reset_password');


    Route::get('user/edit_profile', [UserController::class, 'edit_profile'])->name('edit_profile');

    Route::resource('settings', SettingController::class);

    Route::resource('users', UserController::class);

    Route::resource('categories', CategoryController::class);

    Route::resource('instructors', InstructorController::class);

    Route::resource('events', EventController::class);

    Route::resource('galleries', GalleryController::class);

    Route::resource('gallery_photos', GalleryPhotoController::class);

    Route::resource('contacts', ContactsController::class);

    Route::resource('testmonials', TestimonialController::class);

    Route::post('add_slider_image', [SettingController::class, 'addToSlider'])->name('slider_add');

    Route::post('update_slider/{id}', [SettingController::class, 'update_slider'])->name('slider_update');

    Route::delete('remove_slider/{id}', [SettingController::class, 'remove_slider'])->name('slider_remove');


});





