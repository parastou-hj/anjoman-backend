<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('welcomes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->timestamps();
        });

        DB::table('welcomes')->insert([
            'title' => 'به سایت انجمن علمی جغرافیا و برنامه‌ریزی روستایی ایران خوش آمدید',
            'content' => 'این پایگاه اینترنتی با هدف اطلاع‌رسانی از برنامه‌های انجمن و برقراری ارتباط بین اعضا، شاخه‌های وابسته، کمیته‌های مطالعات و سایر مراکز مرتبط با انجمن راه‌اندازی شده است.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('welcomes');
    }
};