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
        Schema::disableForeignKeyConstraints();

        // Cek dan instal ekstensi PostGIS jika belum ada
        // DB::statement('CREATE EXTENSION IF NOT EXISTS postgis;');

        // Membuat tabel districts
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->integer('code');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });


        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};
