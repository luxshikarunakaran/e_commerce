<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;

class CategorySubCategory extends Component
{
    public $categories=[];

    public $selectedCategory;
    public $subcategories=[];

    public function mount(){
        $this->categories=Category::all();
    }

    public function updatedSelectedCategory($category_id){
        $this->subcategories = SubCategory::where('category_id',$category_id)->get();
    }
    public function render()
    {
        return view('livewire.category-sub-category');
    }
}
