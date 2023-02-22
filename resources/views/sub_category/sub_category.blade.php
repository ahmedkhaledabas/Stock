@extends('layouts.master')
@section('title')
    All SubCategories
@endsection
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">SubCategories</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All
                    SubCategories</span>
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


    <!-- success message add sub_category -->
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
    <!-- End success message add sub_category -->

    <!-- success message edit sub_category -->
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
    <!-- End success message edit sub_category -->

    <!-- success message Delete sub_category -->
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
    <!-- End success message Delete sub_category -->

    <!-- row opened -->
    <div class="row row-sm">


        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive hoverable-table">
                        <div class="col-12 ">
                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                                data-toggle="modal" href="#modaldemo8">Add SubCategory</a>
                        </div>
                        <table id="example-delete" class="table text-md-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                    <th>Created By</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sub_categories as $sub_category)
                                    <tr>
                                        <td>{{ $sub_category->id }}</td>
                                        <td>{{ $sub_category->name }}</td>
                                        <td>{{ $sub_category->describtion }}</td>
                                        <td>{{ $sub_category->image }}</td>
                                        <td>{{ $sub_category->status }}</td>
                                        <td>{{ $sub_category->category->name }}</td>
                                        <td>
                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                data-id="{{ $sub_category->id }}" data-name="{{ $sub_category->name }}"
                                                data-describtion="{{ $sub_category->describtion }}" data-category_name="{{ $sub_category->category->name }}"
                                                data-image="{{ $sub_category->image }}" data-status="{{ $sub_category->status }}"
                                                data-toggle="modal" href="#modaldemo9" title="Edit"><i
                                                    class="las la-pen"></i></a>

                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-id="{{ $sub_category->id }}" data-name="{{ $sub_category->name }}"
                                                data-toggle="modal" href="#modaldemo7" title="Delete"><i
                                                    class="las la-trash"></i></a>
                                        </td>
                                        <td>{{ $sub_category->created_by }}</td>
                                    </tr>
                                @endforeach

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
                        <h6 class="modal-title">Delete SubCategory</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="sub_category/destroy" method="post" autocomplete="off">
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
                        <h6 class="modal-title">Add New SubCategory</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ Route('sub_category.store') }}" method="post" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label for="name">SubCategory Name : </label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="describtion">SubCategory Description : </label>
                                <input type="text" class="form-control" name="describtion" id="describtion" required>
                            </div>
                            <div class="form-group">
                                <label for="image">SubCategory Image : </label>
                                <input type="text" class="form-control" name="image" id="image">
                            </div>
                            <div class="form-group">
                                <label for="category">Product Category : </label>
                                <select class="form-control" name="category_id" id="category_id" required>
                                    <option value="" selected disabled>--Chose Category</option>
                                    @foreach ($categories as $category )
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button class="btn ripple btn-primary" type="submit">Save</button>
                                <button class="btn ripple btn-secondary" data-dismiss="modal"
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
                        <h6 class="modal-title">Edit SubCategory</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="sub_category/update" method="post" autocomplete="off">
                            {{ method_field('patch') }}
                            @csrf
                            <div class="form-group">
                                <label for="id">SubCategory ID : </label>
                                <input type="text" class="form-control" name="id" id="id" required>
                            </div>
                            <div class="form-group">
                                <label for="name">SubCategory Name : </label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="describtion">SubCategory Description : </label>
                                <input type="text" class="form-control" name="describtion" id="describtion" required>
                            </div>
                            <div class="form-group">
                                <label for="image">SubCategory Image : </label>
                                <input type="text" class="form-control" name="image" id="image">
                            </div>
                            <div class="form-group">
                                <label for="status">SubCategory Status : </label>
                                <input type="text" class="form-control" name="status" id="status">
                            </div>
                            <div class="form-group">
                                <label for="category">Product Category : </label>
                                <select class="form-control" name="category_name" id="category_name" required>
                                    @foreach ($categories as $category )
                                        <option value="{{$category->name}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button class="btn ripple btn-primary" type="submit">Save changes</button>
                                <button class="btn ripple btn-secondary" data-dismiss="modal"
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
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>

    <!--Edit sub_category js -->
    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var image = button.data('image')
            var status = button.data('status')
            var category_name = button.data('category_name')
            var describtion = button.data('describtion')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #image').val(image);
            modal.find('.modal-body #category_name').val(category_name);
            modal.find('.modal-body #status').val(status);
            modal.find('.modal-body #describtion').val(describtion);

        })
    </script>
    <!--End edit sub_category js -->

    <!--Delete sub_category js -->
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
    <!--End Delete sub_category js -->
@endsection
