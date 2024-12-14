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
        //
        Schema::create("posts", function (Blueprint $table) {
            $table->id();
            $table->string("lang", 10)->default("en");
            $table->bigInteger("post_parent")->nullable();
            $table->bigInteger("post_author")->default(0);
            $table->longText("post_content");
            $table->string("post_title", 255);
            $table->text("post_name");
            $table->string("post_type", 30)->default("post");
            $table->string("post_status", 10)->default("draft");
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("updated_at")->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists("posts");
    }
};
