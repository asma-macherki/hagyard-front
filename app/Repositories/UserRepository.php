<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository{

    private $userRepository;

    public function __construct(User $user)
    {
        $this->userRepository=$user;
    }

    public function all(){
        return User::all();
    }

    public function find($id){
        $user=User::findOrFail($id);
        return $user;
    }

    public function create($data){

        $user=new User($data);
        $user->save();

        return $user;
    }

    public function update($id,$data){
        $user=User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id){
        $user=User::findOrFail($id);
        $user->delete();
    }
}
