@extends('layouts.layout')
@section('sub_title')
    <h2 class="" style="text-align:center;"> طلبات الانضمام  </h2>
 @endsection
@section('content')

<div style="direction: rtl">
    @if ($message = Session::get('success'))
        <br>
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endif
</div>

<div class="row">
    
    <br><br>
</div>
@if ($users->count() == 0)
    <center><img id="blah" src="{{ asset('images/nodata.png') }}" height="300" /></center>
@endif
@if ($users->count() > 0)

<div class="row" style="direction: rtl;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> طلبات الانضمام
            </div>
            <div class="card-block">
                <table class="table table-bordered table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>الرقم</th>
                            <th>رقم الموبايل</th>
                            <th> الاسم الكامل</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                          
                            <td>{{ $item->mobile }}</td>
                            <td>{{ $item->full_name }}</td>
                          
                            <td style="text-align: center; display:flex">
                                
                                {{-- <a class="btn btn-primary  text-uppercase" href="{{ route('users.show', $item->id) }}" style="border-radius: 5px;  "> 
                                    <i class="fa fa-eye"></i> استعراض </a> --}}
                                  &nbsp;&nbsp;
                                  
                                 
                                  &nbsp;&nbsp;
                                  <a class="btn btn-primary  text-uppercase"
                                  href="{{ route('users.show', $item->id) }}"
                                  style="border-radius: 5px;  ">
                                  <i class="fa fa-eye"></i> استعراض </a>
                              &nbsp;&nbsp;

                              <form class="form-horizontal" method="post" action="{{ route('users.activate',$item->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                              <button class="btn btn-success"  style=" border-radius: 5px;  "> 
                                <i class="fa fa-solid fa-check"></i> تفعيل </button>
                              </form>
                              &nbsp;&nbsp;
                               
                            </td>
                            
                        </tr>
                       
                       @endforeach
                        
                       
                    </tbody>
                </table>
             
            </div>
        </div>
    </div>
    <!--/col-->
</div>
@endif

@endsection