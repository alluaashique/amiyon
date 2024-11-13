<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function getBlogs()
    {
        $page = request('page') ? request('page') : 1;
        $limit = request('limit') ? request('limit') : 10;

        $blogs = Blog::with('comments')->paginate($limit, ['*'], 'page', $page);

        $data = [
            'hasError' => false,            
            'code' => 200,
            'data' => $blogs,
            'total' => $blogs->total(),
            'last_page' => $blogs->lastPage(),
            'message' => 'Blogs found'
        ];
        return response()->json($data);        
    }

    public function getBlogDetail($id)
    {
        $blogs = Blog::with('comments')->find($id);
        if(empty($blogs)) {
            $data = [
                'hasError' => false,
                'data' => [],
                'code' => 404,
                'message' => 'Blog not found'
            ];
            return response()->json($data);
        }
        $data = [
            'hasError' => false,
            'data' => $blogs,
            'code' => 200,
            'message' => 'Blog found'
        ];
        return response()->json($data);    
    }

    


    public function storeComments(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'blog_comment_id' => 'integer',
            'blog_id' => 'required|integer',
            'comment' => 'required|string',
            'comment_id' => 'required|integer',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }
        $id = $request->blog_id;
        $blog = Blog::with('comments')->find($id);
        if(empty($blog)) {
            $data = [
                'hasError' => true,
                'data' => [],
                'code' => 404,
                'message' => 'Blog not found'
            ];
            return response()->json($data);
        }
        $user = User::find($request->user_id);
        if(empty($user)) {
            $data = [
                'hasError' => true,
                'data' => [],
                'code' => 404,
                'message' => 'User not found'
            ];
            return response()->json($data);
        }
        $blog_comment = BlogComment::find($request->blog_comment_id);
        if(!empty($blog_comment)) {
            if(empty($blog_comment)) {
                $data = [
                    'hasError' => true,
                    'data' => [],
                    'code' => 404,
                    'message' => 'Blog comment not found'
                ];
                return response()->json($data);
            }
        }
        DB::beginTransaction();
        try {           
            if($request->comment_id == 0) 
                $blogComment = new BlogComment;
            else
            {
                $blogComment = BlogComment::find($request->comment_id);
                if(empty($blogComment)) {
                    $data = [
                        'hasError' => true,
                        'data' => [],
                        'code' => 404,
                        'message' => 'Blog comment not found'
                    ];
                    return response()->json($data);
                }
            }
            $blogComment->blog_id = $blog->id;
            $blogComment->user_id = $request->user_id;
            $blogComment->blog_comment_id = $request->blog_comment_id;          
            $blogComment->comment = $request->comment;
            $blogComment->status = 1;
            $blogComment->save();
            DB::commit();

            $data = [
                'hasError' => false,
                'data' => $blogComment,
                'code' => 200,
                'message' => 'Comment added successfully'
            ];
            return response()->json($data);


        } catch (\Exception $e) {
            DB::rollback();
            Log::error("BlogController::blogCommentStore");
            Log::error($e);
            $data = [
                'hasError' => true,
                'data' => [],
                'code' => 500,
                'message' => 'Something went wrong'
            ];
            return response()->json($data);
        }
    }

    public function deleteComments(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'comment_id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }
        $blogComment = BlogComment::where(['id' => $request->comment_id,'status' => 1,'user_id' => $request->user_id])->first();

        if(empty($blogComment)) {
            $data = [
                'hasError' => false,
                'data' => [],
                'code' => 404,
                'message' => 'Blog comments not found'
            ];
            return response()->json($data);
        }
        $blogComment->delete();
        $data = [
            'hasError' => false,
            'data' => null,
            'code' => 200,
            'message' => 'Blog comments deleted'
        ];
        return response()->json($data);    
    }
}
