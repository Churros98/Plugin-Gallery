<?php

namespace Azuriom\Plugin\Gallery\Controllers;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Plugin\Gallery\Models\Links;
use Azuriom\Plugin\Gallery\Models\Category;

class GalleryHomeController extends Controller
{
    return view('gallery::index', ['datas' => Category::with('links.image')->get()]);
}
