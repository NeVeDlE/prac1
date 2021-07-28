@extends('layouts.master')
@section('css')
    <!---Internal Owl Carousel css-->
    <link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <!---Internal  Multislider css-->
    <link href="{{URL::asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
    <!--- Select2 css -->
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!-- Internal Nice-select css  -->
    <link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')

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
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Market</h4>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <form action="/market" method="GET">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-body p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search ..." id="search" name="search">
                            <span class="input-group-append">
										<button class="btn btn-primary" type="submit">Search</button>
                        </span>
                        </div>
                    </div>
                </div>
            </form>

            <div class="row row-sm">

                @foreach($store as $item)
                    <div class="col-md-6 col-lg-6 col-xl-3  col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="pro-img-box">
                                    <div class="d-flex product-sale">
                                        <div class="badge bg-pink">New</div>
                                        <i class="mdi mdi-heart-outline ml-auto wishlist"></i>
                                    </div>
                                    <img class="w-100" style="height: 300px;width: 20px"
                                         src="{{asset('images/'.$item['file_path'])}}" alt="product-image">
                                    <a href="#modaldemo3" data-id="{{ $item->id }}" data-effect="effect-scale"
                                       data-name="{{ $item->name }}" data-size="{{ $item->size }}"
                                       data-description="{{ $item->description }}" data-toggle="modal" class="adtocart">
                                        <i class="las la-shopping-cart "></i>
                                    </a>
                                </div>
                                <div class="text-center pt-3">
                                    <h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{$item['name']}}</h3>
                                    <span class="tx-15 ml-auto">
												 {{$item['description']}}
											</span>
                                    <h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger">
                                        Size: {{$item['size']}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                    {{ $store->links('vendor.pagination.custom') }}

            </div>
            <div>

            </div>

        </div>

    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
    <!-- Large Modal -->
    <div class="modal" id="modaldemo3">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Large Modal</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form action={{route('market.store')}} method="post" enctype="multipart/form-data" autocomplete="off">

                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="">
                            <label for="exampleInputEmail1">T-Shirt Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">T-Shirt Size:</label>
                            <input type="text" class="form-control" id="size" name="size" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">T-Shirt Description:</label>
                            <input type="text" class="form-control" id="description" name="description" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Your Name:</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Your Address:</label>
                            <input type="text" class="form-control" id="user_address" name="user_address" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Your Phone Number:</label>
                            <input type="text" class="form-control" id="Phone" name="Phone" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-success" type="submit">Pay</button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--End Large Modal -->
@endsection
@section('js')
    <!-- Internal Nice-select js-->
    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!-- Internal Modal js-->
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
    <script>
        $('#modaldemo3').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var size = button.data('size')
            var description = button.data('description')
            var modal = $(this)

            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #size').val(size);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #description').val(description);
        })
    </script>
@endsection
