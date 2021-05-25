<?php 
namespace App\Http\InterfaceRepository;

interface IUserRepository
{
    public function login($data);
    public function updateToken($user, $token);
}
