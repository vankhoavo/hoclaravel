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

        $path = $request->path();
        echo $path;

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
        $path = $request->path();
        echo $path;
        return view('clients/categories/add');
    }

    // Thêm dữ liệu vào chuyên mục (Phương thức post)
    public function handleAddCategory(Request $request)
    {
        $allData = $request->all();
        dd($allData);
        // print_r($_POST);
        // return redirect(route('categories.add'));
        // return 'Submit thêm chuyên mục';
    }

    // Xoá dữ liệu (Phương thức Delete)
    public function deleteCategory($id)
    {
        return 'Submit xoá chuyên mục: ' . $id;
    }
}
