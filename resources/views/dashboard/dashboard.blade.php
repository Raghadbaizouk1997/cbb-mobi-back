@extends('layouts.layout')
@section('sub_title')
    <h2 class="" style="text-align:center;"> لوحة التحكم </h2>
 @endsection
@section('content')

<body>
    <div class="py-5">
        <div class="container-fluid">
            <div class="row" style="
            display: flex;
            justify-content: center;">
          
            <div class="col-md-3 col-sm-4">
              <div class="wrimagecard wrimagecard-topimage">
                  <a href="{{ URL::to('/') }}/users">
                  <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                    <center><i class = "fa fa-solid fa-users" style="color:#16A085"></i></center>
                  </div>
                  <div class="wrimagecard-topimage_title">
                    <h4>
                        <div class="pull-right badge"> المستخدمين</div>
                        <div>{{$users}}</div>
                    </h4>
                  </div>
                </a>
              </div>
        </div>
    
          
        </div>
        </div>
    </div>
   
  </body>


@endsection