<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;
use App\Models\Marca;

class ProductoIndex extends Component
{
    public $search = '';


    use WithPagination;
    
    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $productos = Producto::where('nombre', 'LIKE' , '%' . $this->search . '%')->orWhere('descripcion', 'LIKE' , '%' . $this->search . '%')->orWhere('precio', 'LIKE' , '%' . $this->search . '%')->paginate(10);
        $marcas = Marca::all();
        return view('livewire.admin.producto-index', compact('productos','marcas'));
    }
}
