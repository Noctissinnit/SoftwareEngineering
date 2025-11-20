<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Judul portfolio
            $table->string('title');

            // Jenis portfolio: pdf, link, github
            $table->enum('type', ['pdf', 'link', 'github']);

            // Untuk file upload PDF
            $table->string('file_path')->nullable();

            // Untuk Link & Github
            $table->string('url')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
};
