<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomSociete');
            $table->string('email')->unique();
            $table->string('login')->unique();
            $table->string('password');
            $table->string('name')->nullable();
            $table->string('adresse', 255)->nullable();
            $table->string('telephone', 255)->nullable();
            $table->string('logoSociete', 255)->nullable();
            $table->string('fax')->nullable();
            $table->integer('soc');//represente l'identifiant de la societe
            $table->integer('numberConnexion')->default(0);// Represente le nombre de fois que l'utilisateur s'est connecté
            $table->integer('status')->nullable();// Si l'utilisateur est actif ou pas :: 0=>Inactif; 1=>Actif
            $table->integer('estSupprime')->nullable();//Si le user est supprimé
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
