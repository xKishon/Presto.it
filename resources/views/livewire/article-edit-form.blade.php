<div>
    <form class="my-3 shadow py-3 px-3 glass_effect rounded" wire:submit.prevent="updateArticle" >
        @if(session('articleEdited'))
            <div class="alert alert-success">
                {{session('articleEdited')}}
            </div>
        @endif
        @csrf

        <h1 class="text-center display-3 mb-4 text_accent text_shadow">Edit Article</h1>
        <h4 class="text-center text-white mb-3 fw-light">{{__('ui.Start Selling')}}</h4>
        <div class="mb-3">
            <label for="name" class="form-label text_main">{{__('ui.Name')}}</label>
            <input type="text" wire:model.lazy="name" class="form-control @error ('name') is-invalid @enderror" id="name">
            @error('name') 
            <span class="fst-italic text-danger small">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="EditForm" class="form-label text_main">{{__('ui.Category')}}</label>
            
            <select wire:model="category_id" id="EditForm" class="form-control @error ('EditForm') is-invalid @enderror">
                <option value="{{$category_id}}">{{__('ui.Select Category')}}</option>
                @foreach ($categories as $category)
                        @switch(App::getLocale())
                            @case('it')
                                <option value="{{$category->id}}">{{$category->it}}</option>
                                @break
                            @case('fr')
                                <option value="{{$category->id}}">{{$category->fr}}</option>
                                @break
                            @case('zh')
                                <option value="{{$category->id}}">{{$category->zh}}</option>
                                @break
                        @endswitch
                    @endforeach
                
            </select>
            {{-- @error('category') 
            <span class="fst-italic text-danger small">{{$message}}</span>
            @enderror --}}
        </div>
        
        <div class="d-flex justify-content-between">
            <div class="mb-3">
                <label for="price" class="form-label text_main">{{__('ui.Price')}}</label>
                <input type="number" wire:model.lazy="price" class="form-control @error ('price') is-invalid @enderror" id="price">
                @error('price') 
                <span class="fst-italic text-danger small">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="offer" class="form-label text_main">{{__('ui.Offer')}}</label>
                <input type="number" wire:model.lazy="offer" class="form-control @error ('offer') is-invalid @enderror" id="offer">
                @error('offer') 
                <span class="fst-italic text-danger small">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label text_main @error ('description') is-invalid @enderror">{{__('ui.Description')}}</label>
           <textarea wire:model.lazy="description" id="description" cols="30" rows="7" class="form-control"></textarea>
           @error('description') 
            <span class="fst-italic text-danger small">{{$message}}</span>
            @enderror
        </div>

      


        {{-- <div class="mb-3">
              <input type="file" wire:model="temporary_images" name="images" multiple class="form-control @error ('temporary_images.*') is-invalid @enderror" id="temporary_images">
            @error('temporary_images.*') 
            <span class="fst-italic text-danger small">{{$message}}</span>
            @enderror
        </div>
        @if(!empty($images))
            <div class="row">
                <div class="col-12">
                    <p>{{__('ui.Photo preview')}}:</p>
                    <div class="row border border-4 border-info rounded shadow py-4">
                        @foreach($images as $key=> $image)
                            <div class="col my-3">
                                <div class="img_preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}});"></div>
                                <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">{{__('ui.Delete')}}</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
       @endif --}}

        
        <div class="d-flex flex-column justify-content-center align-items-center">
            <button type="submit" class="btn mt-3 btn_landing fs-5">{{__('ui.Upload your article')}} <i class="bi bi-upload ms-1"></i></button>
        </div>
    </form>
</div>
