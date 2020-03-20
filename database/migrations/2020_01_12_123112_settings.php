<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Settings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('blog_name', 64);
            $table->string('blog_slogan', 128);
            $table->string('blog_copyright', 128);
            $table->string('blog_tags', 256);
            $table->string('dev_version', 256);
            $table->text('top_scrollbar_color');
            $table->text('blog_logo');
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
        //
    }
}
