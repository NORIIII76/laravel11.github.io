<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('purchase_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('total_price', 15, 2);
            $table->timestamps();

            // Ensure foreign key constraints are correct
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

}
