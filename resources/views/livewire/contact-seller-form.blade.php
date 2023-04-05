<div>
    <div>
        <form class="my-3 shadow py-3 px-3 glass_effect rounded" method="post" action="{{route('article.contactSellerSubmit')}}">
            @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif
            @csrf
    
            <h1 class="text-center display-3 mb-4 text_accent text_shadow">Contact Seller</h1>
               <div class="mb-3">
                <label for="name" class="form-label text_main" >Article</label>
                <input type="text" readonly wire:model.lazy="name" name="articleName" class="form-control  @error ('name') is-invalid @enderror" id="name">
                @error('name') 
                <span class="fst-italic text-danger small">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="sellerEmail" class="form-label text_main">Seller Email </label>
                <input type="email" readonly wire:model.lazy="sellerEmail" name="sellerEmail" value="text@example.it" class="form-control  @error ('sellerEmail') is-invalid @enderror" id="sellerEmail">
                @error('sellerEmail') 
                <span class="fst-italic text-danger small">{{$message}}</span>
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label for="email" class="form-label text_main">  Your Email </label>
                
                <input type="email" readonly wire:model.lazy="email" name="email" class="form-control  @error ('email') is-invalid @enderror" id="email" value="{{Auth::user()->email}}">
            
                @error('email') 
                
                <span class="fst-italic text-danger small">{{$message}}</span>
                @enderror
            </div> --}}
    
           
           
            <div class="mb-3">
                <label for="text" class="form-label text_main @error ('description') is-invalid @enderror" >Ask your question</label>
               <textarea wire:model.lazy="description" name="description" id="description" cols="30" rows="7" class="form-control" placeholder="Ask your question"></textarea>
               @error('description') 
                <span class="fst-italic text-danger small">{{$message}}</span>
                @enderror
            </div>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <button type="submit" class="btn mt-3 btn_landing fs-5">Send your question <i class="bi bi-upload ms-1"></i></button>
            </div>
        </form>
    </div>
    
</div>
    
          
    
    
           
            
            
