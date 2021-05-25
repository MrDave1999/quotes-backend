<?php 
namespace App\Rules;

class UserRules 
{
    public static $loginRules = [
        'username' => 'required|max:24',
        'password' => 'required|max:64'
    ];
}