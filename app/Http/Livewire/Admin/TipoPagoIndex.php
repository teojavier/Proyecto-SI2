<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tipo_pago;
use Livewire\Component;
use Livewire\WithPagination;

class TipoPagoIndex extends Component
{
    public $search = '';


    use WithPagination;
    
    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {

        $tipos = Tipo_pago::where('nombre', 'LIKE' , '%' . $this->search . '%')->orWhere('descripcion', 'LIKE' , '%' . $this->search . '%')->paginate(10);
        return view('livewire..admin.tipo-pago-index', compact('tipos'));
    }
}
