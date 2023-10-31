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
        Schema::create('employees', function (Blueprint $table) {
            $table->char('nip',10)->primary();
            $table->string('nama',100);
            $table->string('alamat',100);
            $table->enum('jenisKelamin', ['M','F']);
            $table->string('email',100);
            $table->char('notelp',20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');



    }
};
