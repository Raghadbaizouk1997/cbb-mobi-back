@extends('layouts.layout')
@section('sub_title')
    <h2 class="" style="text-align:center;">إضافة خدمة</h2>
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

    <div class="row" style="direction:rtl">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-plus-square-o"></i> إضافة ربح جديد
                </div>
                <div class="card-block">
                    <form class="form-horizontal" method="post" action="{{ route('containers.store',$user->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label" for="name">(0.05)نسبة الربح نسبة مئوية</label>
                            <div class="controls">
                                <div class="input-prepend input-group">
                                    <input id="profit_percent" name="profit_percent" class="form-control" size="16" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="name"> الشهر</label>
                                <select class="selectpicker" data-style="btn-inverse" 
                                    data-live-search="true" name="month">
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i)) . " " . $i}}</option>
                                    @endfor
                                </select>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary" style="border-radius: 15px;">إضافة الربح </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!--/col-->
    </div>
@endsection
