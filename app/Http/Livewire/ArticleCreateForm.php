<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Spatie\Image\Manipulations;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ArticleRequest;

class ArticleCreateForm extends Component

{
    use WithFileUploads;

    public $name, $description, $price, $offer, $category, $images=[], $temporary_images, $image, $article;
    protected $rules=[
        'name'=>'required|min:5|max:50',
        'description'=>'required|min:5|max:500',
        'price'=>'required|max:5',
        'offer'=>'max:100|max:2',
        'category' => 'required',
        'images.*'=>'image|max:1024',
        'temporary_images.*'=>'image|max:1024'
    
    ];
    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*'=>'image|max:1024'
        ])){
            foreach($this->temporary_images as $image){
                $this->images[]=$image;
            }
        }
    }
    public function removeImage($key){
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }
   
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store(){
        $this->validate();
        $user = Auth::user();
        $category = Category::find($this->category);
        $this->article = $user->articles()->create([
            'name'=> $this->name,
            'description'=> $this->description,
            'price'=> $this->price,
            'offer'=>$this->offer,
            'category_id'=>$category->id
        ]);
        // $this->article->category()->associate($category);

        // $category = Category::find($this->category);
        // $this->article = $category->articles()->create([
        //     'name'=> $this->name,
        //     'description'=> $this->description,
        //     'price'=> $this->price,
        //     'offer'=>$this->offer,
        // ]);
        // Auth::user()->articles()->save($this->article);
        

        if(count($this->images)){
            foreach($this->images as $image){
                /* $this->article->images()->create(['path'=>$image->store('images','public')]); */
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(['path' =>$image->store($newFileName, 'public')]);
                RemoveFaces::withChain([
                    new ResizeImage($newImage->path,500,300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                ])->dispatch($newImage->id);
               
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        session()->flash('articleCreated', 'Your article has been added correctly!');
         $this->reset();
    }
    

    public function render()
    {
        return view('livewire.article-create-form');
    }
}
