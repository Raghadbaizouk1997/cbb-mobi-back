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

    <div class="row" style="direction:rtl">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-block">
                    @if ($user->personal_image)
                        <div style="display:flex ; justify-content: center; margin-bottom:20px  ">
                            <img style="height:150px; border-radius: 50%;" src={{$user->personal_image }} />
                        </div>
                    @endif
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        @if ($user->full_name)
                            <div class="form-group mb-3">
                                <label for="name">الاسم
                                </label>
                                <input id="name" name="name" type="text"
                                    value="{{ $user->full_name}}"
                                    class="form-control validate" readonly />
                            </div>
                        @endif
                        <div class="form-group mb-3">
                            <label for="mobile">رقم الموبايل</label>
                            <input id="mobile" name="mobile" type="text" value="{{ $user->mobile }}"
                                class="form-control validate" readonly />
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">حساب البنك</label>
                            <input id="quantity" name="quantity" type="text" class="form-control validate"
                                value="{{ $user->bank_account }}" readonly />
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">اسم البنك</label>
                            <input id="quantity" name="quantity" type="text" class="form-control validate"
                                value="{{ $user->bank_name }}" readonly />
                        </div>
                        @if ($user->gender)
                            <div class="form-group mb-3">
                                <label for="name">الجنس</label>
                                <input id="quantity" name="quantity" type="text" class="form-control validate"
                                    value="{{ $user->gender }}" readonly />
                            </div>
                        @endif
                       
                        
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                        @if ($user->front_image)
                            <div class="form-group mb-3">
                                <label for="bio">الصورة الامامية للهوية</label>
                                <br>
                            <img style="height:150px" src={{$user->front_image }} />
                                
                            </div>
                        @endif

                       
                        @if ($user->back_image)
                        <div class="form-group mb-3">
                            <label for="bio">الصورة الخلفية للهوية</label>
                            <br>
                        <img style="height:150px;" src={{$user->back_image }} />
                            
                        </div>
                        @endif
                      
                    </div>

                    
                </div>
              
                <hr style="width:50%">
                    
                @if ($user->is_active !== 1)
                    <div style="display:flex; justify-content: center; margin-bottom: 3rem; margin-top:1rem">
                        <form class="form-horizontal" method="post"
                            action="{{ route('users.activate', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-success" style="margin-left: 2rem">
                                <i class="fa fa-solid fa-check"></i> تفعيل </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
        <!--/col-->
    </div>
@endsection
