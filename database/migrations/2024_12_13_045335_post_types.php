<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_types',function(Blueprint $table){
            $table->id();
            $table->string('label','256')->nullable();
            $table->string('name',256);      
            $table->boolean('is_hidden')->default(false);
            $table->json('taxonomy')->nullable();
            $table->json('support')->nullable();
            $table->boolean('hierarchical')->default(false);
            $table->longText('menu_icon')->nullable();
            $table->string('slug',256)->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_types');
    }
};
