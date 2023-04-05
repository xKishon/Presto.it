<x-layout>
    <div class="container-fluid mt-5 mb-4">
        <div class="row">
            <div class="col-12 mt-3 text-black">
                <h1 class="display-5 text_accent text-center">
                   {{$article_to_check ? 'Here is the article to review' : 'There are no items to review'}}
                </h1>
                <form action="{{route('undoLast')}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn fs-1 text_accent"><i class="bi bi-arrow-left-square-fill"></i></button>
                </form>
            </div>
        </div>
    </div>
    @if($article_to_check)
        <div class="container-fluid my-3 shadow p-3">
            <div class="row justify-content-center">
                <div class="col-10 col-md-4 p-0 shadow rounded">
                    <div id="revisorCarousel" class="carousel slide">
                        @if(count($article_to_check->images))
                            <div class="carousel-inner">
                                @foreach($article_to_check->images as $image)
                                    <div class="carousel-item @if($loop->first) active @endif">
                                        <img class="img-fluid carousel_img rounded p-0" src="{{$image->getUrl(500,300)}}" alt="">
                                        <div class="px-3">
                                            <h6 class="m-0 text_accent font_revisor_card mt-1">Tags</h6>
                                            @if ($image->labels)
                                                @foreach ($image->labels as $label)
                                                    <p class="d-inline font_revisor_card">{{$label}},</p>                           
                                                @endforeach          
                                            @endif
                                        </div>
                                        <div class="card-body px-3 pb-2">
                                            <h6 class="text_accent mb-0 mt-2 font_revisor_card">Revisione Immagini</h5>
                                            <p class="d-inline border-end font_revisor_card">Adult: <i class="{{$image->adult}} mx-2"></i></p>
                                            <p class="d-inline border-end font_revisor_card">Medical: <i class="{{$image->medical}} mx-2"></i></p>
                                            <p class="d-inline border-end font_revisor_card">Spoof: <i class="{{$image->spoof}} mx-2"></i></p>
                                            <p class="d-inline border-end font_revisor_card">Violence: <i class="{{$image->violence}} mx-2"></i></p>
                                            <p class="d-inline border-end font_revisor_card">Racy: <i class="{{$image->racy}} mx-2"></i></p>
                                        </div>
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
                        <button class="carousel-control-prev" type="button" data-bs-target="#revisorCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#revisorCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>



                <div class="col-10 col-md-4">
                    <div class="p-3">
                        <h5 class="card-title text_accent border-bottom pb-1">{{$article_to_check->name}}</h5>
                        <p class="card-footer m-1">
                            <small class="text-secondary fst-italic">{{__('ui.Category')}}:</small>       
                            {{$article_to_check->category->name}}
                        </p>
                        <p class="card-footer m-1">
                            <small class="text-secondary fst-italic">{{__('ui.Published by')}}:</small>       
                            {{$article_to_check->user->name}}
                        </p>
                        <p class="card-footer m-1">
                            <small class="text-secondary fst-italic">{{__('ui.Published at')}}:</small>  
                            {{$article_to_check->created_at->format('d/m/y')}}
                        </p>
                        <p class="card-text m-1">
                            <small class="text-secondary fst-italic">{{__('ui.Description')}}:</small>  
                            {{$article_to_check->description}} 
                        </p>
                        @if ($article_to_check->offer > 0)
                            <div class="d-flex justify-content-end">
                                <small class="text-secondary fst-italic font_revisor_card">{{__('ui.Price')}}: </small>
                                <p class="text-secondary m-0 text-decoration-line-through text-end ms-1 font_revisor_card"> {{$article_to_check->price}} €</p>
                            </div>
                            <p class="card-text text-end m-1">
                                <small class="text-secondary fst-italic">{{__('ui.Offer')}}:</small>  
                                <span class="text-danger">{{$article_to_check->offer}}%</span>
                            </p>           
                            <p class="text-danger text-end fw-bold fs-4">{{$article_to_check->price - ($article_to_check->price * $article_to_check->offer /100)}} €</p>
                            
                        @else
                            <p class="text-end">{{__('ui.Price')}}: <span class="fw-bold">{{$article_to_check->price}}</span> €</p>
                            
                        @endif
                    </div> 


                    <div class="d-flex justify-content-between mx-3 my-2">
                        <form action="{{route('revisor.accept_article',['article'=>$article_to_check])}}" method="POST" >
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success shadow ">Accept</button>
                        </form>
                        <form action="{{route('revisor.reject_article',['article'=>$article_to_check])}}" method="POST" >
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger shadow">Reject</button>
                        </form>
                    </div>
                </div>   
            </div>
        </div>
    @endif
</x-layout>