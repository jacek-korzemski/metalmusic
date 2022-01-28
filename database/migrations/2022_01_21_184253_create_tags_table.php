<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Tag;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('display_name');
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->timestamps();
        });

        $data = array(
            [
                'slug' => 'alternative',
                'display_name' => 'alternatywny'
            ],
            [
                'slug' => 'black',
                'display_name' => 'black'
            ],
            [
                'slug' => 'death',
                'display_name' => 'death'
            ],
            [
                'slug' => 'doom',
                'display_name' => 'doom'
            ],
            [
                'slug' => 'folk',
                'display_name' => 'folk'
            ],
            [
                'slug' => 'glam',
                'display_name' => 'glam'
            ],
            [
                'slug' => 'gothic',
                'display_name' => 'gothic'
            ],
            [
                'slug' => 'industrial',
                'display_name' => 'industrial'
            ],
            [
                'slug' => 'symfonic',
                'display_name' => 'symfoniczny'
            ],
            [
                'slug' => 'nu',
                'display_name' => 'nu'
            ],
            [
                'slug' => 'power',
                'display_name' => 'power'
            ],
            [
                'slug' => 'progressive',
                'display_name' => 'progresywny'
            ],
            [
                'slug' => 'thrash',
                'display_name' => 'thrash'
            ]
        );

        foreach ($data as $datum){
            $tag = new Tag();
            $tag->slug = $datum['slug'];
            $tag->display_name = $datum['display_name'];
            $tag->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
