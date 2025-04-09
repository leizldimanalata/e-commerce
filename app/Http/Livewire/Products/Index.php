<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $name;
    public $price;
    public $category;

    protected $rules = [
        'name' => 'required',
        'price' => 'required|numeric',
        'category' => 'required',
    ];

    public function list()
    {
        return Product::get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'category' => $item->category,
                    'price' => $item->price,
                ];
            });
    }

    public function store()
    {
        $this->validate();

        try {
            Product::create([
                'name' =>  $this->name,
                'price' =>  $this->price,
                'category' =>  $this->category,
            ]);

            $this->dispatchBrowserEvent('success', [
                'message' => 'The product has been successfully added',
            ]);

            $this->reset();
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('error-message', ['message' => $th->getMessage()]);
        }
    }

    public function render()
    {

        return view('livewire.products.index');
    }
}
