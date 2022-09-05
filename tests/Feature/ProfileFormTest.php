<?php



namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use App\Http\Livewire\Profiles\ProfileForm;


test('if the user is not authenticated redirects to the login screen', function () {
    $this->get(route('profile.index'))->assertRedirect('/login');
});

test('if authenticated must have the component profile-form', function () {
    $user = $user = User::factory()->make();
    Auth::login($user);
    $this->get(route('profile.create'))->assertSeeLivewire('profiles.profile-form');
});


test('must validate the fields', function () {
    $res = Livewire::test(ProfileForm::class)
     ->set('fields', [
        "nome_perfil" => "",
        "prazo_expiração" => "",
        "prazo_expiração_inatividade" => ""
     ])
     ->call('saveProfile')->assertSee('é obrigatório');
 });


 test('the nome_perfil field must be mandatory', function () {
    $res = Livewire::test(ProfileForm::class)
     ->set('fields', [
        "nome_perfil" => "",
        "prazo_expiração" => "12",
        "prazo_expiração_inatividade" => "21"
     ])
     ->call('saveProfile')
     ->assertSee('O campo Nome do perfil é obrigatório');
 });

 test('the prazo_expiração field must be mandatory', function () {
    $res = Livewire::test(ProfileForm::class)
     ->set('fields', [
        "nome_perfil" => "profile teste",
        "prazo_expiração" => "",
        "prazo_expiração_inatividade" => "21"
     ])
     ->call('saveProfile')
     ->assertSee('O campo Prazo para expiração é obrigatório');
 });

 test('the prazo_expiração_inatividade field must be mandatory', function () {
    $res = Livewire::test(ProfileForm::class)
     ->set('fields', [
        "nome_perfil" => "profile teste",
        "prazo_expiração" => "1",
        "prazo_expiração_inatividade" => ""
     ])
     ->call('saveProfile')
     ->assertSee('O campo Prazo para expiração por inatividade é obrigatório');
 });








