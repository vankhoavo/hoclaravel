<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;

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

// Route::get('/', function () {
//     // return view('home');
//     return view('welcome');
// });

// // Route::get('/unicode', function(){
// //     return view('home');
// //     // $user = new User();
// //     // $allUser = $user::all();
// //     // dd($allUser);
// // });

// Route::get('/san-pham', function(){
//     return view('product');
// });

// Route::get('/test', function(){
//     $html = '<h1>Học lập trình tại Unicode</h1>';
//     return $html;
// });

// Route::get('/test1', function(){
//     return view('form');
// });

// Route::post('/test1', function(){
//     return 'Phương thức Post của path/ unicode';
// });

// Route::put('/test1', function(){
//     return 'Phương thức Put của path/ unicode';
// });

// Route::delete('/test1', function(){
//     return 'Phương thức Delete của path/ unicode';
// });

// Route::patch('/test1', function(){
//     return 'Phương thức Patch của path/ unicode';
// });

// Route::match(['get', 'post'], 'unicode', function(){
//     return $_SERVER['REQUEST_METHOD'];
// });

// Route::any('/unicode', function(Request $request){
//     $request = new Request();
//     return $request->method();
//     // return $_SERVER['REQUEST_METHOD'];
// });

// Route::get('/show-form', function(){
//     return view('form');
// });

// Route::redirect('/unicode', 'show-form', 302);
// Yêu cầu phải sử dụng 301 302

// Route::view('show-form', 'form');

Route::prefix('admin')->group(function () {
    Route::get('tin-tuc/{id?}/{slug?}', function ($id = null, $slug = null) {
        $content = 'Phương thức Get của path/ unicode: ';
        $content .= "có id: " . $id . '<br/>';
        $content .= "có slug: " . $slug;
        return $content;
    });

    Route::get('show-form', function () {
        return view('form');
    });

    Route::prefix('products')->group(function () {
        Route::get('/', function () {
            return 'Danh sách sản phẩm';
        });
        Route::get('/add', function () {
            return 'Thêm sản phẩm';
        });
        Route::get('/edit', function () {
            return 'Sửa sản phẩm';
        });
        Route::get('/delete', function () {
            return 'Xoá sản phẩm';
        });
    });
});
