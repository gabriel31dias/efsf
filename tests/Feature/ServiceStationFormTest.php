<?php
namespace Tests\Feature;

use App\Http\Livewire\ServiceStation\ServiceStationForm;
use App\Models\ServiceStation;
use Livewire\Livewire;


test('must validate the fields', function () {
   $res = Livewire::test(ServiceStationForm::class)
    ->set('fields', [
        "service_station_name" => "",
        "acronym_post" => "",
        "type_of_post" => "",
        "city" => "",
        "cep" => "",
        "type_of_street" => "",
        "address" => "",
        "number" => "",
        "status" => true,
        "complement" => "",
        "district" => "",
        "uf" => "",
    ])
    ->call('saveStation')->assertSee('Campo obrigatório');
});


test('if it is an event request necessary fields', function () {
    $res = Livewire::test(ServiceStationForm::class)
     ->set('fields', [
        "service_station_name" => "teste",
        "acronym_post" => "teste",
        "type_of_post" => ServiceStation::EVENTS_TYPE,
        "city" => "teste",
        "cep" => "123123123",
        "type_of_street" => "123123",
        "address" => "teste",
        "number" => "123",
        "status" => true,
        "complement" => "teste",
        "district" => "teste",
        "uf" => "teste",
        "start_hour" => "00:00", 
        "end_hour" => "00:00",
     ])
     ->call('saveStation')
     ->assertSee('Campo obrigatório para postos de evento.');
 });



