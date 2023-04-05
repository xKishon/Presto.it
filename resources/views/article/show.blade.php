<x-layout>


    <div class="container p-0 mt-4 mb-2 ">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mt-5 ">
                <p class="display-5 text-center mt-3 pb-4 text_accent linea_verde">{{$article->name}}</p>
            </div>
        </div>
        <div class="row justify-content-center">
           

            <div class="col-10 col-md-4 p-0 shadow rounded">
                {{-- carousel --}}
                <div id="showCarousel" class="carousel slide">
                    @if(count($article->images))
                            <div class="carousel-inner">
                                @foreach($article->images as $image)
                                    <div class="carousel-item @if($loop->first) active @endif">
                                        <img class="img-fluid carousel_img rounded p-0" src="{{$image->getUrl(500,300)}}" alt="">
                                        
                                    </div>
                                @endforeach         
                            </div>
                        @else
                            <div class="carousel-inner">     
                                <div class="carousel-item active">
                                    <img src="{{url('media/image-not-found.png')}}" class="d-block w-100 rounded-top" alt="...">
                                </div>
                            </div>
                        @endif

                    <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#showCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>

            <div class="col-10 col-md-4 px-3">
                <div class="">
                    <p class="text-end"><a href="{{route('article.contactSeller', compact('article'))}}"><i class="bi bi-envelope-at-fill text_accent fs-3"></i></a></p>
                    <p class="card-footer m-1">
                        <small class="text-secondary fst-italic">{{__('ui.Category')}}:</small>       
                        {{$article->category->name}}
                    </p>
                    <p class="card-footer m-1">
                        <small class="text-secondary fst-italic">{{__('ui.Published by')}}:</small>       
                        {{$article->user->name}}
                    </p>
                    <p class="card-footer m-1">
                        <small class="text-secondary fst-italic">{{__('ui.Published at')}}:</small>  
                        {{$article->created_at->format('d/m/y')}}
                    </p>
                    <p class="card-text m-1 pb-2 linea_verde">
                        <small class="text-secondary fst-italic">{{__('ui.Description')}}:</small>  
                        {{$article->description}} 
                    </p>
            
                    @if ($article->offer > 0)
                    <p class="card-text text-end m-1">
                        <small class="text-secondary fst-italic">{{__('ui.Offer')}}:</small>  
                        <span class="text-danger">{{$article->offer}}%</span>
                    </p>           
                    <div class="d-flex justify-content-end">
                        <small class="text-secondary fst-italic font_revisor_card">{{__('ui.Price')}}: </small>
                        <p class="text-secondary m-0 text-decoration-line-through text-end ms-1 font_revisor_card"> {{$article->price}} €</p>
                    </div>
                            <p class="text-danger text-end fw-bold fs-4">{{$article->price - ($article->price * $article->offer /100)}} €</p>
                            
                        @else
                            <p class="text-end">{{__('ui.Price')}}: <span class="fw-bold">{{$article->price}}</span> €</p>
                            
                        @endif
                </div>


            </div>
            <div class="col-10 col-md-8 p-0">
                <a href="{{route('article.index')}}" class="text-dark">
                    <button type="button" class="btn fs-1 text_accent p-0"><i class="bi bi-arrow-left-square-fill"></i></button>
                </a>
                
            </div>
        </div>
    </div>










    
</x-layout>