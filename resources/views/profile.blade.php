<x-layout>
    
    <div class="container-fluid wp_profile mt-5 pt-3">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 mt-4 mb-5 pb-5">
                <div class="mt-4">
                    {{-- <span class="image-bg mr-3">
                        <img class="user-img fit-image" src="http://picsum.photos/100">
                    </span> --}}
                    <span class="">
                        <h2 class="newUpdates_arrow"> {{Auth::user()->name}}</h2>
                        <p class="text-secondary m-0">{{__('ui.Articles created')}} <span class="fw-bold text-success">{{Auth::user()->articles->where('is_accepted', 1)->count()}}</span></p>   
                        <p class="text-secondary m-0">{{__('ui.Articles rejected')}} <span class="fw-bold text-danger">{{Auth::user()->articles->where('is_accepted', 0)->whereNotNull('is_accepted')->count()}}</span></p>
                        <p class="text-secondary  m-0">{{__('ui.Articles to review')}} <span class="fw-bold text-warning">{{Auth::user()->articles->whereNull('is_accepted')->count()}}</span></p>
                    </span>
                           
                    <div class="d-flex my-2">
                        <form action="{{route('user.destroy')}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">{{__('ui.Delete Profile')}}</button>
                        </form>
                    </div>
                    


                    
                    

                    @livewire('article-control-panel')

                    
                </div>                
            </div>
        </div>
    </div>
            
           

    
     

   

</x-layout>