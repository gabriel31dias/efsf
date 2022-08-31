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





