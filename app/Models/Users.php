<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Users
 * @package App\Models
 * @property string email
 * @property string password
 * @property boolean isActive
 * @property  string activationCode
 */
class Users extends Model
{
    public static $validation = array(
        // Поле email является обязательным, также это должен быть допустимый адрес
        // электронной почты и быть уникальным в таблице users
        'email' => 'required|email|unique:users',

        // Поле password является обязательным, должно быть длиной не меньше 6 символов, а
        // также должно быть повторено (подтверждено) в поле password_confirmation
        'password' => 'required|confirmed|min:6',
    );
    public function register() {
        $this->password = Hash::make($this->password);
        $this->activationCode = $this->generateCode();
        $this->isActive = false;
        $this->save();

        Log::info("User [{$this->email}] registered. Activation code: {$this->activationCode}");

        $this->sendActivationMail();

        return $this->id;
    }
    protected function generateCode() {
        return Str::random(); // По умолчанию длина случайной строки 16 символов
    }
    public function sendActivationMail() {
        $activationUrl = action(
            'UsersController@getActivate',
            array(
                'userId' => $this->id,
                'activationCode' => $this->activationCode,
            )
        );

        $that = $this;
        Mail::send('emails/activation',
            array('activationUrl' => $activationUrl),
            function ($message) use($that) {
                $message->to($that->email)->subject('Спасибо за регистрацию!');
            }
        );
    }
    public function activate($activationCode) {
        // Если пользователь уже активирован, не будем делать никаких
        // проверок и вернем false
        if ($this->isActive) {
            return false;
        }

        // Если коды не совпадают, то также ввернем false
        if ($activationCode != $this->activationCode) {
            return false;
        }

        // Обнулим код, изменим флаг isActive и сохраним
        $this->activationCode = '';
        $this->isActive = true;
        $this->save();

        // И запишем информацию в лог, просто, чтобы была :)
        Log::info("User [{$this->email}] successfully activated");

        return true;
    }
}
