<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->string('registration_document')->nullable()->after('year');
            $table->string('insurance_document')->nullable()->after('registration_document');
            $table->string('roadworthy_certificate')->nullable()->after('insurance_document');
        });
    }

    public function down(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn(['registration_document', 'insurance_document', 'roadworthy_certificate']);
        });
    }
};
