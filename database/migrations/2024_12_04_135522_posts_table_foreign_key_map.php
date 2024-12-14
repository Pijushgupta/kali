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
        Schema::table("posts", function (Blueprint $table) {
            $table->unsignedBigInteger("post_author")->default(0)->change();          
            $table->foreign('post_author')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("posts", function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['post_author']);

            // Optionally revert the column to its previous state (signed integer without default)
            $table->bigInteger("post_author")->change();
        });
    }
};
