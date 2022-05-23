@extends('dashboard.extendes.index');
@section('content')

      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
        <h6>{{__('messages.home')}}</h6>
          <ol class="breadcrumb bg-transparent mb-3 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{ __('messages.home')}}</li>
          </ol>
        </nav>
        <ul>
           @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li>
            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
        </li>
          @endforeach
        </ul>
      </div>
  </nav>

    
@endsection