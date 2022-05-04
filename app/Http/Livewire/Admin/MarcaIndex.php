<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Marca;


class MarcaIndex extends Component
{
    public $search = '';

    use WithPagination;
    
    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $marcas = Marca::where('nombre', 'LIKE' , '%' . $this->search . '%')->paginate(10);
        return view('livewire..admin.marca-index', compact('marcas'));
    }
}
