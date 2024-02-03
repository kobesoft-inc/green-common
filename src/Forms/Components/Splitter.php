<?php

namespace Green\Forms\Components;

use Filament\Forms\Components\Component;
use Filament\Forms\Components\Concerns\HasLabel;
use Filament\Support\Concerns\HasExtraAttributes;

class Splitter extends Component
{
    use HasLabel;

    protected string $view = 'green::forms.components.splitter';

    public static function make(): static
    {
        $static = app(static::class);
        $static->configure();

        return $static;
    }
}
