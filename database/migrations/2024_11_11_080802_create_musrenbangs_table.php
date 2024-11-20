<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('musrenbangs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('year');
            $table->string('status')->default('Belum');
            $table->foreignId('district_id')->constrained();
            $table->timestamps();
        });

         // Memasukkan constraint status di luar closure
         $types = ['Belum', 'Sudah Direncanakan', 'Sudah', 'Tidak Dapat Dikerjakan'];
         $result = join(', ', array_map(function($value) {
         return sprintf("'%s'::character varying", $value);
         }, $types));
         DB::statement("ALTER TABLE musrenbangs ADD CONSTRAINT musrenbangs_status_check CHECK (status::text = ANY
         (ARRAY[$result]::text[]))");
 
         Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musrenbangs');
    }
};
