<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProfileController
 */
class ProfileControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $profiles = Profile::factory()->count(3)->create();

        $response = $this->get(route('profile.index'));

        $response->assertOk();
        $response->assertViewIs('profile.index');
        $response->assertViewHas('profiles');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('profile.create'));

        $response->assertOk();
        $response->assertViewIs('profile.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProfileController::class,
            'store',
            \App\Http\Requests\ProfileStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name_profil = $this->faker->word;
        $status = $this->faker->boolean;
        $days_to_access_inspiration = $this->faker->numberBetween(-10000, 10000);
        $days_to_activity_lock = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('profile.store'), [
            'name_profil' => $name_profil,
            'status' => $status,
            'days_to_access_inspiration' => $days_to_access_inspiration,
            'days_to_activity_lock' => $days_to_activity_lock,
        ]);

        $profiles = Profile::query()
            ->where('name_profil', $name_profil)
            ->where('status', $status)
            ->where('days_to_access_inspiration', $days_to_access_inspiration)
            ->where('days_to_activity_lock', $days_to_activity_lock)
            ->get();
        $this->assertCount(1, $profiles);
        $profile = $profiles->first();

        $response->assertRedirect(route('profile.index'));
        $response->assertSessionHas('profile.id', $profile->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $profile = Profile::factory()->create();

        $response = $this->get(route('profile.show', $profile));

        $response->assertOk();
        $response->assertViewIs('profile.show');
        $response->assertViewHas('profile');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $profile = Profile::factory()->create();

        $response = $this->get(route('profile.edit', $profile));

        $response->assertOk();
        $response->assertViewIs('profile.edit');
        $response->assertViewHas('profile');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProfileController::class,
            'update',
            \App\Http\Requests\ProfileUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $profile = Profile::factory()->create();
        $name_profil = $this->faker->word;
        $status = $this->faker->boolean;
        $days_to_access_inspiration = $this->faker->numberBetween(-10000, 10000);
        $days_to_activity_lock = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('profile.update', $profile), [
            'name_profil' => $name_profil,
            'status' => $status,
            'days_to_access_inspiration' => $days_to_access_inspiration,
            'days_to_activity_lock' => $days_to_activity_lock,
        ]);

        $profile->refresh();

        $response->assertRedirect(route('profile.index'));
        $response->assertSessionHas('profile.id', $profile->id);

        $this->assertEquals($name_profil, $profile->name_profil);
        $this->assertEquals($status, $profile->status);
        $this->assertEquals($days_to_access_inspiration, $profile->days_to_access_inspiration);
        $this->assertEquals($days_to_activity_lock, $profile->days_to_activity_lock);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $profile = Profile::factory()->create();

        $response = $this->delete(route('profile.destroy', $profile));

        $response->assertRedirect(route('profile.index'));

        $this->assertModelMissing($profile);
    }
}
