<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    //
    public function index()
    {
        $title = "Học lập trình tại Unicode";
        $content = "Học lập trình Laravel 8.x tại Unicode";
        // $dataview = [
        //     'title' =>  $title,
        //     'contentData'   => $content
        // ];
        return view('home')->with([
            'title' => $title,
            'content'   => $content
        ]); //load view home.php
        // return view('home', compact('title', 'content')); //load view home.php
        // return View::make('home')->with([
        //     'title' => $title,
        //     'content'   => $content
        // ]);;
        // $contentView = view('home')->render();
        // // $contentView = $contentView->render();
        // dd($contentView);
    }

    public function getNews()
    {
        return 'Danh sách tin tức';
    }

    public function getCategory($id)
    {
        return 'Chuyên mục: ' . $id;
    }

    public function getProductDetail($id)
    {
        return view('clients.products.detail', compact('id'));
    }
}
