<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Comic;
use App\Models\Genre;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $comics = Comic::all();
        return view('admin.comic.index',compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $genres = Genre::all();
        $categories = Category::orderBy('id','DESC')->get();
        return view('admin.comic.create',compact(['categories','genres']));
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
                'name' => 'required|max:255|unique:comics',
                'author' => 'required',
                'description' => 'required',
                'slug' => 'required|max:255',
                'image' => 'required',
                'active' => 'required',
                'category_id' => 'required',
                'genres' => 'required'
            ],
            [
                'name.required' => 'chưa điền tên ',
                'name.max' => 'tên không quá 255 kí tự',
                'name.unique' => 'tên đã tồn tại',
                'author.required' => 'chưa điền tên tác giả',
                'description.required' => 'chưa điền tóm tắt truyện',
                'image.required' => 'chưa thêm ảnh',
                'category_id.required' => 'chưa chọn danh mục truyện',
                'genres.required' => 'chưa chọn thể loại truyện'
            ]
        );
        //dd($data['genres']);
        $comic = new Comic();
        $comic->name = $data['name'];
        $comic->description = $data['description'];
        $comic->slug = $data['slug'];
        $comic->author = $data['author'];
        $comic->category_id = $data['category_id'];
        $comic->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $comic->active = $data['active'];
        $path = $this->_upload($request);
        if ($path) {
            $comic->image = $path;
        }
        $comic->save();
        $comic->genres()->sync($data['genres']);
        return redirect()->route('comic.index')->with('status','thêm truyện thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $comic = Comic::find($id);
        $genres = Genre::all();
        $categories = Category::all();
        return view('admin.comic.edit',compact(['comic','categories','genres']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'name' => 'required|max:255',
                'description' => 'required',
                'author' => 'required',
                'slug' => 'required|max:255',
                'active' => 'required',
                'genres' => 'required',
                'category_id' => 'required',
            ],
            [
                'name.required' => 'chưa điền tên ',
                'name.max' => 'tên không quá 255 kí tự',
                'author.required' => 'chưa điền tên tác giả',
                'description.required' => 'chưa điền tóm tắt truyện',
                'category_id.required' => 'chưa chọn danh mục truyện',
                'genres.required' => 'chưa chọn thể loại truyện'
            ]
        );
        $comic = Comic::find($id);
        $comic->name = $data['name'];
        $comic->description = $data['description'];
        $comic->slug = $data['slug'];
        $comic->author = $data['author'];
        $comic->category_id = $data['category_id'];
        $comic->active = $data['active'];
        $comic->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        $path = $this->_upload($request);
        if ($path) {
            $comic->image = $path;
        }
        $comic->save();
        $comic->genres()->sync($data['genres']);
        return redirect()->route('comic.index')->with('status','Sửa truyện thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $comic = Comic::find($id);
        if (file_exists($comic->image)){
            Storage::delete($comic->image);
        }
        $comic->delete();
        return redirect()->back()->with('status','Xóa thành công');
    }

    public function _upload($request)
    {
        if ($request->file()) {
            try {
                $name = $request->file('image')->getClientOriginalName();
                $pathFull = 'uploads/' . date("Y/m/d");
                $request->file('image')->storeAs(
                    'public/' . $pathFull,
                    $name
                );
                return '/storage/' . $pathFull . '/' . $name;
            } catch (\Exception $error) {
                return false;
            }

        }
        return false;
    }
}
