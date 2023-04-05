<x-layout>

    <div class="container-fluid min-vh-100  mt-5 pt-3 ">
        <div class="row justify-content-center sticky-top">
            <div class="col-12 col-md-10 border-bottom bg_main">
                <h2 class=" display-3 text_accent mb-0 mt-5 pt-2">{{$category->name}} <small class="text-secondary fs-5">({{count($articles)}})</small></h2>
                <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="bi bi-bookmarks-fill text_accent p-0"></i></button>
                <h6 class="d-inline">{{__('ui.Change Category Here')}}</h6>
                
                <div class="offcanvas offcanvas-start bg_gray mt-5" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title text_accent fs-3" id="offcanvasScrollingLabel">{{__('ui.Categories')}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body p-0">
                        @foreach ($categories as $category)
                        <li class="list-unstyled">
                            @switch(App::getLocale())
                            @case('it')
                            <a href="{{route('category.show', compact('category'))}}" class="d-block text_dark text-decoration-none hover_none my-2 mx-0 px-2 py-1 hover_accentBG">{{$category->it}}</a> 
                      
                                @break
                            @case('zh')
                            <a href="{{route('category.show', compact('category'))}}" class="d-block text_dark text-decoration-none hover_none my-2 mx-0 px-2 py-1 hover_accentBG">{{$category->zh}}</a> 
                                @break
                            @case('fr')
                            <a href="{{route('category.show', compact('category'))}}" class="d-block text_dark text-decoration-none hover_none my-2 mx-0 px-2 py-1 hover_accentBG">{{$category->fr}}</a> 
                            @break
                            @default
                            <a href="{{route('category.show', compact('category'))}}" class="d-block text_dark text-decoration-none hover_none my-2 mx-0 px-2 py-1 hover_accentBG">{{$category->name}}</a> 
                         
                            @endswitch
                        </li>                         
                        @endforeach
                    </div>
                </div>
            </div>
            
        </div>

        @forelse ($articles as $article)
            <a href="{{route('article.show', compact('article'))}}" class="text-decoration-none text-dark">
                <div class="row justify-content-center my-2 py-2 mx-5 border-bottom">
                    <div class="col-5 col-md-3 p-0">
                        <div class="w-100 d-flex justify-content-center">
                            <img src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(500,300) : asset('media/image-not-found.png')}}" class="img_card_index rounded-top rounded-start" alt="{{$article->name}}">
                        </div>
                    </div>
                    <div class="col-7 col-md-5 px-2 rounded-end">
                        <p class="text_accent fw-bold m-0 text-truncate">{{$article->name}}</p>
                        <p class="text-truncate m-0">{{$article->description}}</p>
                        @if ($article->offer > 0)
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-decoration-line-through d-inline">{{$article->price}} €</p>
                                <p class="bg-danger d-inline text-white px-2">{{$article->offer}}% sale </p>
                            </div>
                            <p class="fw-bold fs-5 text-danger">{{$article->price - ($article->price * $article->offer /100)}} €</p>
                            @else
                            <p class="fw-bold text-end mt-3">{{$article->price}} €</p>
                        @endif
                    </div>
                </div>
            </a>
        @empty
        
        <h2 class="text-center mt-2">No article have been updated yet for this category</h2>
        <div class="container-fluid d-flex justify-content-center my-2">
            <a type="submit" class="btn btn_landing bg_secondary text_accent text-uppercase my-3" href="{{route('article.create')}}">Sell now</a>
        </div>
       
        @endforelse
        {{-- {{$articles->links()}} --}}
    </div>












    
</x-layout>