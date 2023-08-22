@extends('layouts.layout')
@section('sub_title')
    <h2 class="" style="text-align:center; color:#263238">{{ $user->full_name }} </h2>
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
    <div style="direction: rtl">
        @if ($message = Session::get('error'))
            <br>
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @endif
    </div>

    <div class="row" style="direction:rtl">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-block">
                    @if ($user->fund === null)
                        <form class="form-horizontal" method="post" action="{{ route('fund.store', $user->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group" style="display: flex ; justify-content:center ; padding:10px">
                                <label class="form-control-label" for="name"
                                    style="font-size:1.2rem;font-weight:600;margin-left:15px">المبلغ</label>
                                <div class="controls">
                                    <div class="input-prepend input-group">
                                        <input id="amount" name="amount" class="form-control" size="50"
                                            type="text" style="margin-left:15px">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary"
                                    style="border-radius: 15px; margin-right:15px"> حفظ الرصيد </button>

                            </div>

                        </form>
                        <br>
                    <hr style="width:50%">
                    <br>
                    @endif
                    @if ($user->fund !== null)
                        <h3 style="text-align:center">المبلغ</h3>
                        <div style="text-align: center; margin-top:10px; font-size:1rem; color:#0d6794; font-weight:600">
                            {{ $user->fund->amount }}</div>
                   <br>
                    <hr style="width:50%">
                    <br>
                   
                    @endif 
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <a href="{{ route('containers.create', $user->id) }}"
                            class="btn btn-primary btn-block text-uppercase"
                            style="border-radius: 15px; margin-bottom: 25px; margin-right:1rem">إضافة ربح</a>
                    </div>
                </div>
                @if ($containers->count() == 0)
                    <center><img id="blah" src="{{ asset('images/nodata.png') }}" height="300" /></center>
                @endif
                @if ($containers->count() > 0)
                    <div class="row" style="direction: rtl;">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-align-justify"></i> الارباح الشهرية للمستخدم
                                </div>
                                <div class="card-block">
                                    <table class="table table-bordered table-striped table-condensed">
                                        <thead>
                                            <tr>
                                                <th>اسم المستخدم</th>
                                                <th>الشهر</th>
                                                <th>نسبة الربح</th>
                                                <th>قيمة الربح</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($containers as $item)
                                                <tr>
                                                    <td>{{ $item->user->full_name }}</td>
                                                    @php
                                                        $monthName = \Carbon\Carbon::create()
                                                            ->month($item->month)
                                                            ->format('F');
                                                    @endphp
                                                    <td>{{ $monthName . ' ' . $item->year }}</td>
                                                    <td>{{ $item->profit_percent }}</td>
                                                    <td>{{ $item->profit }}</td>
                                                    <td style="text-align:center">
                                                        <form method="POST"
                                                            action="{{ route('containers.destroy', $item->id) }}"
                                                            accept-charset="UTF-8" style="display:inline">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <button type="submit"
                                                                onclick="return confirm('Are You Sure  , you want delete {{ $item->profit_percent }}')"
                                                                style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;color: red;"><i
                                                                    class="fa fa-2x fa-trash"></i></button>
                                                        </form>
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
                    <br>
                    <hr style="width:50%">
                    <br>
                    <h3 style="text-align:center">الربح الكلي </h3>
                    <div style="text-align: center; margin-top:10px; font-size:1rem; color:#0d6794; font-weight:600">
                        {{ $totalProfit }}</div>

                        <br>
                @endif

            </div>
        </div>
        <!--/col-->
    </div>
@endsection
