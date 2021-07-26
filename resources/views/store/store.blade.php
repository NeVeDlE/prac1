@extends('layouts.master')
@section('css')
    <!---Internal Owl Carousel css-->
    <link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <!---Internal  Multislider css-->
    <link href="{{URL::asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
    <!--- Select2 css -->
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/morris.js/morris.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
                    <div class="my-auto">
                        <div class="d-flex"><h4 class="content-title mb-0 my-auto">Store</h4></div>
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

    @if(session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
				<!-- row -->
				<div class="row">
                    <div class="card-body">
                                    <a class="btn btn-success btn-with-icon btn-block" data-target="#modaldemo1" data-toggle="modal" href=""> <span><i class="typcn typcn-edit"></i></span>Add T-Shirt</a>
                    </div>
			</div>

    <div class="row">
        <h3 class="header-style1 text-center">Available T-Shirts</h3>
    </div>


    <div class="row">
        @foreach($store as $item)

        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="card-title mb-0 pb-0">{{$item['name']}}</h5>
                </div>
                <div class="card-body">

                        <div><img src="{{asset($item['file_path'])}}" /></div>
                </div>
                <div class="card-footer">
                    <p>{{$item['description']}}</p>
                </div>
            </div>
        </div>
        @endforeach

    </div>



			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
                <!-- Basic modal -->
                <div class="modal" id="modaldemo1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content modal-content-demo">
                            <div class="modal-header">
                                <h6 class="modal-title">Add a T-Shirt</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <form action="{{route('store.store')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">T-Shirt Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">T-Shirt Size:</label>
                                    <select name="size" id="size" class="form-control" required>
                                        <option value="" selected disabled>Choose Your Size--</option>
                                        <option value="M" >M</option>
                                        <option value="L" >L</option>
                                        <option value="XL" >XL</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">T-Shirt Description:</label>
                                    <input type="text" class="form-control" id="description" name="description" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">T-Shirt Photo:</label>
                                    <input type="file" name="file" id="file" required>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button class="btn ripple btn-success" type="submit">Save changes</button>
                                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Basic modal -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!-- Internal Modal js-->
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>
@endsection
