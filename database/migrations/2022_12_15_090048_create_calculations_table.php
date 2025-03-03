<?php

use App\Models\Inquiry;
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
        Schema::create('calculations', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->longText('purpose')->nullable();
            $table->string('location')->nullable();
            $table->integer('length')->nullable();
            $table->integer('width')->nullable();
            $table->integer('raster')->nullable();
            $table->integer('eaves_height')->nullable();
            $table->longText('notes')->nullable();
            $table->foreignUuid('inquiry_id')
                ->references('id')->on('inquiries')
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
        Schema::dropIfExists('calculations');
    }
};
