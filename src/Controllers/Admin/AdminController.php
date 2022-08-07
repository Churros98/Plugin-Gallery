<?php

namespace Azuriom\Plugin\Gallery\Controllers\Admin;

use Illuminate\Http\Request;
use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Requests\ImageRequest;
use Azuriom\Models\Image;
use Azuriom\Plugin\Gallery\Models\Links;
use Azuriom\Plugin\Gallery\Models\Category;

class AdminController extends Controller
{
    /**
     * Show the images admin page of the plugin.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = [];
        $images = Image::paginate();
        $links = Links::all();
        
        foreach ($images as $image) {
            $data = [];
            $data['image'] = $image;
            $data['category_selected'] = -1;

            foreach ($links as $link) {
                if ($link->image_id == $image->id)
                    $data['category_selected'] = $link->category_id;
            }

            $datas[] = $data;
        }

        return view('gallery::admin.index', ['images' => $datas, 'links' => $images->links(), 'categories' => Category::all()]);
    }

    /**
     * Set the category on an image
     * 
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function set(Request $request)
    {
        $data = $this->validate($request, [
            'image' => ['required', 'integer'],
            'category' => ['required', 'integer']
        ]);

        $image_id = $request->input('image');
        $category_id = $request->input('category');

        if ($category_id < 0) {
            $link = Links::firstWhere('image_id', $image_id);
            if ($link != null)
                $link->delete();
        } else {
            Links::firstOrCreate(['image_id' => $image_id], ['category_id' => $category_id])->update(['category_id' => $category_id]);
        }
        
        return  response()->json([]);
    }
    
}
