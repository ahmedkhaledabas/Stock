@extends('layouts.master')
@section('title')
    All Categories
@endsection
@section('css')
    <!-- Internal Data table css -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ URL::asset('assets/css/sub_category.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Categories</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All
                    Categories</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <!-- success message add category -->
    <div class="col-xl-12">
        @if (session()->has('Add'))
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong>{{ session()->get('Add') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <!-- End success message add category -->

    <!-- success message edit category -->
    <div class="col-xl-12">
        @if (session()->has('Edit'))
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong>{{ session()->get('Edit') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <!-- End success message edit category -->

    <!-- success message Delete category -->
    <div class="col-xl-12">
        @if (session()->has('Delete'))
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong>{{ session()->get('Delete') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <!-- End success message Delete category -->

    <!-- row opened -->

    <div class="row">	
        <div class="col-12">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-8"><h2>Category <b>Details</b></h2></div>
                                <div class="col-sm-4">

                                    @can('category_create')
                                    <a class="modal-effect btn btn-info add-new" data-effect="effect-scale"
                                    data-toggle="modal" href="#modaldemo8"><i class="fa fa-plus"></i> Add New Category</a>
                                    @endcan

                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Created By</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @can('category_list')
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->describtion }}</td>
                                        <td>{{ $category->image }}</td>
                                        <td>{{ $category->status }}</td>
                                        <td>{{ $category->created_by }}</td>
                                        <td>
                                        @can('category_edit')
                                        <a class="modal-effect btn btn-sm btn-info" title="Edit" data-id="{{ $category->id }}" data-name="{{ $category->name }}"
                                            data-describtion="{{ $category->describtion }}"
                                            data-image="{{ $category->image }}" data-status="{{ $category->status }}"
                                            data-toggle="modal" href="#modaldemo9">
                                            <i
                                    class="las la-pen"></i></a>
                                        @endcan
                                        
                                        @can('category_delete')  
                                        <a class="modal-effect btn btn-sm btn-danger" title="Delete" data-id="{{ $category->id }}" data-name="{{ $category->name }}"
                                            data-toggle="modal" href="#modaldemo7"><i
                                            class="las la-trash"></i></a>
                                        @endcan
                                        </td>
                                        
                                    </tr>
                                @endforeach
                                @endcan

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- Delete Modal effects-->
        <div class="modal" id="modaldemo7">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Delete Category</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="category/destroy" method="post" autocomplete="off">
                            {{ method_field('delete') }}
                            @csrf
                            <div class="form-group">
                                <p>You Are Sure Delete ? </p>
                                <input type="text" class="form-control" name="name" id="name">
                                <input type="hidden" class="form-control" name="id" id="id">
                            </div>

                            <div class="modal-footer">
                                <button class="btn ripple btn-danger" type="submit">Delete</button>
                                <button class="btn ripple btn-info" data-dismiss="modal" type="button">Close</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Modal effects-->

        <!-- Add Modal effects-->
        <div class="modal" id="modaldemo8">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Add New Category</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ Route('category.store') }}" method="post" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label for="name">Category Name : </label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="describtion">Category Description : </label>
                                <input type="text" class="form-control" name="describtion" id="describtion" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Category Image : </label>
                                <input type="text" class="form-control" name="image" id="image">
                            </div>
                            <div class="modal-footer">
                                <button class="btn ripple btn-info" type="submit">Save</button>
                                <button class="btn ripple btn-danger" data-dismiss="modal"
                                    type="button">Close</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Modal effects-->

        <!-- Edit Modal effects -->
        <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Edit Category</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="category/update" method="post" autocomplete="off">
                            {{ method_field('patch') }}
                            @csrf
                            <div class="form-group">
                                <label for="id">Category ID : </label>
                                <input type="text" class="form-control" name="id" id="id" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Category Name : </label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="describtion">Category Description : </label>
                                <input type="text" class="form-control" name="describtion" id="describtion" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Category Image : </label>
                                <input type="text" class="form-control" name="image" id="image">
                            </div>
                            <div class="form-group">
                                <label for="status">Category Status : </label>
                                <input type="text" class="form-control" name="status" id="status">
                            </div>
                            <div class="modal-footer">
                                <button class="btn ripple btn-info" type="submit">Save changes</button>
                                <button class="btn ripple btn-danger" data-dismiss="modal"
                                    type="button">Close</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Modal effects-->


    </div>



    <!-- /row -->
    
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>

    <!--Edit category js -->
    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var image = button.data('image')
            var status = button.data('status')
            var describtion = button.data('describtion')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #image').val(image);
            modal.find('.modal-body #status').val(status);
            modal.find('.modal-body #describtion').val(describtion);

        })
    </script>
    <!--End edit category js -->

    <!--Delete category js -->
    <script>
        $('#modaldemo7').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        })
    </script>
    <!--End Delete category js -->
@endsection
