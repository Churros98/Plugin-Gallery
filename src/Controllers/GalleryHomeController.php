<?php

namespace Azuriom\Plugin\Gallery\Controllers;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Plugin\Gallery\Models\Links;
use Azuriom\Plugin\Gallery\Models\Category;

class GalleryHomeController extends Controller
{
    /**
     * Show the home plugin page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Links::all();
        $categories = Category::all();

        $datas = [];

        foreach ($links as $link) {

            $exist = false;
            foreach ($datas as &$data) {
                if ($data['category']->id == $link->category->id) {
                    $exist = true;
                    array_push($data['images'], $link->image);
                    break;
                }
            }

            if (!$exist) {
                array_push($datas, ['category' => $link->category, 'images' => [$link->image]]);
            }
        }
        
        return view('gallery::index', ['datas' => $datas]);
    }
}
