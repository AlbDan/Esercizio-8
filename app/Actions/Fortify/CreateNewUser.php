<?php

namespace App\Actions\Fortify;

use App\Models\Role;
use App\Models\User;
use App\Models\Detail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {

        $messages = [
            'email.required' => 'The email is required.',           
            'name.required' => 'The username is required.',
            'name.unique' => 'The username has already been taken.',
            'realname.required' => 'The name is required.',
            'realname.alpha' => 'The name format is invalid.',
            'surname.required' => 'The surname is required.',
            'surname.alpha' => 'The surname format is invalid.',
            'city.required' => 'The city is required.',
            'password.required' => 'The password is required.',
            'password.min' => 'The password must contain at least 8 characters.',
            'password.regex' => 'The password format is invalid.',
            'password.confirmed' => 'The passwords do not match.'
        ];

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255', Rule::unique(User::class)],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            //'password' => $this->passwordRules(),
            'password' => [
                'required',
                'string',
                'confirmed',
                'min:8',             // must be at least 8 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'realname' => 'required|alpha',
            'surname' => 'required|alpha',
            'city' => 'required'
        ], $messages)->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $role = Role::find(2);
        $user->roles()->attach($role);

        Detail::create([
            'realname' => $input['realname'],
            'surname' => $input['surname'],
            'city' => $input['city'],
            'user_id'=> $user->id
        ]);

        return $user;
    }
}
