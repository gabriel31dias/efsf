<?php

namespace Tests\Unit;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;
use App\Http\Livewire\Users\UserForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use GuzzleHttp\Client;
use App\Http\Repositories\UserRepository;



test('test validation name of create Or Update User method', function () {

    $user = [
        'cpf' => "3243324342",
        'name' => "Teste User",
        'zip_code' => "16903065",
        'address' => "Rua portugal",
        'type_street' => 1,
        'number' => "6626",
        'complement' => "complement",
        'district' => "Jardim Europa",
        'uf' => "Sp",
        'status' => true,
        'cell' => "18996373939",
        'email' => "gabrieldias@keemail.me",
        'user_name' => "testeUser",
        'password' => Hash::make("003001"),
        'city' => "Andradina",
        'profile_id' => 1,
        'services_points' => ""
    ];



    $result = (new UserRepository())->createOrUpdateUser(0, $user);

    dd($result);

 });
