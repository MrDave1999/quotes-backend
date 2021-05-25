<?php
namespace App\Http\Services;
use App\Http\InterfaceRepository\IUserRepository;
use App\Http\InterfaceService\IUserService;
use App\Rules\UserRules;
use App\Utils\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserService implements IUserService
{
    protected $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login($data)
    {
        $validator = Validator::make($data, UserRules::$loginRules);
        if($validator->fails())
            return Response::error($validator->errors()->all());

        $user = $this->userRepository->login($data);
        if(is_null($user))
            return Response::error('El usuario '. $data['username']. ' no existe en la base de datos!');
        
        if($user['password'] !== $data['password'])
            return Response::error('Has ingresado una contraseña incorrecta!');

        $token = Str::random(150);
        $this->userRepository->updateToken($user, $token);
        return Response::success('Has iniciado sesión de forma exitosa!', ['token' => $token]);
    }

    public function logout($user)
    {
        $this->userRepository->updateToken($user, null);
        return Response::success('Has cerrado la sesión de forma exitosa. Adios!');
    }
}