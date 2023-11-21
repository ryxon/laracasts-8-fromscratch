<?php
namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe($email)
    {
        //use mailchimp api
        $mailchimp = new ApiClient();

        //set api key
        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => config('services.mailchimp.server')
        ]);

        return $mailchimp->lists->addListMember(config('services.mailchimp.list_id'), [
            'email_address' => request('email'),
            'status' => 'subscribed'
        ]);
    }
}
