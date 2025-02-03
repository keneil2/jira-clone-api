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
        Schema::create('workspace_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId("workspace_id")->references("id")->on("workspaces")->cascadeOnDelete();
            $table->foreignId("project_id")->references("id")->on("projects")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workspace_projects');
    }
};
