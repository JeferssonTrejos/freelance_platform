<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->array('portfolio');       // Array de objetos
            $table->array('experience');      // Array de objetos
            $table->array('education');       // Array de objetos
            $table->array('certifications');  // Array de strings
            $table->array('languages');       // Array de strings
            $table->string('availability');
            $table->array('rates');           // Array de objetos
            $table->array('skill_ids');       // Referencias a otra colección
            $table->array('proposal_ids');    // Referencias a otra colección
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
