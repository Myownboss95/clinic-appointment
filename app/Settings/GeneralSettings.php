<?php

namespace App\Settings;

use DateTimeImmutable;
use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{

    public int $ref_bonus;
    public null|string $calendly_user_uri;
    public null|string $app_name;
    public null|string $hero;
    public null|string $site_description;
    public null|string $app_address;
    public null|string $calendly_user_email;
    public null|string $calendly_organisation;
    public null|string $calendly_access_token;
    public null|string $calendly_refresh_token;
    public null|DateTimeImmutable $calendly_expires_at;
    public null|string $calendly_created_at;
    public string $site_phone;
    public string $site_email;
    public string $site_facebook;
    public string $site_instagram;
    public string $site_linkedin;
    public string $site_twitter;
    public string $whatsapp_contact;

    public static function group(): string
    {
        return 'general';
    }
}
