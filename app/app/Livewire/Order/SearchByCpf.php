<?php

namespace App\Livewire\Order;


use Illuminate\Contracts\View\View;
use Livewire\Component;

class SearchByCpf extends Component
{
    public function render(): View
    {
        return view('livewire.order.search-by-cpf');
    }


}
