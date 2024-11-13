@extends('admin.layouts.app')
@section('content')




    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Form Layout</h3>
                    <p class="text-subtitle text-muted">Multiple form layout you can use</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Layout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        
    

        <!-- // Basic multiple Column Form section start -->
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Multiple Column</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">

                                @if(isset($blog))
                                <form id="myForm" method="POST" action="{{route('admin.blog.update',$blog->id)}}" enctype="multipart/form-data">
                                @method("PUT")
                                @else
                                <form id="myForm" method="POST" action="{{route('admin.blog.store')}}" enctype="multipart/form-data">
                                @method("POST")
                                @endif
                                    @csrf
                                    <div class="row">              
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Name</label>
                                                <input type="text" id="title" class="form-control" value="{{ old('title') ?? $blog->title ?? '' }}" 
                                                    placeholder="Name" name="title">
                                            </div>
                                        </div>              
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">Date</label>
                                                <input type="date" id="date" class="form-control" value="{{ old('date') ?? $blog->date ?? '' }}" 
                                                    placeholder="Date" name="date">
                                            </div>
                                        </div>              
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Author</label>
                                                <input type="text" id="author" class="form-control" value="{{ old('author') ?? $blog->author ?? '' }}" 
                                                    placeholder="Author" name="author">
                                            </div>
                                        </div>                                       
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column">Content</label>
                                                <textarea id="content" class="form-control"
                                                    name="content" placeholder="Content">{{ old('content') ?? $blog->content ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column">Image</label>
                                                <input type="file" name="image" id="image" accept="image/*">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit"
                                                class="btn btn-primary me-1 mb-1">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic multiple Column Form section end -->
    </div>




{{-- 
<script src="{{ asset('admin_assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
       <script src="{{ asset('admin_assets/js/bootstrap.bundle.min.js')}}"></script>
       
       <script src="{{ asset('admin_assets/vendors/ckeditor/ckeditor.js')}}"></script>
       
       <script>
           ClassicEditor
               .create(document.querySelector('#content'))
               .catch(error => {
                   console.error(error);
               });
       </script> --}}


<!-- Include CKEditor Script -->
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<!-- Your custom JavaScript code should come after this line -->
<script>
    // Initialize CKEditor
    CKEDITOR.replace('content'); // Ensure the ID matches your textarea
</script>

<script>
             
    $(document).ready(function() {
        $.validator.addMethod("ckeditorRequired", function(value, element) {
        // Get data from CKEditor instance
        const content = CKEDITOR.instances['content'].getData().replace(/<[^>]*>/gi, '').trim();
        return content.length > 0;
    }, "Please enter content");

        $("#myForm").validate({
            rules: {
                title: {
                    required: true,
                    minlength: 3
                },
                date: {
                    required: true
                },
                author: {
                    required: true,                    
                    minlength: 3
                },
                content: {
                    ckeditorRequired: true
                },
                image: {
                    accept: "image/*"
                }
            },
            messages: {
                title: {
                    required: "Please enter blog name",
                    minlength: "blog name must consist of at least 3 characters"
                },
                date: {
                    required: "Please enter date"
                },
                author: {
                    required: "Please enter author",
                    minlength: "author name must consist of at least 3 characters"

                },
                content: {
                    ckeditorRequired: "Please enter content"
                },
                image: {
                    accept: "Please select valid image"
                }
            },
            invalidHandler: function(event, validator) {
                // Display error alert on form submit
                // alert('something went wrong');
                return false;
            },
            submitHandler: function(form) {
                url = $("#myForm").attr('action');
                method = $("#myForm").attr('method');


                const content = CKEDITOR.instances['content'].getData();  // Ensure 'editor' matches CKEditor instance ID
                const formData = new FormData(form);
                formData.append('content', content);


                $.ajax({
                    url: url,
                    method: method,
                    // data: new FormData(form),
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        if (response.hasError == false) {
                            alert('Blog created successfully');
                            window.location.href = "{{ route('admin.blog.index') }}";
                        } else {
                            alert('Failed to create blog');
                        }
                    }

                });
                // Form submission code here
                // alert("Form submitted successfully!");
                // return true;
                // form.submit(); // or perform an AJAX request here
            }
        });




    });
    
    </script>
       
     


@endsection