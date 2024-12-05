<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    public function up()
{
    Schema::create('documents', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->string('chemin');
        $table->unsignedBigInteger('user_id')->nullable(); // Rendre la colonne nullable
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}

