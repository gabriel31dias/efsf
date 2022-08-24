<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\ServiceStation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ServiceStationController
 */
class ServiceStationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $serviceStations = ServiceStation::factory()->count(3)->create();

        $response = $this->get(route('service-station.index'));

        $response->assertOk();
        $response->assertViewIs('serviceStation.index');
        $response->assertViewHas('serviceStations');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('service-station.create'));

        $response->assertOk();
        $response->assertViewIs('serviceStation.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ServiceStationController::class,
            'store',
            \App\Http\Requests\ServiceStationStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $service_station_name = $this->faker->word;
        $acronym_post = $this->faker->word;
        $type_of_post = $this->faker->numberBetween(-10000, 10000);
        $status = $this->faker->boolean;
        $cep = $this->faker->word;
        $type_of_street = $this->faker->numberBetween(-10000, 10000);
        $address = $this->faker->word;
        $number = $this->faker->word;
        $complement = $this->faker->word;
        $district = $this->faker->word;
        $uf = $this->faker->word;

        $response = $this->post(route('service-station.store'), [
            'service_station_name' => $service_station_name,
            'acronym_post' => $acronym_post,
            'type_of_post' => $type_of_post,
            'status' => $status,
            'cep' => $cep,
            'type_of_street' => $type_of_street,
            'address' => $address,
            'number' => $number,
            'complement' => $complement,
            'district' => $district,
            'uf' => $uf,
        ]);

        $serviceStations = ServiceStation::query()
            ->where('service_station_name', $service_station_name)
            ->where('acronym_post', $acronym_post)
            ->where('type_of_post', $type_of_post)
            ->where('status', $status)
            ->where('cep', $cep)
            ->where('type_of_street', $type_of_street)
            ->where('address', $address)
            ->where('number', $number)
            ->where('complement', $complement)
            ->where('district', $district)
            ->where('uf', $uf)
            ->get();
        $this->assertCount(1, $serviceStations);
        $serviceStation = $serviceStations->first();

        $response->assertRedirect(route('serviceStation.index'));
        $response->assertSessionHas('serviceStation.id', $serviceStation->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $serviceStation = ServiceStation::factory()->create();

        $response = $this->get(route('service-station.show', $serviceStation));

        $response->assertOk();
        $response->assertViewIs('serviceStation.show');
        $response->assertViewHas('serviceStation');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $serviceStation = ServiceStation::factory()->create();

        $response = $this->get(route('service-station.edit', $serviceStation));

        $response->assertOk();
        $response->assertViewIs('serviceStation.edit');
        $response->assertViewHas('serviceStation');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ServiceStationController::class,
            'update',
            \App\Http\Requests\ServiceStationUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $serviceStation = ServiceStation::factory()->create();
        $service_station_name = $this->faker->word;
        $acronym_post = $this->faker->word;
        $type_of_post = $this->faker->numberBetween(-10000, 10000);
        $status = $this->faker->boolean;
        $cep = $this->faker->word;
        $type_of_street = $this->faker->numberBetween(-10000, 10000);
        $address = $this->faker->word;
        $number = $this->faker->word;
        $complement = $this->faker->word;
        $district = $this->faker->word;
        $uf = $this->faker->word;

        $response = $this->put(route('service-station.update', $serviceStation), [
            'service_station_name' => $service_station_name,
            'acronym_post' => $acronym_post,
            'type_of_post' => $type_of_post,
            'status' => $status,
            'cep' => $cep,
            'type_of_street' => $type_of_street,
            'address' => $address,
            'number' => $number,
            'complement' => $complement,
            'district' => $district,
            'uf' => $uf,
        ]);

        $serviceStation->refresh();

        $response->assertRedirect(route('serviceStation.index'));
        $response->assertSessionHas('serviceStation.id', $serviceStation->id);

        $this->assertEquals($service_station_name, $serviceStation->service_station_name);
        $this->assertEquals($acronym_post, $serviceStation->acronym_post);
        $this->assertEquals($type_of_post, $serviceStation->type_of_post);
        $this->assertEquals($status, $serviceStation->status);
        $this->assertEquals($cep, $serviceStation->cep);
        $this->assertEquals($type_of_street, $serviceStation->type_of_street);
        $this->assertEquals($address, $serviceStation->address);
        $this->assertEquals($number, $serviceStation->number);
        $this->assertEquals($complement, $serviceStation->complement);
        $this->assertEquals($district, $serviceStation->district);
        $this->assertEquals($uf, $serviceStation->uf);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $serviceStation = ServiceStation::factory()->create();

        $response = $this->delete(route('service-station.destroy', $serviceStation));

        $response->assertRedirect(route('serviceStation.index'));

        $this->assertModelMissing($serviceStation);
    }
}
