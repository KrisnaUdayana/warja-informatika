<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('jurnals', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('penulis');
            $table->string('jalur');
            $table->string('tahun');
            $table->string('link')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('jurnals');
    }
};
