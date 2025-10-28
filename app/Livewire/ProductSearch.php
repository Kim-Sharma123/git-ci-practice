<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductSearch extends Component
{
    
    public $search = '';
    public $filteredProducts = [];

    public function mount()
    {
        $this->filteredProducts = Product::all()->toArray();
    }

    public function updatedSearch()
    {
        $this->performSearch();
    }

    public function performSearch()
    {
        if (empty($this->search)) {
            $this->filteredProducts = Product::all()->toArray();
        } else {
            $this->filteredProducts = Product::where('name', 'like', '%' . $this->search . '%')
            ->get()
            ->toArray();
        }
    }

    public function render()
    {
        $this->performSearch();
        return view('livewire.product-search');
    }
}
