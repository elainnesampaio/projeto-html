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
        Schema::create('colesteroltbs', function (Blueprint $table) {
            $table->id();
            $table->integer('iduser');
            $table->string('colesterol_HDL');
            $table->string('colesterol_LDL');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colesteroltbs');
    }
};
