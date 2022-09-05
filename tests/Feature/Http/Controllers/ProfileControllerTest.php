<?php



namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Profile;
use App\Http\Livewire\Users\UserForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;


it('if the user is not authenticated, the login page should be displayed when accessing profile.index', function () {
    $response = $this->get(route('profile.index'));
    $response->assertRedirect('/login');
});


it('if the user is not authenticated, the login page should be displayed when accessing profile.edit', function () {
    $profile = Profile::factory()->create();

    $response = $this->get(route("profile.edit",["profile"=> $profile->id]));
    $response->assertRedirect('/login');
});

it('if the user is not authenticated, the login page should be displayed when accessing profile.show', function () {
    $profile = Profile::factory()->create();

    $response = $this->get(route('profile.edit', ["profile"=> $profile->id]));
    $response->assertRedirect('/login');
});

it('if all parameters are correct', function () {
    $user = User::factory()->make();
    Auth::login($user);

    $profile = [
        'name_profile' => "Teste perfil",
        'status' => true,
        'days_to_access_inspiration' => 1,
        'days_to_activity_lock' => 1
    ];

    $response = $this->withSession($profile)->post(route('profile.store'),$profile);

    $this->assertDatabaseHas('profiles', ['name_profile' => $profile['name_profile']]);
});




