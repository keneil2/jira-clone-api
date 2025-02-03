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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->enum('priority',['medium','minor','high priority',]);
            $table->enum('level',[1,2,3,4,5])->default(1);
            $table->string("reference_no")->unique();
            $table->text('description');
            $table->foreignId('task_type_id')->references('id')->on("task_types")->cascadeOnDelete();
            $table->foreignId('assignee_id')->references('id')->on("users")->cascadeOnDelete();
            $table->enum("status",["To Do","In Progress","Done"])->default("To Do");
            $table->dateTime("due_date");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
