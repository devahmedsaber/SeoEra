<?php

use App\Models\Admin\Language;
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
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('img')->nullable();
            $table->string('slogan');
            $table->timestamps();
        });

        Language::create([
            'title'  => 'Arabic',
            'img'    => '/uploads/languages_images/arabic.png',
            'slogan' => 'ar'
        ]);

        Language::create([
            'title'  => 'English',
            'img'    => '/uploads/languages_images/english.png',
            'slogan' => 'en'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
};
