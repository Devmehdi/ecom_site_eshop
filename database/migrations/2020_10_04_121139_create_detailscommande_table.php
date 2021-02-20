<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailscommandeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailscommandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('commande_id');
            $table->biginteger('qte');
            $table->double('prix');
            $table->foreign('product_id')->references('id')->on('products')->onupdate('cascade')->ondelete('Set Null');
            $table->foreign('commande_id')->references('id')->on('commandes')->onupdate('cascade')->ondelete('Set Null');
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
        Schema::dropIfExists('detailscommandes');
    }
}
