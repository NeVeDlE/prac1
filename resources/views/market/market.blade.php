@extends('layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
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
            <form action="/market"method="GET">
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
                                <img class="w-100"  style="height: 300px;width: 20px" src="{{asset('images/'.$item['file_path'])}}" alt="product-image">
                                <a href="#" class="adtocart"> <i class="las la-shopping-cart "></i>
                                </a>
                            </div>
                            <div class="text-center pt-3">
                                <h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{$item['name']}}</h3>
                                <span class="tx-15 ml-auto">
												 {{$item['description']}}
											</span>
                                <h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger">Size: {{$item['size']}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <ul class="pagination product-pagination mr-auto float-left">
                    <li class="page-item page-prev disabled">
                        <a class="page-link" href="#" tabindex="-1">Prev</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item page-next">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
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
    <!-- Internal Nice-select js-->
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
@endsection
