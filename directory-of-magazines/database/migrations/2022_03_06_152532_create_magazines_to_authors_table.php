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
        Schema::create('magazines_to_authors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained('authors');
            $table->foreignId('magazine_id')->constrained('magazines');
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
        Schema::dropIfExists('magazines_to_authors');
    }
};
