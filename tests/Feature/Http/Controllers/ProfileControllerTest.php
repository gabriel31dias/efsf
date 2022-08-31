<?php



namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Http\Livewire\Users\UserForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;


it('you can display a login page that is not authenticated', function () {
    // Prepare
    $response = $this->get(route('home'));
    $response->assertRedirect('/login');
});


it('if all parameters are correct', function () {


    $user = $user = User::factory()->make();
    Auth::login($user);

    $profile = [
        'name_profile' => "Teste perfil",
        'status' => true,
        'days_to_access_inspiration' => 1,
        'days_to_activity_lock' => 1
    ];

    $response = $this->withSession($profile)->post(route('profile.store'),$profile);


    $response->assertStatus(201);

    $this->assertDatabaseHas('users', ['name' => $profile['name_profile']]);
});




