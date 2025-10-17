<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
public function up()
{
    Schema::create('journals', function (Blueprint $table) {
        $table->id();
        $table->string('title');                    // نام مجله
        $table->text('description')->nullable();    // توضیحات
        $table->string('image');                    // تصویر جلد
        $table->string('tag');                      // برچسب (علمی-پژوهشی، ...)
        $table->string('link')->nullable();         // لینک مشاهده
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('journals');
}
};
