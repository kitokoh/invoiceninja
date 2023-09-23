<?php
/**
 * Africa Novatech (https://africanovatech.com).
 *
 * @link https://africanovatech.com source repository
 *
 * @copyright Copyright (c) 2023. Invoice Novatech LLC (https://africanovatech.com)
 *
 * @license https://www.elastic.co/licensing/elastic-license
 */

namespace App\Mail;

use App\Models\Company;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;

class DownloadDocuments extends Mailable
{
    // use Queueable, SerializesModels;

    public $file_path;

    public $company;

    public function __construct($file_path, Company $company)
    {
        $this->file_path = $file_path;

        $this->company = $company;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        App::setLocale($this->company->getLocale());

        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->subject(ctrans('texts.download_files'))
            ->text('email.admin.download_documents_text', [
                'url' => $this->file_path,
            ])
            ->view('email.admin.download_documents', [
                'url' => $this->file_path,
                'logo' => $this->company->present()->logo,
                'whitelabel' => $this->company->account->isPaid() ? true : false,
                'settings' => $this->company->settings,
                'greeting' => $this->company->present()->name(),
            ]);
    }
}
