<?php 
namespace App\Http\InterfaceService;

interface IUserService
{
    public function login($data);
    public function logout($user);
}