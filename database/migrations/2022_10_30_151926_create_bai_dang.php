<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaiDang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('id_account');
            $table->string('id_type');
            $table->string('title');
            $table->string('content');
            $table->string('picture');
            $table->string('address');
            $table->boolean('is_found')->default(false);
            $table->boolean('active')->default(false);
            $table->boolean('stt')->default(true);
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
        Schema::dropIfExists('posts');
        $table->dropColumn('deleted_at');
    }
}
