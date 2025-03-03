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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->longText('purpose')->nullable();
            $table->string('location')->nullable();
            $table->integer('length')->nullable();
            $table->integer('width')->nullable();
            $table->integer('raster')->nullable();
            $table->integer('eaves_height')->nullable();
            $table->longText('notes')->nullable();
            $table->foreignUuid('customer_id')
                ->references('id')->on('customers')
                ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
        });

        Schema::dropIfExists('inquiries');
    }
};
