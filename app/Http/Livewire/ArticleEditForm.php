<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class ArticleEditForm extends Component
{

    use WithFileUploads;

    public $name;
    public $description;
    public $price;
    public $offer;
    public $category;
    public $category_id;
    public $images = [];
    public $article;
    public $old_images = [];
    public $temporary_images;

    
    protected $rules=[
        'name'=>'required|min:5|max:50',
        'description'=>'required|min:5|max:500',
        'price'=>'required|max:5',
        'offer'=>'max:100|max:2',
        'category_id' => 'required',
           
    ];


    
    public function updateArticle(){
        $this->validate();
        $this->article->update([
            'name' => $this->name,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'price' => $this->price,
            'offer' => $this->offer
        ]);
    
        session()->flash('articleEdited', 'Your article has been edited correctly!');
        $this->reset();

    }

   
    // public function updatedTemporaryImages(){
    //     if($this->validate([
    //         'temporary_images.*'=>'image|max:1024'
    //     ])){
    //         foreach($this->temporary_images as $image){
    //             $this->images[]=$image;
    //         }
    //     }
    // }

    public function mount(){
        $this->name = $this->article->name;
        $this->description = $this->article->description;
        $this->price = $this->article->price;
        $this->offer = $this->article->offer;
        // $this->category = Category::where('id', '=', $this->category_id);
        $this->category_id = $this->article->category_id;

    }
    
    public function render()
    {
        return view('livewire.article-edit-form');
    }


}


