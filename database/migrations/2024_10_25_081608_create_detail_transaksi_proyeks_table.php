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
        Schema::create('detail_transaksi_proyeks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaksi_id'); 
            $table->string('fitur');
            $table->string('deskripsi');
            $table->decimal('harga', 10, 2); 
            $table->enum('status_pengerjaan', ['new', 'in progress', 'close to due', 'completed']) // Menggunakan enum untuk status
            ->default('new');
            $table->timestamps();
        
            // Menambahkan foreign key constraint
            $table->foreign('transaksi_id')->references('id')->on('transaksi_proyeks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi_proyeks');
    }
};
