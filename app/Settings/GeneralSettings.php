<?php

namespace App\Settings;

use DateTimeImmutable;
use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{

    public int $ref_bonus;
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

    public static function group(): string
    {
        return 'general';
    }
}
