<?php

use App\Enums\GenderEnum;
use App\Enums\UserEnum;
use App\Enums\UserStatusEnum;
use App\Models\roles;
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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender')->default(GenderEnum::OTHER);
            $table->string('email');
            $table->bigInteger('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('avatar')->nullable();
            $table->foreignIdFor(roles::class)->unsigned();
//            $table->integer('roles_id');
            $table->string('status')->default(UserStatusEnum::PENDING);
            $table->string('password');
            $table->timestamps();
//            $table->foreign('roles_id')->references('id')->on('roles');
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
    }
};
