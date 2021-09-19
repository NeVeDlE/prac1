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
            <a class="btn btn-success btn-with-icon btn-block" data-target="#modaldemo1" data-toggle="modal" href="">
                <span><i class="typcn typcn-edit"></i></span>Add T-Shirt</a>
        </div>
    </div>

    <div class="row">
        <h3 class="header-style1 text-center">Available T-Shirts</h3>
    </div>


    <div class="row">
        @foreach($store as $item)
            <div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="pro-img-box">
                            <div class="d-flex product-sale">
                                <i class="mdi mdi-heart text-danger ml-auto wishlist"></i>
                            </div>
                            <img class="w-100" style="height: 300px;width: 20px"
                                 src="{{asset('images/'.$item['file_path'])}}" alt="product-image">


                        </div>
                        <div class="text-center pt-3">
                            <h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{$item['name']}} </h3>

                            @if($item['discount']>0)
                                <h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger">
                                    ${{$item['price']-(($item['price']/100)*$item['discount'])}}
                                    <span
                                        class="text-secondary font-weight-normal tx-13 ml-1 prev-price">${{$item['price']}}</span>
                                </h4>
                            @else
                                <h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger">${{$item['price']}}
                            </h4>

                            @endif
                        </div>
                        <div class="card-footer" style="text-align: center">
                            <a class="modal-effect btn-lg btn-info" data-effect="effect-scale"
                               style="margin: 20px;padding: 20px"
                               data-id="{{ $item->id }}" data-name="{{ $item->name }}" data-size="{{ $item->price }}"
                               data-description="{{ $item->discount }}" data-toggle="modal" href="#modaldemo2"
                               title="edit"><i class="las la-pen"></i></a>

                            <a class="modal-effect btn-lg  btn-danger" data-effect="effect-scale"
                               style="margin: 20px;padding: 20px"
                               data-id="{{ $item->id }}" data-name="{{ $item->name }}" data-toggle="modal"
                               href="#modaldemo3" title="delete"><i class="las la-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>


        @endforeach


    </div>
    {{ $store->links('vendor.pagination.custom') }}



    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
    <!-- Add modal -->
    <div class="modal" id="modaldemo1">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Add a T-Shirt</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{route('store.store')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">T-Shirt Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">T-Shirt Price:</label>
                            <input type="text" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">T-Shirt Discount Percent:</label>
                            <input type="text" class="form-control" id="discount" name="discount" required value="0">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">T-Shirt Price After Discount:</label>
                            <input type="text" class="form-control" id="after" name="after" readonly>
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
    <!-- Add modal -->
    <!-- edit modal -->
    <div class="modal" id="modaldemo2">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Edit T-Shirt</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form action="store/update" method="post" enctype="multipart/form-data" autocomplete="off">
                    {{method_field('patch')}}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="">
                            <label for="exampleInputEmail1">T-Shirt Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">T-Shirt Price:</label>
                            <input type="text" class="form-control" id="price1" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">T-Shirt Discount Percent:</label>
                            <input type="text" class="form-control" id="discount1" name="discount" value="0" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">T-Shirt Price After Discount:</label>
                            <input type="text" class="form-control" id="after1" name="after" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">T-Shirt Photo:</label>
                            <input type="file" name="file" id="file">
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
    <!--end edit modal -->
    <!-- delete modal -->
    <div class="modal" id="modaldemo3">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Delete T-Shirt</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal"
                            type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="store/destroy" method="post">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p>?Are you sure about this</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="name" id="name" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Confirm</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end delete modal -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!-- Internal Modal js-->
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>
    <script>
        $('#modaldemo2').on('show.bs.modal', function (event) {
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
        });
    </script>
    <script>
        $('#modaldemo3').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')

            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        });
    </script>
    <script>
        $("#price").keyup(function () {

            const pr = $("#price");
            const aft = $('#after');
            const dis = $("#discount");
            if (pr[0].value == "0" || pr[0].value=="") {
                alert("please check ur price value");
            } else {
                if (dis[0].value != "" || dis[0].value != 0) {
                    aft[0].value = parseInt(pr[0].value) - ((parseInt(pr[0].value) / 100) * parseInt(dis[0].value));

                } else {
                    aft[0].value = pr[0].value;
                }
            }

        });
        $("#discount").keyup(function () {


            const pr = $("#price");
            const aft = $('#after');
            const dis = $("#discount");
            if (pr[0].value == "0" || pr[0].value=="") {
                alert("please check ur price value");
            } else {
                if (dis[0].value > 100 || dis[0].value < 0) {
                    dis[0].value = 0;
                    alert("precentage must be between 100 and 0");
                }
                if (dis[0].value != "" || dis[0].value != 0) {
                    aft[0].value = parseInt(pr[0].value) - ((parseInt(pr[0].value) / 100) * parseInt(dis[0].value));

                } else {
                    aft[0].value = pr[0].value;
                }
            }

        });
        $("#price1").keyup(function () {

            const pr = $("#price1");
            const aft = $('#after1');
            const dis = $("#discount1");
            if (pr[0].value == "0" || pr[0].value=="") {
                alert("please check ur price value");
            } else {
                if (dis[0].value != "" || dis[0].value != 0) {
                    aft[0].value = parseInt(pr[0].value) - ((parseInt(pr[0].value) / 100) * parseInt(dis[0].value));

                } else {
                    aft[0].value = pr[0].value;
                }
            }

        });
        $("#discount1").keyup(function () {


            const pr = $("#price1");
            const aft = $('#after1');
            const dis = $("#discount1");
            if (pr[0].value == "0" || pr[0].value=="") {
                alert("please check ur price value");
            } else {
                if (dis[0].value > 100 || dis[0].value < 0) {
                    dis[0].value = 0;
                    alert("precentage must be between 100 and 0");
                }
                if (dis[0].value != "" || dis[0].value != 0) {
                    aft[0].value = parseInt(pr[0].value) - ((parseInt(pr[0].value) / 100) * parseInt(dis[0].value));

                } else {
                    aft[0].value = pr[0].value;
                }
            }

        });

    </script>
@endsection
