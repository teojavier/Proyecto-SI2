<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Proveedor;

class ProveedorIndex extends Component
{
    public $search = '';


    use WithPagination;
    
    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $proveedores = Proveedor::where('nombre', 'LIKE' , '%' . $this->search . '%')->orWhere('telefono', 'LIKE' , '%' . $this->search . '%')->orWhere('direccion', 'LIKE' , '%' . $this->search . '%')->paginate(10);
        return view('livewire..admin.proveedor-index', compact('proveedores'));
    }
}
