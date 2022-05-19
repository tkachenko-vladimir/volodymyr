<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Language;
use App\Models\Product;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Translator;
use Livewire\Component;

class OrderProducts extends Component
{
    public $products = [];
    public $client_orders, $languages_s, $languages_nas, $translators, $orders, $order, $request;
    public $client_order_id, $status, $typepay, $clients_many, $clients_pages, $languages_s_id, $languages_na_id, $start_time, $end_time;

    public function mount()
    {
        
        $this->client_orders = Client::pluck('name_client', 'id')->prepend(trans('global.pleaseSelect'), '');
        $this->languages_s   = Language::pluck('language', 'id')->prepend(trans('global.pleaseSelect'), '');
        $this->languages_nas = Language::pluck('language', 'id')->prepend(trans('global.pleaseSelect'), '');
        $this->translators   = Translator::pluck('fio', 'id')->prepend(trans('global.pleaseSelect'), '');
        //$this->order->load('client_order', 'languages_s', 'languages_na', 'products');
        $product                  = Product::create()->toArray();
        $product['translator_id'] = '';
        $this->products[]         = $product;
       
    }

    public function addProduct()
    {
        $product                  = Product::create()->toArray();
        $product['translator_id'] = '';
        $this->products[]         = $product;
       // return view('livewire.orderProducts');
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
        
        

      //  $product = $this->products[$index];

      //  if (!$product['translator_id']) {
      //      $product['translator_id'] = null;
     //   }
      //  dd($this);
      //  Product::where('id', $product['id'])->update($product);
    }
    public function storeProduct()
    {
       
       // $order = $this->client_order_id;
      //  dd($order);
      $order = Order::create([
        'status' => $this->status,
        'typepay' => $this->typepay,
        'client_order_id' => $this->client_order_id,
        'clients_many' => $this->clients_many,
        'clients_pages' => $this->clients_pages,
        'start_time' => $this->start_time,
        'end_time' => $this->end_time,
        'languages_s_id' => $this->languages_s_id,
        'languages_na_id' => $this->languages_na_id,
        ]);
        
        foreach ($this->products as $product) {
            if (!$product['translator_id']) {
                      $product['translator_id'] = null;
                  }
            Product::where('id', $product['id'])->update($product);
            $order->products()->attach($product['id']);
        }

        return redirect()->route('admin.orders.index');
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
            'products.*.translator_page' => ['nullable', 'integer', 'min:1', 'max:2147483647'],
        ];
    }
}
