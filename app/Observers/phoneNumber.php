<?php

namespace App\Observers;

use App\Models\user;

class phoneNumber
{
    /**
     * Handle the user "created" event.
     */
    public function created(user $user): void
    {
        $user->phone_number = $this->normalizePhoneNumber($user->phone_number);
    }

    private function normalizePhoneNumber($phoneNumber)
    {
        // Menerapkan aturan konversi nomor telepon
        // Misalnya, jika nomor dimulai dengan '0856', ganti menjadi '62856'
        if (substr($phoneNumber, 0, 1) === '0') {
            $phoneNumber = '62' . substr($phoneNumber, 1);
        }

        return $phoneNumber;
    }

    /**
     * Handle the user "updated" event.
     */
    public function updated(user $user): void
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     */
    public function deleted(user $user): void
    {
        //
    }

    /**
     * Handle the user "restored" event.
     */
    public function restored(user $user): void
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     */
    public function forceDeleted(user $user): void
    {
        //
    }
}
