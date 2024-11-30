<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('p_id')->nullable();
            $table->string('jp_name')->nullable();
            $table->string('en_name')->nullable();
            $table->string('type1')->nullable();
            $table->string('type2')->nullable();
            $table->string('ability1')->nullable();
            $table->string('ability2')->nullable();
            $table->string('hidden_ability')->nullable();
            $table->integer('hp')->nullable();
            $table->integer('attack')->nullable();
            $table->integer('defense')->nullable();
            $table->integer('special_attack')->nullable();
            $table->integer('special_defense')->nullable();
            $table->integer('speed')->nullable();
            $table->integer('total_stats')->nullable();
            $table->string('front_default')->nullable();
            $table->string('back_default')->nullable();
            $table->string('dream_world_front_default')->nullable();
            $table->string('home_front_default')->nullable();
            $table->string('official_artwork_front_default')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
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
        Schema::dropIfExists('pokemons');
    }
}

