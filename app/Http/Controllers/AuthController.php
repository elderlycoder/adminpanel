<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function registerForm(){
        return view('pages.register');
    }

    public function register(Request $req){//получаем данные запроса
        //создаём пользователя  1) делаем валидацию
        $this->validate($req, [
            'name'=>'required',
            'email'=>'required|email|unique:users', //обяз, соответствовать требованиям email, должен быть уникальным во всей таблице users
            'password'=>'required'
        ]); 
//создаём экземпляр класса User, используем метод add() и передаем туда все данные запроса $req
        $user = User::add($req->all());
// у созданного пользователя вызываем метод generatePassword передав туда из запроса, значение поля 'password'
        $user->generatePassword($req->get('password'));

        return redirect('/login');
    }

    public function loginForm(){
        return view('pages.login');
    }

    public function login(Request $req){
        $this->validate($req, ['email'=>'required|email', 'password'=>'required']);
        //$res = Auth::attempt(['email'=>$req->get('email'), 'password'=>$req->get('password')]);
        //dd($res);
        if(Auth::attempt(['email'=>$req->get('email'), 'password'=>$req->get('password')])){
            return redirect('/');
        }
        return redirect()->back()->with('status','Неверный логин или пароль');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

}
