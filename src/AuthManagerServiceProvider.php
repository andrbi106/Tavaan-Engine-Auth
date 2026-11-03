<?php

declare(strict_types=1);

namespace Tavaan\Engine\Auth;

use Tavaan\Core\Contracts\Container\ContainerInterface;
use Tavaan\Core\Contracts\Config\RepositoryInterface as ConfigRepository;
use Tavaan\Engine\Auth\Contracts\AuthManagerInterface;
use Tavaan\Core\Provider\ServiceProvider;

/**
 * AuthManagerServiceProvider — ثبت سرویس‌های موتور AuthManager.
 */
final class AuthManagerServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function register(): void
    {
        $this->app->singleton(AuthManagerInterface::class, function (ContainerInterface $app) {
            /** @var ConfigRepository $config */
            $config = $app->get(ConfigRepository::class);
            return new AuthManager($config);
        });
    }

    /**
     * {@inheritdoc}
     */
    public function boot(): void
    {
        // ثبت Facade
        $this->app->instance('auth', $this->app->get(AuthManagerInterface::class));

    }

    /**
     * {@inheritdoc}
     */
    public function provides(): array
    {
        return [
            AuthManagerInterface::class,
            'auth',
        ];
    }
}