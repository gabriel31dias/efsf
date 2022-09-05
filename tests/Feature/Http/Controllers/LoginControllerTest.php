<?php



namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Http\Livewire\Users\UserForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;


it('the index page should be working correctly', function () {
    // Prepare
    $response = $this->get(route('login'));
    $response->assertOk();
});

it('should direct to male if already authenticated', function () {
    $user = $user = User::factory()->make();
    Auth::login($user);

    $response = $this->get(route('login'));
    $response->assertRedirect('/');
});


it('if authentication is successful redirect to home', function () {
    $user = User::factory()->create();

    $this->post(route("login.auth"), [
        'user_name' =>  $user->user_name,
        'password' => "00300111"
    ])->assertRedirect(route("home"));
});

it('if authentication is not successful redirect to home', function () {
    $user = User::factory()->create();

    $this->post(route("login.auth"), [
        'user_name' =>  $user->user_name,
        'password' => "xxxx"
    ])->assertRedirect(route("login"));
});





