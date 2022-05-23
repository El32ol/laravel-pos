@extends('dashboard.extendes.index');
@section('content')
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-3 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm text-dark active"><a class="opacity-5 text-dark"
                            href="{{ route('dashboard.index') }}">{{ __('messages.home') }}</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" > <a class="opacity-5 text-dark" href="{{route('dashboard.users.index')}}"> {{ __('messages.super_admin') }} </a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                        {{ __('messages.add_super_admin') }}</li>
                </ol>
                {{-- <h6>{{__('messages.super_admin')}}</h6> --}}
            </nav>
            <ul>
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a rel="alternate" hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
    <section class="content">

        <div class="box box-primary">
            <div class="box-header with border" >
                <h3 class="box-title">{{ __('messages.add_super_admin') }}</h3>
            </div>
          
        <div class="box-body">
        <form  action="{{route('dashboard.users.store')}}" method="post"  enctype="multipart/form-data">
        @include('partials._erorrs')
        {{-- @include('partials._success') --}}
        {{csrf_field()}}
        {{method_field('post')}}
             <div class="form-group">
               <label for="text">{{__('messages.first_name')}}</label>
               <input type="text"class="form-control" name="first_name"   placeholder="{{__('messages.enter_first_name')}}" value="{{old('first_name')}}">
             </div>
             <div class="form-group">
               <label for="text">{{__('messages.last_name')}}</label>
               <input type="text"class="form-control" name="last_name"   placeholder="{{__('messages.enter_last_name')}}" value="{{old('last_name')}}">
             </div>
             <div class="form-group">
               <label for="text">{{__('messages.email')}}</label>
               <input type="text"class="form-control" name="email"   placeholder="{{__('messages.enter_email')}}" value="{{old('email')}}">
             </div>
             <div class="form-group">
               <label for="text">{{__('messages.image')}}</label>
                              <input type="file" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"class="form-control image" name="image"  alt="">

             </div>
             <div class="form-group">
              <img src="{{asset('upload/user_images/default.jpg')}}" style="width:100px;" id="image" class="img-thumbnail image-preview" alt="">
             </div>
             <div class="form-group">
               <label for="text">{{__('messages.password')}}</label>
               <input type="password"class="form-control" name="password"   placeholder="{{__('messages.password')}}" >
             </div>
             <div class="form-group">
               <label for="text">{{__('messages.cpassword')}}</label>
               <input type="password"class="form-control" name="cpassword"   placeholder="{{__('messages.cpassword')}}">
             </div>
             
           
       <div class="form-group">
         @php
                $models=['products','category'];
         @endphp

        <label> {{__('messages.permissions')}} </label>
          <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class=""><a href="#users">Home</li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"></div>
</div>
@if (auth()->user()->hasRole('super_admin'))
    

    <div class="tab-pane active" id="users">
              <div class="form-check">
                   
                    <label > <input type="checkbox" class="form-check-input" name="permissions[]"  value="users_create">{{__('messages.create')}} </label>
                           
                    <label ><input type="checkbox" class="form-check-input" name="permissions[]"   value="users_read">{{__('messages.read')}} </label>
                         
                    <label >  <input type="checkbox" class="form-check-input" name="permissions[]"  value="users_update">{{__('messages.update')}} </label>
                          
                    <label > <input type="checkbox" class="form-check-input" name="permissions[]"  value="users_delete">{{__('messages.delete')}} </label>
                  </div>
               @endif
                    
                </div>
                  </div>
                  </div>
                  </div>
       </div>
         

               
                 
               
              
              
          
              <div class="form-group">
                <button type="submit" class="btn btn-primary">{{__('messages.save')}}</button>
             </div>
            </form>








                        {{-- <a class="btn btn-info btn-sm" title="Edit User" href="{{route('dashboard.users.edit',$user->id)}}"> <i class="fa fa-edit"></i>{{__('messages.edit')}}</a>
                       <form method="post" action="{{route('dashboard.users.destroy',$user->id)}}" style="display:inline-block">
                       @csrf
                       <button type="submit" class="btn btn-primary btn-sm"title="Delete User"> <i class="fa fa-tash"></i>{{__('messages.delete')}}</button>
                       </form> --}}
   
        </div>
    </section>
    
@endsection
 
