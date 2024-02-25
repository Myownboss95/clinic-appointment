<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {

        $this->migrator->add('general.app_name', 'Clinic');
        $this->migrator->add('general.app_address', '10, DLA Road, Asaba');
        $this->migrator->add('general.hero', "Welcome please select the services you want");
        $this->migrator->add('general.site_description', "your friendly neighborhood dental clinic, we offer comprehensive care for all ages, from checkups to advanced procedures. Our experienced and compassionate team prioritizes your comfort and utilizes modern technology to deliver high-quality dentistry in a welcoming environment. Schedule your appointment today and experience the difference!");

    }
};
