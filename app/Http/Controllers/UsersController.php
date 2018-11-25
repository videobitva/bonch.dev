<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getRegister()
    {
        return View::make('users/register');
    }

    public function postRegister()
    {
        // Проверка входных данных
        $rules = Users::$validation;
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails()) {
            // В случае провала, редиректим обратно с ошибками и самими введенными данными
            return Redirect::to('users/register')->withErrors($validation)->withInput();
        }

        // Сама регистрация с уже проверенными данными
        $user = new Users();
        $user->fill(Input::all());
        $id = $user->register();

        // Вывод информационного сообщения об успешности регистрации
        return $this->getMessage("Регистрация почти завершена. Вам необходимо подтвердить e-mail, указанный при регистрации, перейдя по ссылке в письме.");
    }

    public function getActivate($userId, $activationCode)
    {
        // Получаем указанного пользователя
        $user = Users::find($userId);
        if (!$user) {
            return $this->getMessage("Неверная ссылка на активацию аккаунта.");
        }

        // Пытаемся его активировать с указанным кодом
        if ($user->activate($activationCode)) {
            // В случае успеха авторизовываем его
            Auth::login($user);
            // И выводим сообщение об успехе
            return $this->getMessage("Аккаунт активирован", "/");
        }

        // В противном случае сообщаем об ошибке
        return $this->getMessage("Неверная ссылка на активацию аккаунта, либо учетная запись уже активирована.");
    }

    public function getLogin()
    {
        return View::make('users/login');
    }

    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users)
    {
        //
    }
}
