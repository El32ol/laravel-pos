@extends('dashboard.extendes.index');
@section('content')
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-3 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm text-dark active"><a class="opacity-5 text-dark"
                            href="{{ route('dashboard.index') }}">{{ __('messages.home') }}</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                        {{ __('messages.super_admin') }}</li>
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
                <h3 class="box-title">{{ __('messages.super_admin') }} <small> {{count($users)}}</small>  </h3>
            </div>
                
            <form class="form-group" action="{{route('dashboard.users.index')}}" method="get" >
            <div class="row">
            <div class="col-md-4">
             <input type="text" name="search" class="form-control"  placeholder={{__('messages.search')}} value={{request()->search}}>
            </div>
            <div class="col-md-4">
            <button type="submit" class="btn btn-primary " title="Search User"> <i class="fa fa-search"> </i>{{__('messages.search')}}</button>
            @if (auth()->user()->haspermission('users_create'))
            <a href="{{route('dashboard.users.create')}}"  title="Add New User" class="btn btn-primary"> <i class="fa fa-plus"></i>{{__('messages.add')}}</a>   
            @else
            <a href="{{route('dashboard.users.create')}}"  title="Add New User" class="btn btn-primary disabled"> <i class="fa fa-plus"></i>{{__('messages.add')}}</a>   
            @endif
            </div>
            </div>
            </form>
            <div class="box-body">

       @if ($users->count() > 0)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>{{__('messages.id')}}</th>
                    <th>{{ __('messages.first_name') }}</th>
                    <th>{{ __('messages.last_name') }}</th>
                    <th>{{ __('messages.email') }}</th>
                    <th>{{ __('messages.image') }}</th>
                    <th>{{ __('messages.action') }}</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($users as $index=>$user) 
                   <tr>
                    <td>{{$index + 1}}</td>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td><img src="{{$user->image_path}}" style="width:100px;" class="img-thumbnail" ></td>
                    <td>
                    @if (auth()->user()->hasPermission('users_update'))
                        <a class="btn btn-info btn-sm" title="Edit User" href="{{route('dashboard.users.edit',$user->id)}}"> <i class="fa fa-edit"></i>{{__('messages.edit')}}</a>
                   @else
                        <a class="btn btn-info btn-sm disabled" href="#" ></a> <i class="fa fa-edit"></i>{{__('messages.edit')}}</a>
                    @endif
                    @if (auth()->user()->hasPermission('users_delete'))
                         <form action="{{route('dashboard.users.destroy', $user->id)}}" method="post"  style="display:inline-block">
                       {{csrf_field()}}
                       {{method_field('delete')}}
                       <button type="submit" class="btn btn-primary btn-sm"title="Delete User"> <i class="fa fa-trash"></i>{{__('messages.delete')}}</button>
                       </form>
                       @else
                       <button  class="btn btn-primary btn-sm disabled"title="Delete User"> <i class="fa fa-trash"></i>{{__('messages.delete')}}</button>
                    @endif
                        {{-- <a class="btn btn-primary btn-sm" title="Delete User" href="{{route('dashboard.users.destroy',$user->id)}}"> <i class="fa fa-trash"></i> {{__('messages.delete')}}<a> --}}
                    </td>
                  </tr> 
              @endforeach  
            </tbody>
        </table>
        {{-- {{$users->links()}} --}}
            @else
                 <h2>{{ __('messages.no_data')}}</h2>
            @endif
        </div>
    </section>
@endsection

