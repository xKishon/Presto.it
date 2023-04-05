<div>
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('ui.Name')}}</th>
            <th scope="col" class="">{{__('ui.Category')}}</th>
            <th scope="col">{{__('ui.Status')}}</th>
            <th scope="col">{{__('ui.Actions')}}</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach(Auth::user()->articles as $article)
                <tr>
                    <th scope="row">{{$article->id}}</th>
                    <td><a class="text-decoration-none text-dark" href="{{route('article.show', compact('article'))}}">{{$article->name}}</a></td>

                    <td class="">{{$article->category->name}}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            @switch(true)
                                @case($article->is_accepted ===1)
                                    <i class="bi bi-check2 text-success text-center fs-4"></i>
                                    @break
                                @case($article->is_accepted === null)
                                    <i class="bi bi-hourglass-top text-warning fs-4"></i>                  
                                    @break
                                @case($article->is_accepted === 0) 
                                    <i class="bi bi-x text-danger fs-4"></i>                                    
                                    @break 
                            @endswitch
                        </div>
                    </td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="{{route('article.edit', compact('article'))}}" class="text-decoration-none"><i class="bi bi-pencil-square p-0 mx-2 text-primary fs-5"></i></a>

                            <button wire:click="destroy({{$article}})" class="btn p-0">
                                <i class="bi bi-trash2-fill p-0 text-danger fs-5"></i>
                            </button>
                            
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
