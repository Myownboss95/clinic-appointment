<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.ref_bonus', 100);
        $this->migrator->add('general.calendly_user_uri', null);
        $this->migrator->add('general.calendly_user_email', null);
        $this->migrator->add('general.calendly_organisation', null);
        $this->migrator->add('general.calendly_access_token', null);
        $this->migrator->add('general.calendly_refresh_token', null);
        $this->migrator->add('general.calendly_expires_at', null);
        $this->migrator->add('general.calendly_created_at', null);
        $this->migrator->add('general.site_phone', '+2348131886973');
        $this->migrator->add('general.site_email', 'info@clinic.test');
        $this->migrator->add('general.site_linkedin', 'linkedin');
        $this->migrator->add('general.site_instagram', 'info@clinic.test');
        $this->migrator->add('general.site_twitter', 'info@clinic.test');
        $this->migrator->add('general.site_facebook', 'info@clinic.test');





    }
};
