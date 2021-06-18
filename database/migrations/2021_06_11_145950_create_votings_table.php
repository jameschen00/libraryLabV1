<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //
            // 投票者 id
            $table->biginteger('sid')->unsigned(); 
            // 設為外來鍵: 指定關聯性
            $table->foreign('sid')->references('id')->on('users')->onDelete('cascade');
                        // book id
            $table->biginteger('bid')->unsigned(); 
            $table->foreign('bid')->references('id')->on('books')->onDelete('cascade');
            // 預設值
            $table->dateTime('voting_date')->default(now());
            // 限制:一人一書只能投一票
            $table->unique(['sid', 'bid']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votings');
    }
}
