<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Language;
use App\Models\Product;
use App\Models\Translator;
use Livewire\Component;

class OrderProducts extends Component
{
    public $products = [];
    public $client_orders;
    public $languages_s;
    public $languages_nas;
    public $translators;
    public $request;

    public function mount()
    {
        $this->client_orders = Client::pluck('name_client', 'id')->prepend(trans('global.pleaseSelect'), '');
        $this->languages_s   = Language::pluck('language', 'id')->prepend(trans('global.pleaseSelect'), '');
        $this->languages_nas = Language::pluck('language', 'id')->prepend(trans('global.pleaseSelect'), '');
        $this->translators   = Translator::pluck('fio', 'id')->prepend(trans('global.pleaseSelect'), '');
    }

    public function addProduct()
    {
        $product                  = Product::create()->toArray();
        $product['translator_id'] = '';
        $this->products[]         = $product;
    }

    public function removeProduct($index)
    {
        $product = $this->products[$index];
        Product::findOrFail($product['id'])->delete();
        unset($this->products[$index]);
        array_values($this->products);
    }

    public function updateProduct($index)
    {
        $product = $this->products[$index];

        if (!$product['translator_id']) {
            $product['translator_id'] = null;
        }

        Product::where('id', $product['id'])->update($product);
    }

    public function render()
    {
        return view('livewire.orderProducts');
    }

    protected function rules()
    {
        return [
            'products.*.name_file'       => ['string', 'nullable'],
            'products.*.translator_id'   => ['nullable', 'integer', 'min:1', 'max:2147483647'],
            'products.*.translator_page' => ['nullable', 'integer', 'min:-2147483648', 'max:2147483647'],
        ];
    }
}
