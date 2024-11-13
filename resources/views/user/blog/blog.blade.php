
@extends('user.layout.app')
@section('content')




<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<div class="inner-banner">
    <section class="w3l-breadcrumb py-5">
        <div class="container py-lg-5 py-md-3">
            <h2 class="title">Single post</h2>
        </div>
    </section>
</div>
<!-- banner bottom shape -->
<div class="position-relative">
    <div class="shape overflow-hidden">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- banner bottom shape -->
<div class="py-md-5 pt-5 pb-4 w3l-singleblock1">
    <div class="container mt-md-3">
        <h3 class="blog-desc-big">{{ $blog->title }}</h3>
        <div class="blog-post-align">
            <div class="entry-meta">
                <span class="comments-link"> <a href="#reply">Leave a Comment</a> </span> /
                <span class="cat-links"><a href="#url" rel="category tag">
                    {{ $blog->author }}
                                
                </a></span> /
                <span class="posted-on"><span class="published"> {{ $blog->created_at->format('M d, Y') }} </span></span>
            </div>
        </div>
    </div>
</div>

<section class="blog-post-main w3l-homeblock1">
    <!--/blog-post-->
    <div class="blog-content-inf pb-5">
        <div class="container pb-lg-4">
            <div class="single-post-image">
                <div class="post-content">
                    @if(isset($blog->image))
                        <img class="radius-image-full img-fluid mb-5" src="{{ asset("storage/".$blog->image) }}" alt="blog-image ">
                    @else
                        <img class="radius-image-full img-fluid mb-5" src="{{ asset("user_assets/images/blog-image.jpeg") }}" alt="blog-image ">
                    @endif
                </div>
            </div>
            <div class="single-post-content">
                {!!$blog->content!!}
              
                <nav class="navigation post-navigation my-4" role="navigation" aria-label="Posts">
                    <div class="nav-links">
                        <div class="nav-previous">
                            @if($prev_blog)
                                <a href="{{ route('blog.show', $prev_blog->slug) }}"  rel="prev"> <span class="ast-left-arrow">←</span> Previous Post</a>
                            @endif
                        </div>
                        <div class="nav-next text-right">
                            @if($next_blog)
                                <a  href="{{ route('blog.show', $next_blog->slug) }}" rel="next"> Next Post <span class="ast-right-arrow">→</span></a>
                            @endif
                        </div>
                    </div>
                </nav>

               

                    @if ($blogComments->count() > 0) 

                    <div class="comments mt-5 pt-lg-4">
                        <h4 class="side-title ">Comments ({{ $commentCounts }})</h4>
                       
                        @foreach ($blogComments as $comment)
                            <div class="media">
                                <div class="img-circle">
                                    <img src="{{ asset("user_assets/images/user-icon.png") }}" class="img-fluid" alt="user-icon">
                                </div>
                                <div class="media-body">
                                    <ul class="time-rply mb-2">
                                        <li><a href="javascript:void(0)" class="name mt-0 mb-2 d-block">{{ $comment->user_name }}</a>
                                            {{ $comment->created_at->diffForHumans() }}
                                        </li>
                                        @auth
                                        <li class="reply-last">
                                            <a href="#reply" class="reply"  data-id="{{ $comment->id }}">
                                                <span type="button" class="btn btn-primary reply" data-id="{{ $comment->id }}" data-bs-toggle="modal" data-bs-target="#myModal">
                                                    reply
                                                  </span></a>
                                        </li>
                                          @endauth


                                    </ul>
                                    <p> {{ $comment->comment }}</p>                                   



                                    @foreach ($comment->replies as $reply) 
                                        <div class="media second mt-4 p-0 pt-2">
                                            <a class="img-circle img-circle-sm" href="#url">
                                                <img src="{{ asset("user_assets/images/user-icon.png") }}" class="img-fluid" alt="...">
                                            </a>
                                            <div class="media-body">
                                                <ul class="time-rply mb-2">
                                                    <li><a href="javascript:void(0)" class="name mt-0 mb-2 d-block">{{ $reply->user_name }}</a>
                                                        {{ $reply->created_at->diffForHumans() }}            
                                                    </li>
                                                   
                                                    @auth
                                                    <li class="reply-last">
                                                        <a href="#reply" class="reply"  data-id="{{ $reply->blog_comment_id }}">
                                                            <span type="button" class="btn btn-primary reply" data-id="{{ $reply->blog_comment_id }}" data-bs-toggle="modal" data-bs-target="#myModal">
                                                                reply
                                                              </span></a>
                                                    </li>
                                                      @endauth
                                                </ul>
                                                <p>{{ $reply->comment }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                   
                                </div>
                            </div>
                        @endforeach
                        <nav class="navigation post-navigation my-4" role="navigation" aria-label="Posts">
                            <div class="nav-links">
                                <div class="nav-previous">
                                    @if($blogComments->previousPageUrl())
                                        <a href="{{ $blogComments->previousPageUrl() }}"  rel="prev"> <span class="ast-left-arrow">←</span> Previous Comments</a>
                                    @endif
                                </div>
                                <div class="nav-next text-right">
                                    @if($blogComments->hasMorePages())
                                        <a  href="{{ $blogComments->nextPageUrl() }}" rel="next"> Next Comments <span class="ast-right-arrow">→</span></a>
                                    @endif
                                </div>
                            </div>
                        </nav>                     
                    </div>

                    @endif
                    @auth
                <div class="leave-comment-form mt-5 pt-lg-4" id="reply">
                    <h4 class="side-title mb-2">Leave a reply</h4>
                    <p class="mb-4">Your email address will not be published. Required fields are marked *
                    </p>
                        
                  
                    <form action="{{route('blog.comment.store',Crypt::encrypt($blog->id))}}" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea name="comment" class="form-control" placeholder="Your Comment*" required spellcheck="false">{{old('comment')}}</textarea>
                        </div>
                        <div class="submit text-right">
                            <button type="submit" class="btn btn-style btn-primary">Post Comment </button>
                        </div>
                    </form>
                </div>
                @endauth

             

                   <!-- The Modal -->
                   <div class="modal" id="myModal">
                    <div class="modal-dialog">
                      <div class="modal-content">
                  
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Modal Heading</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                  
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="{{route('blog.comment.reply')}}" method="post">
                                @csrf
                                <input type="hidden" name="comment_id" id="comment_id" required>
                                <div class="form-group">
                                    <textarea name="comment" class="form-control" placeholder="Your Comment*" required spellcheck="false">{{old('comment')}}</textarea>
                                </div>
                                <div class="submit text-right">
                                    <button type="submit" class="btn btn-style btn-primary">Post Comment </button>
                                </div>
                            </form>
                        </div>
                  
                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>                  
                      </div>
                    </div>
                  </div>



            </div>
        </div>
        <!--//blog-post-->
    </div>


    <script>




$(document).ready(function(){
    $("body").on('click','.reply',function(){
        var comment_id = $(this).attr('data-id');
        $('#comment_id').val(comment_id);
        $('#myModal').modal('show');
    });
});
    </script>
</section>
@endsection