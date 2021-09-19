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
                    <form action="{{route('status_update')}}" method="post" autocomplete="off">
                        @csrf
                        {{method_field('get')}}
                        {{-- 1 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">Order id</label>
                                <input type="hidden" name="invoice_id" value="{{ $order->id }}">
                                <input type="text" class="form-control" id="id" name="id"
                                       value="{{ $order->id }}" required
                                       readonly>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">T-Shirt Name</label>
                                <input type="text" class="form-control"
                                       value="{{ $order->item_name }}" required
                                       readonly>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">T-shirt ID</label>
                                <input type="text" class="form-control"
                                       value="{{ $order->item_id }}" required
                                       readonly>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">T-shirt Price</label>
                                <input type="text" class="form-control"
                                       value="{{ $order->item_price }}" required
                                       readonly>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">Customer Name</label>
                                <input type="text" class="form-control"
                                       value="{{ $order->name }}" required
                                       readonly>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">Customer Phone</label>
                                <input type="text" class="form-control"
                                       value="{{ $order->phone }}" required
                                       readonly>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">Customer Email</label>
                                <input type="text" class="form-control"
                                       value="{{ $order->email }}" required
                                       readonly>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">Customer Role</label>
                                <input type="text" class="form-control"
                                       value="{{ $order->role }}" required
                                       readonly>
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
                            <div class="col"></div>
                            <div class="col"></div>
                            <div class="col"></div>
                        </div>
                        <div class="row">
                            <div class="col">
                            <label for="exampleTextarea">Order Status</label>
                            <select class="form-control" id="Status" name="Status" required>
                                <option selected="true" disabled="disabled">--Choose Status-</option>
                                <option value="1">Success</option>
                                <option value="2">Pending</option>
                                <option value="3">Cancelled</option>
                            </select>
                            </div>
                            <div class="col"></div>

                        </div>


                        {{-- 2 --}}


                        <br>

                        <br>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">تحديث حالة الدفع</button>
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
