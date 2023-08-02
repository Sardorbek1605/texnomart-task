<?php

namespace App\Observers;

use App\Mail\CompanyCreateEmail;
use App\Mail\CompanyDeleteEmail;
use App\Mail\CompanyUpdateEmail;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;

class CompanyObserver
{
    /**
     * Handle the Company "created" event.
     */
    public function created(Company $company): void
    {
        //$this->sendMailable($company, CompanyCreateEmail::class);
    }

    /**
     * Handle the Company "updated" event.
     */
    public function updated(Company $company): void
    {
        //$this->sendMailable($company, CompanyUpdateEmail::class);
    }

    /**
     * Handle the Company "deleted" event.
     */
    public function deleted(Company $company): void
    {
        //$this->sendMailable($company, CompanyDeleteEmail::class);
    }

    private function sendMailable(Company $company, $mailable){
        Mail::to('admin@admin.com')->send(
            new $mailable($company)
        );
    }
}
