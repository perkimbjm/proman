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

        Schema::create('tickets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->constrained();
            $table->string('type');
            $table->text('issue');
            $table->foreignId('district_id')->constrained();
            $table->foreignId('village_id')->constrained();
            $table->string('photo_url')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('status')->default('open');
            $table->timestamps();
        });

        // Memasukkan constraint status di luar closure
        $types = ['open', 'in progress', 'closed'];
        $result = join(', ', array_map(function($value) {
        return sprintf("'%s'::character varying", $value);
        }, $types));
        DB::statement("ALTER TABLE tickets ADD CONSTRAINT tickets_status_check CHECK (status::text = ANY
        (ARRAY[$result]::text[]))");

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
