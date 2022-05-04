<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\detalle_productos;
use App\Models\Producto;
use App\Models\Proveedor;

class DetalleProductoIndex extends Component
{
    public $search = '';

    use WithPagination;
    
    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $proveedor = Proveedor::all();
        $producto = Producto::all();
        $detalles = detalle_productos::where('id', 'LIKE' , '%' . $this->search . '%')->paginate(10);
        return view('livewire..admin.detalle-producto-index', compact('detalles', 'proveedor', 'producto'));
    }
}
