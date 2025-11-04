<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $show_error=false;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return $this->redirect('/admin/widget-list');
        } else {
            $this->show_error = true;
        }
    }

    public function render()
    {
        return view('livewire..auth.login');
    }
}
