<?php
use App\Modules\Admin\AdminServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\FortifyServiceProvider::class,
    AdminServiceProvider::class,
];
