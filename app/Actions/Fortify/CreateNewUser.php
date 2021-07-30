<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Auth; //I have added

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $create_user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        
        $user_id = $create_user->id;

        RoleUser::create([
            'user_id' => $user_id,
            'role_id' => $input['role_id'],
        ]);

        return $create_user;

        
        // $user = Auth::user();
        // $id = $user->id;

        // $role_user = RoleUser::create([
        //     'user_id' => $id,
        //     'role_id' => $input['role_id'],
        // ]);

        // return $create_user;
        // return [$create_user, $role_user];


        // $user->roles()->attach($data['role_id']);

    }

}
