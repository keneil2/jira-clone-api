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
        Schema::create('project_template_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId("project_template_id")->references("id")->on("project_templates");
            $table->foreignId("feature_id")->references("id")->on("features");
            $table->boolean("enabled")->default(true);
            $table->json('default_config')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_template_features');
    }
};
