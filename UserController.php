<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function showUserForm(Request $req)
    {
        // return $req;
        $req->validate([
            'name'   => 'required|string|min:3|max:50',
            'email'  => 'required|email',
            'mobile' => 'required|digits_between:10,15',
            'skill'  => 'required|array|min:1',
            'gender' => 'required|string|in:male,female,other',
            'age'    => 'required|integer|between:1,99',
            'city'   => 'required|string|min:2|max:50',
        ], [
            'name.required'   => 'Please enter your name',
            'name.min'        => 'Name must be at least 3 characters',
            'email.required'  => 'Please enter your email',
            'email.email'     => 'Please enter a valid email address',
            'mobile.required' => 'Please enter your mobile number',
            'mobile.digits_between' => 'Mobile number must be between 10 to 15 digits',
            'skill.required'  => 'Please select at least one skill',
            'gender.required' => 'Please select your gender',
            'gender.in'       => 'Invalid gender selected',
            'age.required'    => 'Please enter your age',
            'age.between'     => 'Age must be between 1 and 99',
            'city.required'   => 'Please select a city',
            'city.min'        => 'City name must be at least 2 characters',
            'city.max'        => 'City name may not exceed 50 characters',
        ]);

        return $req;
    }
}
