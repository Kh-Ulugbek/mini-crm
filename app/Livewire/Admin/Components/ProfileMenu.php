<?php

namespace App\Livewire\Admin\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileMenu extends Component
{
    public function logout()
    {
        Auth::logout();
        $this->redirect('/');
    }

    public function render()
    {
        return view('livewire..admin.components.profile-menu');
    }
}
