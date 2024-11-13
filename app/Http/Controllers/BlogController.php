<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;
use App\Models\BlogComment;


// use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search ?? null;
        $data['blogs'] = Blog::with('comments')
            ->when($search, function ($query) use ($search) {
                return $query->where('title', 'like', '%' . $search . '%');
            })
            ->paginate(10);
        return view('user.blog.list',$data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $id = Blog::where(['slug' => $slug, 'status' => 1])->first()->id ?? 0;
        $data['blog'] = Blog::findOrFail($id);
        // return $data['blog'];
        $data['blogComments'] = $data['blog']->comments()->with('replies')->whereNull('blog_comment_id')->orderBy('id', 'desc')->paginate(10);
        $data['commentCounts'] = $data['blog']->comments()->count();
        $data['prev_blog'] = Blog::where('id', '<', $id)->where('status', 1)->orderBy('id', 'desc')->first();
        $data['next_blog'] = Blog::where('id', '>', $id)->where('status', 1)->orderBy('id', 'asc')->first();
        return view('user.blog.blog',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function store_comment(Request $request, string $encryptId)
    {
        $request->validate([
            'comment' => 'required|max:1000',
        ],
        [           
            'comment.required' => 'The comment is required.',
            'comment.max' => 'The comment must not be greater than 1000 characters.',
        ]);

        DB::beginTransaction();
        try {
            $id = Crypt::decrypt($encryptId);
            $blog = Blog::where(['id' => $id,'status' => 1])->first();
            if(!$blog){
                // Toastr::error('Blog not found.');
                return redirect()->back();
            }
            $blogComment = new BlogComment;
            $blogComment->blog_id = $blog->id;
            $blogComment->user_id = Auth::user()->id;
            $blogComment->blog_comment_id = $request->blog_comment_id;          
            $blogComment->comment = $request->comment;
            $blogComment->status = 1;
            $blogComment->save();
            DB::commit();
            // Toastr::success('Comment added successfully.');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error("BlogController::blogCommentStore");
            Log::error($e);
            return redirect()->back();
        }
    }
    public function reply_comment(Request $request)
    {
        $request->validate([
            'comment_id' => 'required',
            'comment' => 'required|max:1000',
        ],
        [
            'comment_id.required' => 'The comment id is required.',
            'comment.required' => 'The comment is required.',
            'comment.max' => 'The comment must not be greater than 1000 characters.',
        ]);

        DB::beginTransaction();
        
        $id = $request->comment_id;
        try {
            // $id = Crypt::decrypt($encryptId);
            $blog = Blog::where(['id' => $id,'status' => 1])->first();
            if(!$blog){
                // Toastr::error('Blog not found.');
                return redirect()->back();
            }
            $oldBblogComment = BlogComment::find($id);
            $blogComment = new BlogComment;
            $blogComment->blog_id = $blog->id;
            $blogComment->user_id = Auth::user()->id;
            $blogComment->blog_comment_id = $id;          
            $blogComment->comment = $request->comment;
            $blogComment->status = 1;
            $blogComment->save();
            DB::commit();
            // Toastr::success('Comment added successfully.');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error("BlogController::blogCommentStore");
            Log::error($e);
            return redirect()->back();
        }
    }



    

}
