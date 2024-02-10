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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'title');
            $table->string(column: 'slug');
            $table->text(column: 'content');
            $table->text(column: 'image');
            $table->enum('status', ['active', 'inactive'])->default(value: 'inactive');
            $table->foreignId(column: 'category_id')->constrained(table: 'categories');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
