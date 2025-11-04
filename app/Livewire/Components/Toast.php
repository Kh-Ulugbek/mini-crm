<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Toast extends Component
{
    public $toast_message = null;
    public $toast = false;
    public $toast_type = 'success';
    protected $listeners = [
        'showToast'=>'showToast'
    ];

    public function render()
    {
        return view('livewire..components.toast');
    }

    public function showToast($toast_message, $toast_type = 'success')
    {
        $this->toast = true;
        $this->toast_message = $toast_message;
        $this->toast_type = $toast_type;
    }

    public function closeToast()
    {
        $this->toast = false;
        $this->toast_message = null;
        $this->toast_type = 'success';
    }
}
