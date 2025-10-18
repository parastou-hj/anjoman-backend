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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('image');                    // مسیر تصویر
            $table->string('alt')->nullable();          // متن جایگزین تصویر
            $table->text('description')->nullable();    // توضیحات تصویر برای مودال
            $table->integer('order')->default(0);       // ترتیب نمایش
            $table->boolean('is_active')->default(true); // وضعیت نمایش
            $table->timestamps();                       // created_at و updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};