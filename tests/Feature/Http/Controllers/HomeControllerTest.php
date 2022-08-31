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





