<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            if (! Schema::hasColumn('bookings', 'payment_reference')) {
                // Paystack transaction reference — unique per attempt, used by the
                // callback and webhook to tie a payment back to its booking.
                $table->string('payment_reference')->nullable()->index()->after('payment_status');
            }
        });

        // The original enum constrained payment_status to a fixed list that no longer
        // matches the application's lifecycle values (unpaid, awaiting_payment, ...).
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('payment_status')->default('unpaid')->change();
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            if (Schema::hasColumn('bookings', 'payment_reference')) {
                $table->dropColumn('payment_reference');
            }
        });
    }
};

