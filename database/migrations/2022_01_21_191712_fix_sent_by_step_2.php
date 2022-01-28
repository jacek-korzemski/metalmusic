<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\SentBy;

class FixSentByStep2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('sent_by', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id');
        });

        $data = array(
            [
                'id' => 722
            ],
            [
                'id' => 725
            ]
        );

        foreach ($data as $datum){
            $sent_by = new SentBy();
            $sent_by->id = $datum['id'];
            $sent_by->save();
        }
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
