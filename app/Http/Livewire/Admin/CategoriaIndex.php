<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Categoria;

class CategoriaIndex extends Component
{
    public $search = '';

    use WithPagination;
    
    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $categorias = Categoria::where('nombre', 'LIKE' , '%' . $this->search . '%')->paginate(10);
        return view('livewire..admin.categoria-index', compact('categorias'));
    }
}
