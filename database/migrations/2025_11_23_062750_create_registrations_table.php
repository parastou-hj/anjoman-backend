<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
public function up(): void {
Schema::create('registrations', function (Blueprint $table) {
$table->id();
$table->string('email');
$table->string('username');
$table->string('name');
$table->string('family');
$table->string('education');
$table->string('rank');
$table->string('phone');
$table->string('mobile');
$table->string('city');
$table->text('address');
$table->text('organization');
$table->timestamps();
});
}


public function down(): void {
Schema::dropIfExists('registrations');
}
};