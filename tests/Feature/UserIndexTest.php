<?php



namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Http\Livewire\Users\UserForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;

test('if the user is not authenticated redirects to the login screen', function () {
    $this->get('/users/create')->assertRedirect('/login');
});

test('if authenticated must have the component', function () {
    $user = $user = User::factory()->make();
    Auth::login($user);
    $this->get('/users/create')->assertSeeLivewire('users.user-form');
});

test('must validate the fields', function () {
   $res = Livewire::test(UserForm::class)
    ->set('fields', [
        "nome" => "",
        "cpf" => "",
        "cep" => "",
        "endereco" => "",
        "numero" => "",
        "complemento" => "",
        "bairro" => "",
        "uf" => "",
        "celular" => "",
        "email" => "",
        "email_confirm" => "",
        "login" => "",
        "senha" => "",
        "cidade" => "",
        "type_street" => "",
        "profile_id" => ""
    ])
    ->call('createUser')->assertSee('é obrigatório');
});

test('if it is correct it should not show validation errors', function () {
    $res = Livewire::test(UserForm::class)
     ->set('fields', [
         "nome" => "Teste User",
         "cpf" => "480.015.598.40",
         "cep" => "16903065",
         "endereco" => "Teste rua",
         "numero" => "4343",
         "complemento" => "complemento",
         "bairro" => "Bairro",
         "uf" => "Sp",
         "celular" => "189966396",
         "email" => "dwd@daadw.com",
         "email_confirm" => "dwd@daadw.com",
         "login" => "teste",
         "senha" => "teste",
         "cidade" => "cidade",
         "type_street" => "1",
         "profile_id" => "1"
     ])
     ->call('createUser')
     ->assertDontSee('é obrigatório');
 });



