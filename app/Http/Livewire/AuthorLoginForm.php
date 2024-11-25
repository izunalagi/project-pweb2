<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthorLoginForm extends Component
{
    public $email,$password;
    public function LoginHandler(){
        $this->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:5'
        ],[
            'email.required'=>'Masukkan Email Anda',
            'email.email'=>'Email Invalid',
            'email.exists'=>'Email ini tidak terdaftar',
            'password.required'=>'password dibutuhkan'
        ]);

        $cred = array('email'=>$this->email,'password'=>$this->password);

        if (Auth::guard('web')->attempt($cred)){
            $CheckUser = User::where('email',$this->email)->first();
            if($CheckUser->blocked == 1){
                Auth::guard('web')->logout();
                return redirect()->route('author.login');
            }else{
                return redirect()->route('home.index');
            }
           
        }else{
            session()->flash('fail,salah dah');
        }
            
        
    }
    
    public function render()
    {
        return view('livewire.author-login-form');
    }
}
