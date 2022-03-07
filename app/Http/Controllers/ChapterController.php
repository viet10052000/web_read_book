<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Comic;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $chapters = Chapter::all();
        return view('admin.chapter.index',compact('chapters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $comics = Comic::all();
        return view('admin.chapter.create',compact('comics'));
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
                'name' => 'required|max:255',
                'description' => 'required',
                'content' => 'required',
                'slug' => 'required|max:255',
                'active' => 'required',
                'comic_id' => 'required',
            ],
            [
                'name.required' => 'chưa điền tên ',
                'name.max' => 'tên không quá 255 kí tự',
                'name.unique' => 'tên đã tồn tại',
                'description.required' => 'chưa điền tóm tắt chapter',
                'content.required' => 'chưa điền nội dung',
                'comic_id.required' => 'chưa chọn truyện',
                'active.required' => 'chưa điền kích hoạt'
            ]
        );
        $chapter = new Chapter();
        $chapter->name = $data['name'];
        $chapter->description = $data['description'];
        $chapter->slug = $data['slug'];
        $chapter->content = $data['content'];
        $chapter->comic_id = $data['comic_id'];
        $chapter->active = $data['active'];
        $chapter->save();
        return redirect()->route('chapter.index')->with('status','thêm chapter thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $comics = Comic::all();
        $chapter = Chapter::find($id);
        return view('admin.chapter.edit',compact(['comics','chapter']));
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
                'description' => 'required',
                'content' => 'required',
                'slug' => 'required|max:255',
                'active' => 'required',
                'comic_id' => 'required',
            ],
            [
                'name.required' => 'chưa điền tên ',
                'name.max' => 'tên không quá 255 kí tự',
                'description.required' => 'chưa điền tóm tắt chapter',
                'content.required' => 'chưa điền nội dung',
                'comic_id.required' => 'chưa chọn truyện',
                'active.required' => 'chưa điền kích hoạt'
            ]
        );
        $chapter = Chapter::find($id);
        $chapter->name = $data['name'];
        $chapter->description = $data['description'];
        $chapter->slug = $data['slug'];
        $chapter->content = $data['content'];
        $chapter->comic_id = $data['comic_id'];
        $chapter->active = $data['active'];
        $chapter->save();
        return redirect()->route('chapter.index')->with('status','cập nhật chapter thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Chapter::find($id)->delete();
        return redirect()->back()->with('status','Xóa thành công');
    }
}
