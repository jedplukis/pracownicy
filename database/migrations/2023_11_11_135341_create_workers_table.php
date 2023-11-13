<?php

use App\Enums\Dieta;
use App\Enums\Firmy;
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
        Schema::create('workers', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('email')->unique();
            $table->string('imie');
            $table->string('nazwisko');
            $table->string('telefon_1');
            $table->string('telefon_2')->nullable();
            $table->enum('dieta', Dieta::getAllValues());
            $table->enum('firma', Firmy::getAllValues());
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
