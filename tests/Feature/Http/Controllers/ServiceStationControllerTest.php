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
    $response = $this->get(route('service-station.index'));
    $response->assertRedirect('/login');
});

it('if all parameters are correct', function () {
    $user = $user = User::factory()->make();
    Auth::login($user);

    $service_station = [
        'service_station_name' => 'teste station',
        'type_of_post' => 1,
        'status' => true,
        'cep' => "rua portugal",
        'acronym_post' => 'dwwd',
        'type_of_street' => "2213213",
        'address' => "2213213",
        'number' => "2213213",
        'complement' => "2213213",
        'district' => "2213213",
        'uf' => "2213213",
        'city' => "Andradina"
    ];

    $response = $this->withSession($service_station)->post(route('service-station.store'), $service_station);

    $this->assertDatabaseHas('service_stations', ['service_station_name' => $service_station['service_station_name']]);
});




