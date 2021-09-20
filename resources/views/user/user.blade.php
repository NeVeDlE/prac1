@extends('layouts.master')
@section('css')
    <!-- Internal Select2 css -->
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Profile</h4>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">

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
    <!-- row -->
    <div class="row row-sm">
        <!-- Col -->
        <div class="col-lg-4">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="pl-0">
                        <div class="main-profile-overview">
                            <div class="main-img-user profile-user">
                                @if(Auth::user()->file_path!=null)
                                    <img alt="" src="{{asset('User_Photos/'.Auth::user()->file_path)}}"><a
                                        class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
                                @else
                                    <img alt=""
                                         src="{{URL::asset('User_Photos/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg')}}">
                                    <a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>

                                @endif

                            </div>
                            <div class="d-flex justify-content-between mg-b-20">
                                <div>
                                    <h5 class="main-profile-name">{{Auth::user()->name}}</h5>
                                    <p class="main-profile-name-text">@if(!empty(Auth::user()->getRoleNames()))
                                            @foreach(Auth::user()->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif</p>
                                </div>
                            </div>


                        </div><!-- main-profile-overview -->
                    </div>
                </div>
            </div>
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="main-content-label tx-13 mg-b-25">
                        Conatct
                    </div>
                    <div class="main-profile-contact-list">
                        <div class="media">
                            <div class="media-icon bg-primary-transparent text-primary">
                                <i class="icon ion-md-phone-portrait"></i>
                            </div>
                            <div class="media-body">
                                <span>Mobile</span>
                                <div>
                                    {{Auth::user()->phone}}
                                </div>
                            </div>
                        </div>

                        <div class="media">
                            <div class="media-icon bg-info-transparent text-info">
                                <i class="icon ion-md-locate"></i>
                            </div>
                            <div class="media-body">
                                <span>Current Address</span>
                                <div>
                                    {{Auth::user()->address}}
                                </div>
                            </div>
                        </div>
                    </div><!-- main-profile-contact-list -->
                </div>
            </div>
        </div>

        <!-- Col -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4 main-content-label">Personal Information</div>
                    <form class="form-horizontal">

                        <div class="mb-4 main-content-label">Name</div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">User Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="User Name"
                                           value="{{Auth::user()->name}}" readonly>
                                </div>
                            </div>
                        </div>



                        <div class="mb-4 main-content-label">Contact Info</div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Email<i></i></label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Email"
                                           value="{{Auth::user()->email}}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Phone</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Nick Name"
                                           value="{{Auth::user()->phone}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Address</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Last Name"
                                           value="{{Auth::user()->address}}" readonly>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-left">

                    <button type="submit" class="btn btn-primary waves-effect waves-light " data-toggle="modal"
                            data-target="#modaldemo9"
                            data-name="{{ Auth::user()->name }}"
                            data-email="{{ Auth::user()->email}}"
                            data-file="{{ Auth::user()->file_path}}"
                            data-address="{{ Auth::user()->address}}"
                            data-phone="{{ Auth::user()->phone}}"
                            data-id="{{ Auth::user()->id }}"

                    >Edit Profile

                    </button>
                </div>

            </div>
        </div>
        <!-- /Col -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
    <div class="modal fade" id="modaldemo9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="profile/update" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{method_field('patch')}}
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="id" name="id" value="{{Auth::user()->id}}"
                                   hidden>

                            <label for="exampleInputEmail1">Name:</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{Auth::user()->name}}">
                        </div>
                        <div class="form-group">

                            <label for="exampleInputEmail1">Email:</label>
                            <input type="text" class="form-control" id="email" name="email"
                                   value="{{Auth::user()->email}}">
                        </div>
                        <div class="form-group">

                            <label for="exampleInputEmail1">Photo:</label>
                            <input type="file" class="form-control" id="file" name="file" value="">
                        </div>
                        <div class="form-group">

                            <label for="exampleInputEmail1">Address:</label>
                            <input type="text" class="form-control" id="address" name="address"
                                   value="{{Auth::user()->address}}">
                        </div>
                        <div class="form-group">

                            <label for="exampleInputEmail1">Phone:</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                   value="{{Auth::user()->phone}}">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/select2.js')}}"></script>
@endsection
