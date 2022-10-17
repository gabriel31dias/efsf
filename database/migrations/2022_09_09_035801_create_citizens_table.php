<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->string('rg')->unique();
            $table->string('cpf')->nullable();
            $table->string('name')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('countryside')->nullable();//zona rural
            $table->integer('country_type_street_id')->nullable();
            $table->integer('type_street_id')->nullable();
            $table->string('address')->nullable();
            $table->string('number')->nullable();
            $table->string('complement')->nullable();
            $table->string('provenance')->nullable();
            $table->string('name_place')->nullable();
            $table->integer('zone')->nullable();
            $table->string('reference_point')->nullable();
            $table->string('cell')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('filiation1')->nullable();
            $table->string('filiation2')->nullable();
            $table->string('filiation3')->nullable();
            $table->integer('migration_situation')->nullable();
            $table->json('other_filiations')->nullable();
            $table->integer('affiliation_id')->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('genre_biologic_id')->nullable();
            $table->integer('genre_id')->nullable();
            $table->integer('service_station_id')->nullable();
            $table->integer('county_id')->nullable();
            $table->integer('marital_status_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->string('portaria_nr')->nullable();
            $table->string('data')->nullable();
            $table->string('dou_nr')->nullable();
            $table->string('secao_folha')->nullable();
            $table->string('data_dou')->nullable();
            $table->integer('uf_id')->nullable();
            $table->string('city_of_birth')->nullable();
            $table->integer('occupation_id')->nullable();
            $table->integer('social_indicator_id')->nullable();
            $table->string('n_social')->nullable();
            $table->string('issuing_station')->nullable();
            $table->string('via_rg')->nullable();
            $table->integer('exemption_id')->nullable();
            $table->string('cid')->nullable();

            $table->integer('certificate')->nullable();
            $table->integer('type_of_certificate')->nullable();
            $table->string('type_of_certificate_new')->nullable();
            $table->string('term_number')->nullable();
            $table->integer('book_number')->nullable();
            $table->integer('forwarded_with_process')->nullable();
            $table->string('sheet_number')->nullable();
            $table->integer('uf_certificate')->nullable();
            $table->integer('county_certificate')->nullable();
            $table->integer('registry_id')->nullable();

            $table->integer('book_letter')->nullable();
            $table->string('previous_registration_certificate')->nullable();
            $table->string('matriculation')->nullable();
            $table->date('certificate_entry_date')->nullable();
            $table->integer('same_sex_marriage')->nullable();
            $table->date('dou_certificate_date')->nullable();

            $table->string('rg_gemeo')->nullable();
            $table->string('name_gemeo')->nullable();
            $table->string('name_social')->nullable();
            $table->integer('social_name_visible')->nullable();
            $table->string('names_previous', 300)->nullable();
            $table->string('filitions_previous', 300)->nullable();

            $table->string('cni')->nullable();
            $table->string('national_card_sus')->nullable();
            $table->string('voter_registration')->nullable();
            $table->string('number_voter')->nullable();
            $table->string('zone_voter')->nullable();
            $table->string('section')->nullable();
            $table->string('national_drivers_license')->nullable();
            $table->string('reservist_certificate')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('rh_factor')->nullable();
            $table->string('professional_identity_1')->nullable();
            $table->string('professional_id_number_1')->nullable();
            $table->string('professional_identity_acronym_1')->nullable();
            $table->string('professional_identity_2')->nullable();
            $table->string('professional_id_number_2')->nullable();
            $table->string('professional_identity_acronym_2')->nullable();
            $table->string('uf_professional_identity')->nullable();
            $table->string('social_security_work_card')->nullable();
            $table->string('ctps_number')->nullable();
            $table->string('serie_wallet')->nullable();
            $table->string('uf_wallet')->nullable();
            $table->integer('cid_wallet')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citizen');
    }
};
