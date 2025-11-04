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
        Schema::create('welcome_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title'); 
            $table->text('content'); 
            $table->boolean('is_active')->default(true); 
            $table->timestamps();
        });

        
        \Illuminate\Support\Facades\DB::table('welcome_sections')->insert([
            'title' => 'به سایت انجمن علمی توسعه روستایی ایران خوش آمدید',
            'content' => 'این پایگاه اینترنتی با هدف اطلاع‌رسانی از برنامه‌های انجمن و برقراری ارتباط بین اعضا، شاخه‌های وابسته، کمیته‌های مطالعات و سایر مراکز مرتبط با انجمن راه‌اندازی شده است.',
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('welcome_sections');
    }
};