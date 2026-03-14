<?php

use Illuminate\Database\Migrations\Migration;
use MongoDB\Laravel\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'mongodb';

    public function up(): void
    {
        Schema::connection('mongodb')->create('password_reset_tokens', function (Blueprint $collection) {
            $collection->index('email');
            $collection->index('token');
        });
    }

    public function down(): void
    {
        Schema::connection('mongodb')->drop('password_reset_tokens');
    }
};