<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\FortifyServiceProvider::class,
    App\Providers\JetstreamServiceProvider::class,
    \Laravel\Socialite\SocialiteServiceProvider::class,
    \SocialiteProviders\Manager\ServiceProvider::class,
    Usamamuneerchaudhary\Commentify\Providers\CommentifyServiceProvider::class,
];
