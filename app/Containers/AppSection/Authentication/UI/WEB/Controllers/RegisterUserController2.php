<?php

namespace App\Containers\AppSection\Authentication\UI\WEB\Controllers;

use App\Containers\AppSection\Authentication\Actions\RegisterUserAction2;
use App\Containers\AppSection\Authentication\UI\WEB\Requests\RegisterUserRequest;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterUserController2 extends WebController
{
    public function __invoke(Request $request, RegisterUserAction2 $action): RedirectResponse
    {
        // Получаем валидированные данные
        $data = $request->all();
        
        // Передаем массив данных в Action
        $user = $action->run($data);

        Auth::guard('web')->login($user);
        
        // Редиректим на страницу логина после регистрации
        return redirect()->route('home-page')->with('status', 'Registration successful!');
    }
}
