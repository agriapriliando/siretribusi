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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('sector_id')->constrained();
            $table->foreignId('item_id')->constrained();
            $table->foreignUuid('tenant_id')->constrained();
            $table->string('merk_usaha')->nullable();
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->integer('nominal');
            $table->enum('jenis_bayar', ['Tahunan', 'Bulanan']);
            $table->string('status_rental'); // aktif, selesai, batal, dsb
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
