<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;

class TwoFactorAuthenticationPage extends Page
{
    protected static string $view = 'filament.pages.profile.two-factor-authentication';

    protected static ?string $navigationIcon = 'heroicon-o-key';

    protected static ?string $navigationGroup = 'Account';

    protected static ?int $navigationSort = 4;

    protected static ?string $title = 'Two Factor Authentication';

    public User $user;

    public function mount(): void
    {
        $this->user = Auth::user();
    }

    public function enableTwoFactorAuthentication(): void
    {
        $this->user->enableTwoFactorAuthentication();
    }

    public function disableTwoFactorAuthentication(): void
    {
        $this->user->disableTwoFactorAuthentication();
    }

    public function showRecoveryCodes(): void
    {
        $this->user->showRecoveryCodes();
    }

    public function regenerateRecoveryCodes(): void
    {
        $this->user->regenerateRecoveryCodes();
    }

    public function getHeading(): string
    {
        return static::$title;
    }

    public static function shouldRegisterNavigation(): bool
    {
        return config('filament-jetstream.show_two_factor_authentication_page');
    }
}
