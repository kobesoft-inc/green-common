<?php

namespace Green\Providers;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\View\View;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * アプリケーションサービスを登録する
     *
     * @return void
     */
    public function register(): void
    {
    }

    /**
     * アプリケーションサービスの起動処理を行う
     *
     * @return void
     */
    public function boot(): void
    {
        // アセットを登録
        FilamentAsset::register([
            Css::make('green-common', __DIR__ . '../../../resources/css/green-common.css'),
        ], 'kobesoft/green-common');

        // 言語・ビューの登録
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'green');
    }
}
