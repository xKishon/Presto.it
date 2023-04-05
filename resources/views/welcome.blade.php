<x-layout>

<!----------------------------------------------------------------------- LANDING PAGE -->
    <div class="container-fluid landing_page">
      <div class="row h-100">
        <div class="col-12 col-md-6 d-flex justify-content-center align-items-center mt-5">
          <div>
            <h1 class="display-3 text-center text_accent fw-normal text_shadow text-uppercase">{{__('ui.Buy-Sell-Earn')}}</h1>
            <h2 class="display-7 text-center text-white fw-normal text_shadow">{{__('ui.Move according to your needs')}}</h2>
            <div class="d-flex justify-content-center">
              <a type="button" href="{{route('article.create')}}" class="btn_landing my-3 px-4 text-uppercase py-2 text_shadow text-decoration-none">{{__('ui.Start selling')}}</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
          <div>
            <p class="fs-3 text-white text_shadow">You can <span class="auto-type text_accent fw-bold"></span></p>
          </div>
        </div>
      </div>
    </div>

    @if(session('messageRevisor'))
    <div class="alert alert-success">
        {{session('messageRevisor')}}
    </div>
    @endif

<!----------------------------------------------------------------------- CATEGORIES -->

    {{-- <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 mt-4">
                <h3 class="display-6 text-uppercase fw-normal text-start newUpdates_arrow">Real-time Updates</h3>
            </div>
        </div>
        <div class="row my-3 justify-content-around ">
            <div class="col-3 rounded bg-info d-flex flex-column">
                <p class="fs-1 text-center m-0">5</p>
                <p class="fs-5 text-center m-0">Users</p>
                <p class="text-center">Choosed our site</p>
            </div>         
            <div class="col-3 rounded bg-info d-flex flex-column">
                <p class="fs-1 text-center">{{$count}}</p>
                <p class="fs-5 text-center">Articles</p>
            </div>   
        </div>
    </div> --}}



      
      

    <!----------------------------------------------------------------------- LAST UPDATES -->
      
    <div class="container mb-5">
        <div class="row justify-content-center p-0">
            <div class="col-12 mt-4 p-0">
            <h3 class="display-6 text-uppercase fw-normal text-end newUpdates_arrow me-3">{{__('ui.Last Updates')}}</h3>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($articles as $article)
            <div class="col-8 col-md-3 shadow p-0 mx-3 my-2 rounded">
            <img src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(500,300) : asset('media/image-not-found.png')}}" class="card-img-top rounded-top" alt="{{$article->name}}">
            <div class="card-body p-3 pb-0">
                <h5 class="card-title text_accent fs-4 text-truncate">{{$article->name}}</h5>
                <p class="text-secondary">{{$article->category->name}}</p>
                <p class="card-text text-truncate">{{$article->description}}</p>
                @if ($article->offer > 0)
                <div class="d-flex justify-content-between">
                    <p class="text-secondary m-0 text-decoration-line-through">{{$article->price}} €</p>
                    <small class="text-white px-2 m-0 bg-danger d-inline">{{$article->offer}}% sale</small>

                </div>
                <div class="text-end d-flex justify-content-between align-content-center">
                    <p class="text_dark fs-4 mt-2 mb-0">{{$article->price - ($article->price * $article->offer /100)}} €</p>
                    <a type="button" href="{{route('article.show', compact('article'))}}" class="btn"><i class="bi bi-arrow-right text_accent fs-3 move_X"></i></a>
                </div>
                @else
                <div class="text-end d-flex justify-content-between align-content-center">
                    <p class="text_dark fs-4 mt-2">{{$article->price}} €</p>
                    <a type="button" href="{{route('article.show', compact('article'))}}" class="btn"><i class="bi bi-arrow-right text_accent fs-3 move_X"></i></a>
                </div>
                @endif
                
                
                
            </div>
            </div>
            @endforeach
        </div>
    </div>


    {{-- ------------------------------------------------------------------------ NEW OFFER --}}

   <div class="container my-5">

    <div class="row justify-content-center p-0">
        <div class="col-12 mt-4 p-0">
            <h3 class="display-6 text-uppercase fw-normal text-start newUpdates_arrow ms-3">{{__('ui.Now on Sale')}}!</h3>
        </div>
    </div>

    <div class="swiper mySwiper3">
        <div class="swiper-wrapper ">
            @foreach ($offers as $offer)
                @if ($offer->offer > 0)    
                    <div class="swiper-slide card_update mx-3">
                        <a href="{{route('offer.show', compact('offer'))}}">
                            <img src="{{!$offer->images()->get()->isEmpty() ? $offer->images()->first()->getUrl(500,300) : asset('media/image-not-found.png')}}" class="rounded" alt="{{$offer->name}}" />
                            <div class="card_update_info d-flex h-100 w-100 flex-column justify-content-between">
                                <p class="text-danger text-center fw-bold fs-5 px-2 text_shadow text-truncate m-0">{{$offer->name}}</p>
                                <p class="text-white text-center fw-bold fs-5 px-2 bg-danger m-0 rounded-bottom">{{$offer->price - ($offer->price * $offer->offer /100)}} €</p>
                            </div>
                        </a>
                    </div>                    
                @endif
            @endforeach
        </div>
        {{-- <div class="swiper-pagination"></div> --}}
    </div>
</div>



</x-layout>
