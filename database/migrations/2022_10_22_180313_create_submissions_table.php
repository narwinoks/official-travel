<?php

use App\Models\User;
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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignId('from_city_id');
            $table->foreignId('to_city_id');
            $table->string('from_longitude');
            $table->string('to_longtitude');
            $table->string('from_latitude');
            $table->string('to_latitude');
            $table->date('start_at');
            $table->date('end_at');
            $table->string('description')->nullable();
            $table->integer('status')->nullable();
            // 1 approf 0 rejection
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
        Schema::dropIfExists('submissions');
    }
};
