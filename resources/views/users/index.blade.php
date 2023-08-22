@extends('layouts.layout')
@section('sub_title')
    <h2 class="" style="text-align:center;"> المستخدمين ({{ $users->count() }})</h2>
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
        <div class="col-md-2">
            <a href="{{ route('users.requests') }}" class="btn btn-primary btn-block text-uppercase"
                style="border-radius: 15px; margin-bottom: 25px;">عرض طلبات الانضمام</a>
        </div>
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
                        <i class="fa fa-align-justify"></i> كل المستخدمين
                    </div>
                    <div class="card-block">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>الرقم</th>
                                    <th>رقم الموبايل</th>
                                    <th>الاسم الكامل</th>
                                    {{-- <th>الصورة</th> --}}

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>

                                        <td>{{ $item->mobile }}</td>
                                        <td>{{ $item->full_name }}</td>
                                       

                                        <td style="text-align: center">

                                            <a class="btn btn-primary  text-uppercase"
                                                href="{{ route('users.show', $item->id) }}"
                                                style="border-radius: 5px;  ">
                                                <i class="fa fa-eye"></i> استعراض </a>
                                            &nbsp;&nbsp;
                                            @if ($item->is_active === 1)
                                            <a class="btn btn-success  text-uppercase"
                                                href="{{ route('users.container', $item->id) }}"
                                                style="border-radius: 5px;  ">
                                                <i class="fa fa-eye"></i> الحافظة </a>
                                            &nbsp;&nbsp;
                                            @endif
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
