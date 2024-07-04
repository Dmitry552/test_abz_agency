<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('password');
            $table->dropColumn('email_verified_at');
            $table->dropColumn('remember_token');

            $table->unsignedBigInteger('position_id')->nullable();
            $table->string('phone')->unique();
            $table->string('photo');

            $table->foreign('position_id')
                ->references('id')
                ->on('positions')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('position_id');
            $table->dropColumn('phone');
            $table->dropColumn('photo');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
        });
    }
};
