@extends('user.layout.app')
@section('content')
    <div class="inner-banner">
        <section class="w3l-breadcrumb py-5">
            <div class="container py-lg-5 py-md-3">
                <h2 class="title">Latest Updates</h2>
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
    <section class="w3l-blogblock py-5">
        <div class="container pt-lg-4 pt-md-3">
            @foreach ($blogs as $blog )
                <div class="item mt-5">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="{{ route('blog.show', $blog->slug) }}">
                                @if(isset($blog->image))
                                    <img class="card-img-bottom d-block radius-image-full" src="{{ asset("storage/".$blog->image) }}" alt="blog-image ">
                                @else
                                    <img class="card-img-bottom d-block radius-image-full" src="{{ asset("user_assets/images/blog-image.jpeg") }}" alt="blog-image ">
                                @endif
                            </a>
                        </div>
                        <div class="col-lg-6 blog-details align-self mt-lg-0 mt-4">
                            <a href="{{ route('blog.show', $blog->slug) }}" class="blog-desc-big">
                                {{ $blog->title }}
                            </a>
                            <div class="entry-meta mb-3">
                                <span class="comments-link"> <a href="{{ route('blog.show', $blog->slug) }}#reply">Leave a Comment</a> </span> /
                                <span class="cat-links"><a href="{{ route('blog.show', $blog->slug) }}#url" rel="category tag">
                                        {{ $blog->author }}
                                </a></span> /
                                <span class="posted-on"><span class="published"> {{ $blog->date }}</span></span>
                            </div>
                            {{-- <p>  {{ $blog->content }}</p> --}}
                            <a href="{{ route('blog.show', $blog->slug) }}" class="btn btn-primary btn-style mt-4">Read More</a>
                        </div>
                    </div>
                </div>                
            @endforeach
           
            <!-- pagination -->
            {{ $blogs->links('user.layout.pagination') }}

        </div>
    </section>
@endsection