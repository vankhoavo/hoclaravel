<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct(Request $request)
    {
        // echo 'Welcome';
        /**
         * Nếu là trang danh sách chuyên mục => hiển thị ra dòng chữ: Xin chào Unicode
         */
        // dd($request);
        if ($request->is('categories')) {
            echo '<h3>Xin chào Unicode</h3>';
        }
    }

    // Hiển thị danh sách chuyên mục (Phương thức get)
    public function index(Request $request)
    {
        // if (isset($_GET['id'])) {
        //     echo $_GET['id'];
        // }

        // dd($request);

        // $allData = $request->all();
        // // echo $allData['id'];
        // echo $request->all()['name'];

        // dd($allData);

        // $path = $request->path();
        // echo $path;

        // $url = $request->url(); //chỉ lấy url
        // $fullUrl = $request->fullUrl(); //lấy tất cả đường link
        // echo $fullUrl;

        // $method = $request->method();
        // echo $method;

        // if ($request->isMethod('GET')) {
        //     echo 'Phương thức GET';
        // }

        // $ip = $request->ip();
        // // echo "IP là: " . $ip;

        // $server = $request->server();
        // dd($_SERVER['APP_URL']);

        // $header = $request->header('connection');
        // dd($header);

        // $id = $request->input('id');
        // echo $id;

        // $input = $request->input('id.*.name');

        // $id = $request->id;
        // $name = $request->name;

        // $id = $request->query('id');

        // dd($id);

        // $query = $request->query();
        // dd($query);

        // dd($request);
        // dd(request()->id);

        // $name = request('name','VanKhoa');
        // dd($name);

        return view('clients/categories/list');
    }

    // Lấy ra 1 chuyên mục theo id (Phương thức get)
    public function getCategory($id)
    {
        return view('clients/categories/edit');
    }

    // Sửa 1 chuyên mục (Phương thức post)
    public function updateCategory($id)
    {
        return 'Submit sửa chuyên mục: ' . $id;
    }

    // Show form thêm dữ liệu (Phương thức get)
    public function addCategory(Request $request)
    {
        // $path = $request->path();
        // echo $path;
        // $cateName = $request->old('category_name');

        return view('clients/categories/add');
    }

    // Thêm dữ liệu vào chuyên mục (Phương thức post)
    public function handleAddCategory(Request $request)
    {
        // $allData = $request->all();
        // dd($allData);

        // if ($request->isMethod('POST')) {
        //     echo 'Phương thức POST';
        // }
        // print_r($_POST);
        // return redirect(route('categories.add'));
        // return 'Submit thêm chuyên mục';

        // $cateName = $request->id;

        if ($request->has('category_name')) {
            $cateName = $request->category_name;
            $request->flash(); //set session flash

            return redirect(route('categories.add'));
        } else {
            return 'Không có category_name';
        }
    }

    // Xoá dữ liệu (Phương thức Delete)
    public function deleteCategory($id)
    {
        return 'Submit xoá chuyên mục: ' . $id;
    }

    public function getFile()
    {
        return view('clients/categories/file');
    }

    // Xử lí lấy thông tin file
    public function handleFile(Request $request)
    {
        // $file = $request->file('photo');
        if ($request->hasFile('photo')) {
            if ($request->photo->isValid()) {
                $file = $request->photo;
                // $path = $file->path();
                $ext = $file->extension();
                // $path = $file->store('file-txt','local');
                // $path = $file->storeAs('file-txt','khoahoc.txt');
                // dd($path);
                // $fileName = $file->getClientOriginalName();
                // dd($fileName);

                //Đổi tên
                $fileName = md5(uniqid()).'.'.$ext;
                dd($fileName);

            } else {
                return 'Upload không thành công';
            }
        } else {
            return 'Vui lòng chọn file';
        }
    }
}
