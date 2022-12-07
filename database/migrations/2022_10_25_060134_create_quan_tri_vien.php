<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuanTriVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('pass');
            $table->string('permission');
            $table->string('fullname');
            $table->integer('sex');
            $table->string('phone');
            $table->string('picture');
            $table->datetime('birthday')->useCurrent();
            $table->string('address');
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
        Schema::dropIfExists('accounts');
        $table->dropColumn('deleted_at');
    }
}
