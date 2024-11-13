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
                    <h3>Blogs</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Bordered table start -->
        <section class="section">
            <div class="row" id="table-bordered">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">Add Blog</a>
                        </div>
                        <div class="card-content">
                           
                            <!-- table bordered -->
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Author</th>
                                            {{-- <th>Content</th> --}}
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $blog)
                                            <tr>

                                              
                                                <td>{{$loop->iteration + ($blogs->currentPage() - 1) * $blogs->perPage()}}</td>
                                                <td>{{ $blog->title }}</td>
                                                <td>{{ $blog->date }}</td>
                                                <td>{{ $blog->author }}</td>
                                                {{-- <td>{{ $blog->content }}</td> --}}
                                                <td>{{ $blog->image }}</td>
                                                <td>
                                                    @if($blog->status == 1)
                                                        Active 
                                                    @elseif($blog->status == 0)
                                                        Inactive 
                                                    @endif
                                                </td>
                                                <td>  
                                                        
                                                            <a href="{{route('admin.blog.edit',$blog->id)}}">
                                                                <button class="btn btn-primary"> Edit </button>
                                                            </a>
                                                            <a href="javascript:void(0)" class="delete" data-id="{{$blog->id}}">
                                                                <button class="btn btn-danger"> Delete </button>
                                                            </a>
                                                        
                                                        
                                                </td>
                                            </tr>
                                            
                                        @endforeach
                                       
                                        {{-- <tr>
                                            <td class="text-bold-500">Morgan Vanblum</td>
                                            <td>$13/hr</td>
                                            <td class="text-bold-500">Graphic concepts</td>
                                            <td>Remote</td>
                                            <td>Shangai,China</td>
                                            <td><a href="#"><i
                                                        class="badge-circle badge-circle-light-secondary font-medium-1"
                                                        data-feather="mail"></i></a></td>
                                        </tr> --}}
                                       
                                    </tbody>
                                </table>
                                {{ $blogs->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Bordered table end -->
        
    </div>


    <script>
        $(document).ready(function() {
            $('.delete').on('click', function() {
                var id = $(this).data('id');
                // var form = $('#delete_' + id);
                if (confirm("Are you sure you want to delete this blog?")) {
                    var current = $(this);
                    var currentRow = $(this).closest('tr');
                    var form = new FormData();
                    form.append("id", id);
                    form.append("_token", "{{csrf_token()}}");
                    form.append("_method", "DELETE");
                    url = "{{route('admin.blog.destroy',':id')}}";
                    url = url.replace(':id', id);
                    $.ajax({
                        url: url,
                        method: 'DELETE',
                        // _token: "{{csrf_token()}}",
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}" // Add CSRF token in headers
                        },
                        data: null,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                          if(response == 1) {
                            alert("Blog deleted successfully");
                            currentRow.remove();
                          }else {
                            alert("Something went wrong");
                          }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error deleting item:", error);
                        }
                    });
                  }
            });
        });
        </script>

@endsection