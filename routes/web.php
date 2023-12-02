<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\AssetController;
use App\Http\Controllers\User\UploadController;
use App\Http\Controllers\Sysadmin\UserController;
use App\Http\Controllers\User\ActivityController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Sysadmin\BusStopController;
use App\Http\Controllers\User\UploadAssetController;
use App\Http\Controllers\Sysadmin\AdmAssetController;
use App\Http\Controllers\Sysadmin\HelpTopicController;
use App\Http\Controllers\Sysadmin\AdmActivityController;
use App\Http\Controllers\Sysadmin\BrandController;
use App\Http\Controllers\Sysadmin\ItemController;
use App\Http\Controllers\User\InventarisController;

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

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Auth::routes();

#Route::get('/test', [TestingController::class, 'index']);
/* bila ingin route seperti versi lara 7, buka routhserviceprovider
kemudian uncomment protected $namespace */

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('Home', [HomeController::class, 'index'])->name('home');
/* ACTIVITY */
Route::get('Activity/Create', [ActivityController::class, 'create'])->name('activity.user.create');
Route::post('Activity/Create', [ActivityController::class, 'store'])->name('createActivity');
Route::get('Activity/{activity:nomor_tiket}/edit', [ActivityController::class, 'edit'])->name('activity.user.edit');
Route::patch('Activity/{activity:nomor_tiket}/edit', [ActivityController::class, 'update'])->name('updateActivity');
Route::get('Activity/{activity:nomor_tiket}/assign', [ActivityController::class, 'assignUser'])->name('activity.user.assign');
Route::patch('Activity/{activity:nomor_tiket}/assign', [ActivityController::class, 'updateAssign'])->name('updateAssign');

Route::post('upload', [UploadController::class, 'store'])->name('upload');
Route::post('upload/perbaikan', [UploadController::class, 'storePerbaikan'])->name('upload.perbaikan');
Route::delete('delete', [UploadController::class, 'delete'])->name('filepond.delete');

/* ASSET */
/* Route::get('Asset/Create', [AssetController::class, 'create'])->name('asset.user.create');
Route::post('Asset/Create', [AssetController::class, 'store'])->name('createAsset');
Route::post('uploadAsset', [UploadAssetController::class, 'store'])->name('uploadAsset');
Route::delete('deleteAsset', [UploadAssetController::class, 'delete'])->name('filepond.asset.delete'); */

/* PARAMETER INVENTARIS */
Route::get('Inventaris', [InventarisController::class, 'index'])->name('inventaris');
Route::get('Inventaris/create', [InventarisController::class, 'create'])->name('inventaris.create');
Route::post('Inventaris/create', [InventarisController::class, 'store'])->name('inventaris.store');
Route::get('Inventaris/edit/{id}', [InventarisController::class, 'edit'])->name('inventaris.edit');
Route::patch('Inventaris/edit/{id}', [InventarisController::class, 'update'])->name('inventaris.update');
Route::get('Inventaris/excel', [InventarisController::class, 'export'])->name('inventaris.excel');

Route::get('changePassword', [ChangePasswordController::class, 'index'])->name('changePassword');
Route::post('changePassword', [ChangePasswordController::class, 'changePassword']);
Route::get('changePasswordExp', [ChangePasswordController::class, 'show'])->name('changePasswordExp');
Route::post('changePasswordExp', [ChangePasswordController::class, 'changePasswordExp']);
/* Route::middleware('auth:admin')->group(function () {
    Route::get('home', 'AdminsController@index')->name('admin.home'); */


Route::prefix('admins')->group(function () {
    Route::group(['middleware' => 'admin'], function () {
        Route::get('home', [HomeController::class, 'handleAdmin'])->name('admin');

        /* REPORT ACTIVITY */
        Route::get('Activity', [AdmActivityController::class, 'index'])->name('admin.listActivity');
        Route::get('Activity/{activity:nomor_tiket}', [AdmActivityController::class, 'show'])->name('admin.showActivity');
        Route::get('Activity/edit/{activity:nomor_tiket}', [AdmActivityController::class, 'edit'])->name('admin.editActivity');
        Route::patch('Activity/edit/{activity:nomor_tiket}', [AdmActivityController::class, 'update'])->name('admin.updateActivity');
        Route::get('Activity/D/{uploadphoto:filename}', [AdmActivityController::class, 'getDownload']);
        Route::view('Find', 'sysadmin.activity.find')->name('findActivity');
        Route::get('Find/search', [AdmActivityController::class, 'searchActivity'])->name('searchActivity');
        Route::get('export-report-search/{range}', [AdmActivityController::class, 'exportActivity']);

        /* REPORT ASSET */
        /* Route::get('Asset', [AdmAssetController::class, 'index'])->name('admin.listAsset');
        Route::get('Asset/{id}', [AdmAssetController::class, 'show'])->name('admin.showAsset');
        Route::get('Asset/edit/{asset:id}', [AdmAssetController::class, 'edit'])->name('admin.editAsset');
        Route::patch('Asset/edit/{asset:id}', [AdmAssetController::class, 'update'])->name('admin.updateAsset');
        Route::get('Asset/D/{uploadasset:filename}', [AdmAssetController::class, 'getDownload']);
        Route::delete('Asset/{asset:id}', [AdmAssetController::class, 'destroy'])->name('admin.deleteAsset'); */

        

        /* PARAMETER HALTE */
        Route::get('Halte', [BusStopController::class, 'index'])->name('halte');
        Route::get('Halte/create', [BusStopController::class, 'create'])->name('halte.create');
        Route::post('Halte/create', [BusStopController::class, 'store'])->name('halte.store');
        Route::get('Halte/{id}/soft', [BusStopController::class, 'create'])->name('halte.restore');
        Route::get('Halte/edit/{id}', [BusStopController::class, 'edit'])->name('halte.edit');
        Route::patch('Halte/edit/{id}', [BusStopController::class, 'update'])->name('halte.update');
        Route::get('Halte/delete/{id}', [BusStopController::class, 'delete'])->name('halte.delete');
        Route::get('Halte/restore/{id}', [BusStopController::class, 'restore'])->name('halte.restore');

        /* PARAMETER HELP TOPICS */
        Route::get('HelpTopic', [HelpTopicController::class, 'index'])->name('helptopic');
        Route::get('HelpTopic/create', [HelpTopicController::class, 'create'])->name('helptopic.create');
        Route::post('HelpTopic/create', [HelpTopicController::class, 'store'])->name('helptopic.store');
        Route::get('HelpTopic/edit/{id}', [HelpTopicController::class, 'edit'])->name('helptopic.edit');
        Route::patch('HelpTopic/edit/{id}', [HelpTopicController::class, 'update'])->name('helptopic.update');
        Route::get('HelpTopic/delete/{id}', [HelpTopicController::class, 'delete'])->name('helptopic.delete');
        Route::get('HelpTopic/restore/{id}', [HelpTopicController::class, 'restore'])->name('helptopic.restore');

        /* PARAMETER BRAND */
        Route::get('Brand', [BrandController::class, 'index'])->name('brand');
        Route::get('Brand/create', [BrandController::class, 'create'])->name('brand.create');
        Route::post('Brand/create', [BrandController::class, 'store'])->name('brand.store');
        Route::get('Brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::patch('Brand/edit/{id}', [BrandController::class, 'update'])->name('brand.update');
        Route::get('Brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
        Route::get('Brand/restore/{id}', [BrandController::class, 'restore'])->name('brand.restore');

        /* PARAMETER ITEM*/
        Route::get('Item', [ItemController::class, 'index'])->name('item');
        Route::get('Item/create', [ItemController::class, 'create'])->name('item.create');
        Route::post('Item/create', [ItemController::class, 'store'])->name('item.store');
        Route::get('Item/edit/{id}', [ItemController::class, 'edit'])->name('item.edit');
        Route::patch('Item/edit/{id}', [ItemController::class, 'update'])->name('item.update');
        Route::get('Item/delete/{id}', [ItemController::class, 'delete'])->name('item.delete');
        Route::get('Item/restore/{id}', [ItemController::class, 'restore'])->name('item.restore');


        /* USER */
        Route::get('User', [UserController::class, 'index'])->name('user');
        Route::get('User/Create', [UserController::class, 'create'])->name('user.create');
        Route::post('User/Create', [UserController::class, 'store'])->name('user.store');
        Route::post('User/{user}', [UserController::class, 'resetUser'])->name('user.reset');
        Route::post('User/{user}/unblock', [UserController::class, 'unblock'])->name('user.unblock');
        Route::get('User/{id}/soft', [UserController::class, 'restore'])->name('user.restore');
        Route::delete('User/{user}', [UserController::class, 'destroy'])->name('user.delete');
        Route::get('User/edit/{user:user_id}', [UserController::class, 'edit'])->name('user.edit');
        Route::patch('User/edit/{user:user_id}', [UserController::class, 'update'])->name('user.update');
    });
});
