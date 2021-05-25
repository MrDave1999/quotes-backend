<?php 
namespace App\Http\Repositories;

use App\Http\InterfaceRepository\IUserRepository;
use App\Models\User;

class UserRepository extends BaseRepository implements IUserRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function login($data)
    {
        return $this->model->where('name', $data['username'])->first();
    }

    public function updateToken($user, $token)
    {
        $user->api_token = $token;
        $user->save();
    }
}