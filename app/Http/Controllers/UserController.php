<?php 
namespace App\Http\Controllers;

use App\Http\InterfaceService\IUserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(Request $request)
    {
        return $this->userService->login($request->all());
    }

    public function logout(Request $request)
    {
        return $this->userService->logout($request->user());
    }
}