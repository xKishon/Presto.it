<nav class="navbar nav_font navborder navbar-expand-lg fixed-top p-0 bg_main"  id="navbar">
    <div class="container-fluid p-0">
      <div class="logo d-flex">
          <a class=" nav_logo text-uppercase text_accent m-0 fw-bold text-center" href="{{route('homepage')}}"></a>
      </div>
      {{-- <button class="navbar-toggler bg-info" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="bi bi-list"></i>
      </button> --}}
      <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
        <ul class="navbar-nav mx-4">
          <li class="nav-item">
            <form class="d-flex justify-content-center mt-2" role="search" action="{{route('search.articles')}}" method="GET">
              <input name="searched" class="searchbar_custom ps-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn" type="submit">
                <i class="bi bi-search"></i>
              </button>
            </form>
          </li>
            <li class="nav-item dropdown mt-2">
              <a class="nav-link dropdown-toggle text-uppercase hover_accent" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{__('ui.Categories')}}
              </a>
              <ul class="dropdown-menu position-absolute">
                  @forelse ($categories as $category)
                  <li>
                    @switch(App::getLocale())
                    @case('it')
                     <a class="dropdown-item"
                      href="{{ route('category.show', compact('category')) }}">{{$category->it}}
                    </a>
              
                        @break
                    @case('zh')
                    <a class="dropdown-item"
                    href="{{ route('category.show', compact('category')) }}">{{$category->zh}}
                    </a>
                        @break
                    @case('fr')
                    <a class="dropdown-item"
                      href="{{ route('category.show', compact('category')) }}">{{$category->fr}}
                    </a>
                    @break
                    @default
                    <a class="dropdown-item"
                      href="{{ route('category.show', compact('category')) }}">{{ $category->name}}
                    </a>
                @endswitch
                    {{-- <a class="dropdown-item"
                      href="{{ route('category.show', compact('category')) }}">{{ $category->name }}
                    </a> --}}
                  </li>
                  @empty
                  @endforelse
              </ul>
            </li>  
            <li class="nav-item mt-2">
              <a class="nav-link text-uppercase hover_accent" href="{{route('article.index')}}">
                {{__('ui.Index')}}
              </a>
            </li> 
            <li class="nav-item mt-2">
              @auth
                  @if (Auth::user()->is_revisor)
                      <a class="nav-link position-relative text-uppercase hover_accent" aria-current="page"
                      href="{{route('revisor.index')}}">{{__('ui.Revisor Area')}}
                      <span class="position-absolute top-0 start-100 translate-middle mt-2 badge rounded-pill bg-danger">{{App\Models\Article::toBeRevisionedCount()}}
                          <span class="visually-hidden">Unread messages</span>
                      </span>
                      </a>
                  @endif
              @endauth
            </li>
          </div>
                          
        </ul>
        @guest
            <div class="nav-item me-2">
            <a href="{{route('login')}}" class="text-decoration-none text_dark">
                <i class="bi bi-person fs-3 hover_accent"></i>
            </a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <i class="bi bi-list"></i>
            </button>
        @else
            <div class="nav-item me-2 dropdown">
                <a href="" class="text-decoration-none text_dark dropdown-toggle ms-4" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{__('ui.Welcome')}} <span class="text_accent">{{Auth::user()->name}}</span>
                  <i class="bi bi-person fs-3"></i>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{route('profile')}}">{{__('ui.Profile')}}</a></li>
                  <li><a class="dropdown-item" href="{{route('article.create')}}">{{__('ui.Sell your items')}}</a></li>
                  <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a></li>
                  <form id="form-logout" method="POST" action="{{route('logout')}}" class="d-none">@csrf</form>
                </ul>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <i class="bi bi-list"></i>
            </button>
        @endguest
      </div>

      
    </div>
  </nav>