<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $genres = Genre::orderBy('id','DESC')->get();
        return view('admin.genre.index')->with(compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.genre.create');
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
                'name' => 'required|max:255|unique:genres',
                'slug' => 'required|max:255',
                'active' => 'required',
            ],
            [
                'name.required' => 'chưa điền tên danh mục',
                'name.max' => 'tên danh mục không quá 255 kí tự',
                'name.unique' => 'tên danh mục đã tồn tại',
            ]
        );
        $genre = new Genre();
        $genre->name = $data['name'];
        $genre->slug = $data['slug'];
        $genre->active = $data['active'];
        $genre->save();
        return redirect()->route('genre.index')->with('status','thêm danh mục thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $genre = Genre::find($id);
        return view('admin.genre.edit',compact('genre'));
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
                'slug' => 'required|max:255',
                'active' => 'required',
            ],
            [
                'name.required' => 'chưa điền tên danh mục',
                'name.max' => 'tên danh mục không quá 255 kí tự',
                'name.unique' => 'tên danh mục đã tồn tại',
            ]
        );
        $genre = Genre::find($id);
        $genre->name = $data['name'];
        $genre->slug = $data['slug'];
        $genre->active = $data['active'];
        $genre->save();
        return redirect()->route('genre.index')->with('status','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Genre::find($id)->delete();
        return redirect()->back()->with('status','Xóa thành công');
    }
}
