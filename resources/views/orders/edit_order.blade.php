@extends('layouts.master')
@section('css')
@endsection
@section('title')
    تغير حالة الدفع
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تغير حالة الدفع</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{url('orders/update')}}" method="post" autocomplete="off">
                        @csrf
                        {{ method_field('patch') }}

                        {{-- 1 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">Order id</label>
                                <input type="hidden" name="id" value="{{ $order->id }}">
                                <input type="text" class="form-control" id="id" name="id"
                                       value="{{ $order->id }}" required
                                >
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">T-Shirt Name</label>
                                <input type="text" class="form-control" id="item_name" name="item_name"
                                       value="{{ $order->item_name }}" required
                                >
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">T-shirt ID</label>
                                <input type="text" class="form-control" id="item_id" name="item_id"
                                       value="{{ $order->item_id }}" required readonly
                                >
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">T-shirt Price</label>
                                <input type="text" class="form-control" id="item_price" name="item_price"
                                       value="{{ $order->item_price }}" required
                                >
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">Customer Name</label>
                                <input type="text" class="form-control"id="name" name="name"
                                       value="{{ $order->name }}" required
                                >
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">Customer Phone</label>
                                <input type="text" class="form-control"id="phone" name="phone"
                                       value="{{ $order->phone }}" required
                                >
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">Customer Email</label>
                                <input type="text" class="form-control"id="email" name="email"
                                       value="{{ $order->email }}" required
                                >
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">Order Status</label>
                                @if($order->status==1)
                                    <input type="text" class="form-control"
                                           value="Success" required
                                           readonly>
                                @elseif($order->status==2)
                                    <input type="text" class="form-control"
                                           value="Pending" required
                                           readonly>
                                @else
                                    <input type="text" class="form-control"
                                           value="Cancelled" required
                                           readonly>
                                @endif
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">Customer Address</label>
                                <input type="text" class="form-control"id="address"name="address"
                                       value="{{ $order->address }}" required
                                >
                            </div>
                            <div class="col"></div>
                            <div class="col"></div>
                        </div>
                        <div class="row">
                            <div class="col">

                            </div>
                            <div class="col"></div>

                        </div>


                        {{-- 2 --}}


                        <br>

                        <br>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Edit Order</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>


@endsection
