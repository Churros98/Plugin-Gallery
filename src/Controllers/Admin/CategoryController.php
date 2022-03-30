<?php

namespace Azuriom\Plugin\Gallery\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Requests\ImageRequest;
use Azuriom\Plugin\Gallery\Models\Links;
use Azuriom\Plugin\Gallery\Models\Category;
use Azuriom\Plugin\Gallery\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Show the category admin page of the plugin.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gallery::admin.category.index', ['categories' => Category::all()]);
    }

    /**
     * Show the create admin page of the plugin.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery::admin.category.action.create');
    }

    /**
     * Show the edit admin page of the plugin.
     *
     * @param Azuriom\Plugin\Gallery\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('gallery::admin.category.action.edit', ['category' => $category]);
    }

    /**
     * Save a newly created Category object
     * 
     * @param \Azuriom\Plugin\Gallery\Requests\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request) {
        $category = Category::create($request->validated());
        return redirect()->route('gallery.admin.category.index')->with('success', trans('gallery::messages.admin.create.success'));
    }

    /**
     * Delete a category
     *
     * @param Azuriom\Plugin\Gallery\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Links::where('category_id', $category->id)->delete();
        $category->delete();
        return redirect()->route('gallery.admin.category.index')->with('success', trans('gallery::messages.admin.destroy.success'));
    }

    /**
     * Update the Category object
     * 
     * @param \Azuriom\Plugin\Gallery\Requests\CategoryRequest  $request
     * @param Azuriom\Plugin\Gallery\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('gallery.admin.category.index')->with('success', trans('gallery::messages.admin.edit.success'));
    }
}
