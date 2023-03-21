<?php

namespace App\Http\Livewire\Nabvar;

use Livewire\Component;

class Nabvar extends Component
{
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.nabvar.nabvar');
    }
}
