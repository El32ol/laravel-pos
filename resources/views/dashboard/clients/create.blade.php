@extends('dashboard.extendes.index');
@section('content')
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-3 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm text-dark active"><a class="opacity-5 text-dark"
                            href="{{ route('dashboard.index') }}">{{ __('messages.home') }}</a></li>
                    <li class="breadcrumb-item text-sm text-dark active"> <a class="opacity-5 text-dark"
                            href="{{ route('dashboard.clients.index') }}"> {{ __('messages.clients') }} </a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                        {{ __('messages.clients') }}</li>
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
            <div class="box-header with border">
                <h3 class="box-title">{{ __('messages.clients') }}</h3>
            </div>

            <div class="box-body">
                <form action="{{ route('dashboard.clients.store') }}" method="post">
                    @include('partials._erorrs')
                    {{-- @include('partials._success') --}}
                    {{ csrf_field() }}
                    {{ method_field('post') }}


                    <div class="form-group">
                        <label for="text">{{ __('messages.name') }}</label>
                        <input type="text" class="form-control" name="name" placeholder="{{ __('messages.enter_name') }}"
                            value="{{ old('name') }}">
                    </div>


                    @for ($i = 0; $i < 2; $i++)
                        <div class="form-group">
                            <label for="text">{{ __('messages.phone') }}</label>
                            <input type="text" class="form-control" name="phone[]"
                                placeholder="{{ __('messages.phone') }}">
                        </div>
                    @endfor
                    <div class="form-group">
                        <label for="text">{{ __('messages.address') }}</label>
                        <input type="text" class="form-control" name="address" placeholder="{{ __('messages.address') }}"
                            value="{{ old('address') }}">
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
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
