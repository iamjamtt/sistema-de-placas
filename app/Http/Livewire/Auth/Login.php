<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }

    public function ingresar()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $this->email)->first();

        if ($user) {
            if (Hash::check($this->password, $user->password)) {
                auth()->login($user);
                return redirect()->route('admin.index');
            } else {
                session()->flash('message', 'Credenciales incorrectas');
            }
        } else {
            session()->flash('message', 'Credenciales incorrectas');
        }
    }



    public function render()
    {
        return view('livewire.auth.login');
    }
}
