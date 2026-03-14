<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'mongodb';

    public function up(): void
    {
        Schema::connection('mongodb')->table('users', function (Blueprint $collection) {
            $collection->unique('email');
            $collection->index('name');
        });
    }

    public function down(): void
    {
        Schema::connection('mongodb')->table('users', function (Blueprint $collection) {
            $collection->dropIndex('email_1');
            $collection->dropIndex('name_1');
        });
    }
};
