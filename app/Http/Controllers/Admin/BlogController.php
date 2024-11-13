<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['blogs'] = Blog::paginate(10);
        return view('admin.blog.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info($request->all());
        $request->validate([
            "title" => "required|min:3",
            "date" => "required|date",
            "author" => "required|min:3",
            "content" => "required",
            "image" => "required|image"            
        ]);
        DB::beginTransaction();
        try {

            $blog = new Blog();
            $blog->title = $request->title;
            $blog->date = $request->date;
            $blog->author = $request->author;
            $blog->content = $request->content;

            if($request->hasFile('image')) {
                
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                // $file->move('uploads/blog/', $filename);
                // $blog->image = 'uploads/blog/'.$filename;
                
                $file->storeAs('blog/', $filename, 'public');
                $blog->image = 'blog/'.$filename;
            }
            
            $blog->save();
            DB::commit();
            return response()->json(['hasError' => false,'success' => 'Blog created successfully']);
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollBack();
            return response()->json(['hasError' => true,'success' => 'Something went wrong']);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $data['blog'] = Blog::findorfail($id);
        return view('admin.blog.create',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Log::info($request->all());
        $request->validate([
            "title" => "required|min:3",
            "date" => "required|date",
            "author" => "required|min:3",
            "content" => "required",
            "image" => "image"            
        ]);
        DB::beginTransaction();
        try {

            $blog = Blog::findorfail($id);
            $blog->title = $request->title;
            $blog->date = $request->date;
            $blog->author = $request->author;
            $blog->content = $request->content;

            if($request->hasFile('image')) {
                
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                // $file->move('uploads/blog/', $filename);
                // $blog->image = 'uploads/blog/'.$filename;
                
                $file->storeAs('blog/', $filename, 'public');
                $blog->image = 'blog/'.$filename;
            }
            
        Log::info("ccccccccc");
            $blog->save();
            DB::commit();
            return response()->json(['hasError' => false,'success' => 'Blog created successfully']);
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollBack();
            return response()->json(['hasError' => true,'success' => 'Something went wrong']);
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $blog = Blog::findorfail($id);
            $blog->delete();
            DB::commit();
            return 1;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("BlogController::destroy");
            Log::error($e);
            return 0;
        }
    }
}
