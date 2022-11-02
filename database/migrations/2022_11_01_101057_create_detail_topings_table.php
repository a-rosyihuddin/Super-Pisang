<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_topings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_detail_id')->nullable()->constrained('order_details')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('toping_id')->nullable()->constrained('topings')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_topings');
    }
};
