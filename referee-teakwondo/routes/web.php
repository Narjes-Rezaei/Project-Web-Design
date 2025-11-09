<?php

use App\Http\Controllers\Admin\AccessController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DegreeController;
use App\Http\Controllers\Admin\EventRankController;
use App\Http\Controllers\Admin\EventTypeController;
use App\Http\Controllers\Admin\GenderController;
use App\Http\Controllers\Admin\MatchVideoController;
use App\Http\Controllers\Admin\OurBlogController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\RefereeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Home\MasterController;
use App\Http\Controllers\ProfileController;
use App\Models\Admin\EventType;
use App\Models\Admin\Gender;
use App\Models\Admin\Province;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
 // index
Route::get('/dashboard', function () {
    return view('admin/master');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/',[MasterController::class , 'master'])->name('/');
Route::get('/matches',[MasterController::class , 'matches'])->name('matches');
Route::get('/players',[MasterController::class , 'players'])->name('players');
Route::get('/blog',[MasterController::class , 'blog'])->name('blog');
Route::get('/contact',[MasterController::class , 'contact'])->name('contact');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});








// admin

// admin panel
Route::get('/zodiac',[AdminController::class , 'admin'])->name('zodiac');

// match video
Route::get('/show-match-video',[MatchVideoController::class , 'showMatchVideo'])->name('show-match-video');
Route::get('/add-match-video',[MatchVideoController::class , 'addMatchVideo'])->name('add-match-video');
Route::post('/store-match-video',[MatchVideoController::class , 'storeMatchVideo'])->name('store-match-video');
Route::get('/edit-match-video{id}',[MatchVideoController::class , 'editMatchVideo'])->name('edit-match-video');
Route::put('/update-match-video{id}',[MatchVideoController::class , 'updateMatchVideo'])->name('update-match-video');
Route::get('/remove-match-video/{id}',[MatchVideoController::class , 'removeMatchVideo'])->name('remove-match-video');

// our blog
Route::get('/show-our-blog', [OurBlogController::class , 'showOurBlog'])->name('show-our-blog');
Route::get('/add-our-blog', [OurBlogController::class , 'addOurBlog'])->name('add-our-blog');
Route::post('/store-our-blog', [OurBlogController::class , 'storeOurBlog'])->name('store-our-blog');
Route::get('/edit-our-blog{id}', [OurBlogController::class , 'editOurBlog'])->name('edit-our-blog');
Route::put('/update-our-blog{id}', [OurBlogController::class , 'updateOurBlog'])->name('update-our-blog');
Route::get('/remove-our-blog/{id}', [OurBlogController::class , 'removeOurBlog'])->name('remove-our-blog');

// user
Route::get('/add-user', [UserController::class , 'addUser'])->name('add-user');
Route::post('/store-user', [UserController::class , 'storeUser'])->name('store-user');
Route::get('/edit-user{id}', [UserController::class , 'editUser'])->name('edit-user');
Route::put('/update-user{id}', [UserController::class , 'updateUser'])->name('update-user');
Route::get('/remove-user/{id}', [UserController::class , 'removeUser'])->name('remove-user');
Route::get('/check-super-user/{id}', [UserController::class , 'checkSuperUser'])->name('check-super-user');
Route::get('/check-sttaf/{id}', [UserController::class , 'checkSttaf'])->name('check-sttaf');



// event rank
Route::get('/show-event-rank', [EventRankController::class , 'showEventRank'])->name('show-event-rank');
Route::get('/add-event-rank', [EventRankController::class , 'addEventRank'])->name('add-event-rank');
Route::post('/store-event-rank', [EventRankController::class , 'storeEventRank'])->name('store-event-rank');
Route::get('/edit-event-rank{id}', [EventRankController::class , 'editEventRank'])->name('edit-event-rank');
Route::put('/update-event-rank{id}', [EventRankController::class , 'updateEventRank'])->name('update-event-rank');
Route::get('/remove-event-rank/{id}', [EventRankController::class , 'removeEventRank'])->name('remove-event-rank');


// permission
Route::get('/show-permission', [PermissionController::class , 'showPermission'])->name('show-permission');
Route::get('/add-permission', [PermissionController::class , 'addPermission'])->name('add-permission');
Route::post('/store-permission', [PermissionController::class , 'storePermission'])->name('store-permission');
Route::get('/edit-permission{id}', [PermissionController::class , 'editPermission'])->name('edit-permission');
Route::put('/update-permission{id}', [PermissionController::class , 'updatePermission'])->name('update-permission');
Route::get('/remove-permission/{id}', [PermissionController::class , 'removePermission'])->name('remove-permission');


// event type
Route::get('/show-event-type', [EventTypeController::class , 'showEventType'])->name('show-event-type');
Route::get('/add-event-type', [EventTypeController::class , 'addEventType'])->name('add-event-type');
Route::post('/store-event-type', [EventTypeController::class , 'storeEventType'])->name('store-event-type');
Route::get('/edit-event-type{id}', [EventTypeController::class , 'editEventType'])->name('edit-event-type');
Route::put('/update-event-type{id}', [EventTypeController::class , 'updateEventType'])->name('update-event-type');
Route::get('/remove-event-type/{id}', [EventTypeController::class , 'removeEventType'])->name('remove-event-type');


// province
Route::get('/show-province', [ProvinceController::class , 'showProvince'])->name('show-province');
Route::get('/add-province', [ProvinceController::class , 'addProvince'])->name('add-province');
Route::post('/store-province', [ProvinceController::class , 'storeProvince'])->name('store-province');
Route::get('/edit-province{id}', [ProvinceController::class , 'editProvince'])->name('edit-province');
Route::put('/update-province{id}', [ProvinceController::class , 'updateProvince'])->name('update-province');
Route::get('/remove-province/{id}', [ProvinceController::class , 'removeProvince'])->name('remove-province');


// role
Route::get('/show-role', [RoleController::class , 'showRole'])->name('show-role');
Route::get('/add-role', [RoleController::class , 'addRole'])->name('add-role');
Route::post('/store-role', [RoleController::class , 'storeRole'])->name('store-role');
Route::get('/edit-role{id}', [RoleController::class , 'editRole'])->name('edit-role');
Route::put('/update-role{id}', [RoleController::class , 'updateRole'])->name('update-role');
Route::get('/remove-role/{id}', [RoleController::class , 'removeRole'])->name('remove-role');


// Gender
Route::get('/show-gender', [GenderController::class , 'showGender'])->name('show-gender');
Route::get('/add-gender', [GenderController::class , 'addGender'])->name('add-gender');
Route::post('/store-gender', [GenderController::class , 'storeGender'])->name('store-gender');
Route::get('/edit-gender{id}', [GenderController::class , 'editGender'])->name('edit-gender');
Route::put('/update-gender{id}', [GenderController::class , 'updateGender'])->name('update-gender');
Route::get('/remove-gender/{id}', [GenderController::class , 'removeGender'])->name('remove-gender');

// Degree
Route::get('/show-degree', [DegreeController::class , 'showDegree'])->name('show-degree');
Route::get('/add-degree', [DegreeController::class , 'addDegree'])->name('add-degree');
Route::post('/store-degree', [DegreeController::class , 'storeDegree'])->name('store-degree');
Route::get('/edit-degree{id}', [DegreeController::class , 'editDegree'])->name('edit-degree');
Route::put('/update-degree{id}', [DegreeController::class , 'updateDegree'])->name('update-degree');
Route::get('/remove-degree/{id}', [DegreeController::class , 'removeDegree'])->name('remove-degree');

// Referee
Route::get('/show-referee', [RefereeController::class , 'showReferee'])->name('show-referee');
Route::get('/add-referee', [RefereeController::class , 'addReferee'])->name('add-referee');
Route::post('/store-referee', [RefereeController::class , 'storeReferee'])->name('store-referee');
Route::get('/edit-referee{id}', [RefereeController::class , 'editReferee'])->name('edit-referee');
Route::put('/update-referee{id}', [RefereeController::class , 'updateReferee'])->name('update-referee');
Route::get('/remove-referee/{id}', [RefereeController::class , 'removeReferee'])->name('remove-referee');

//access
Route::get('user-access{id}' , [AccessController::class , 'userAccess'])->name('user-access');
Route::put('update-access-user/{id}' , [AccessController::class , 'updateAccessUser'])->name('update-access-user');


require __DIR__.'/auth.php';
