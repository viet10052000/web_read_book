<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = Category::orderBy('id','DESC')->get();
        return view('admin.category.index')->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|max:255|unique:categories',
                'description' => 'required|max:255',
                'slug' => 'required|max:255',
                'active' => 'required',
            ],
            [
                'name.required' => 'chưa điền tên danh mục',
                'name.max' => 'tên danh mục không quá 255 kí tự',
                'name.unique' => 'tên danh mục đã tồn tại',
                'description.required' => 'chưa điền mô tả',
                'description.max' => 'mô tả không quá 255 kí tự',
            ]
        );
        $category = new Category();
        $category->name = $data['name'];
        $category->description = $data['description'];
        $category->slug = $data['slug'];
        $category->active = $data['active'];
        $category->save();
        return redirect()->route('category.index')->with('status','thêm danh mục thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'name' => 'required|max:255',
                'description' => 'required|max:255',
                'slug' => 'required|max:255',
                'active' => 'required',
            ],
            [
                'name.required' => 'chưa điền tên danh mục',
                'name.max' => 'tên danh mục không quá 255 kí tự',
                'name.unique' => 'tên danh mục đã tồn tại',
                'description.required' => 'chưa điền mô tả',
                'description.max' => 'mô tả không quá 255 kí tự',
            ]
        );
        $category = Category::find($id);
        $category->name = $data['name'];
        $category->description = $data['description'];
        $category->slug = $data['slug'];
        $category->active = $data['active'];
        $category->save();
        return redirect()->route('category.index')->with('status','Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('status','Xóa danh mục thành công');
    }

}
