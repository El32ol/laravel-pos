  <aside
      class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
      id="sidenav-main">
      <div class="sidenav-header">
          <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
              aria-hidden="true" id="iconSidenav"></i>
          <a class="navbar-brand m-0" href="{{route('dashboard.index')}}" >
              <img src="{{ asset('assets/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
              <span class="ms-1 font-weight-bold text-white">{{__('messages.dashboard')}}</span>
          </a>
      </div>
      <hr class="horizontal light mt-0 mb-2">
      <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
         
          <ul class="navbar-nav">
          
              
              <li class="nav-item">
                  <a class="nav-link text-white bg-gradient-primary" href="{{route('dashboard.index')}}">
                      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                          
                      </div>
                      <span class="nav-link-text ms-1">{{__('messages.home')}}</span>
                  </a>
              </li>
              @if (auth()->user()->hasPermission('users_read'))
                  
              <li class="nav-item">
                  <a class="nav-link text-white " href="{{route('dashboard.users.index')}}">
                      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                          
                      </div>
                      <span class="nav-link-text ms-1">{{__('messages.super_admin')}}</span>
                  </a>
              </li>
              @endif
               @if (auth()->user()->hasPermission('categories_read'))
                  
              <li class="nav-item">
                  <a class="nav-link text-white " href="{{route('dashboard.categories.index')}}">
                      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                          
                      </div>
                      <span class="nav-link-text ms-1">{{__('messages.categories')}}</span>
                  </a>
              </li>
              @endif

                   @if (auth()->user()->hasPermission('clients_read'))
                  
              <li class="nav-item">
                  <a class="nav-link text-white " href="{{route('dashboard.clients.index')}}">
                      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                          
                      </div>
                      <span class="nav-link-text ms-1">{{__('messages.clients')}}</span>
                  </a>
              </li>
              @endif

               @if (auth()->user()->hasPermission('products_read'))
                  
              <li class="nav-item">
                  <a class="nav-link text-white " href="{{route('dashboard.products.index')}}">
                      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                          
                      </div>
                      <span class="nav-link-text ms-1">{{__('messages.products')}}</span>
                  </a>
              </li>
              @endif

          </ul>
     
      </div>
      <div class="sidenav-footer position-absolute w-100 bottom-0 ">
          <div class="mx-3">
              {{-- <a class="btn bg-gradient-primary mt-4 w-100" href="" type="button">{{__('messages.sign_out')}}</a> --}}
            <a class="btn bg-gradient-primary mt-4 w-100" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('messages.sign_out') }}
                                    </a>
          </div>
      </div>
  </aside>
