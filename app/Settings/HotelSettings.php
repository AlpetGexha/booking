<?php

declare(strict_types=1);

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

final class HotelSettings extends Settings
{
    public string $name;
    public string $email;
    public string $phone;
    public string $address;
    public ?string $facebook;
    public ?string $twitter;
    public ?string $instagram;
    public ?string $linkedin;
    public ?string $github;
    public ?string $cv;

    public static function group(): string
    {
        return 'hotel';
    }
}
