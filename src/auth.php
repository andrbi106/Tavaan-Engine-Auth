<?php
declare(strict_types=1);
namespace Tavaan\Engine\Auth;

final class AuthManager
{
    private mixed $user = null;
    private array $guards = [];

    public function __construct(private readonly array $config = [], private $hasher = null, private $session = null)
    {
        $this->guards['web'] = new SessionGuard('web', $config, $hasher);
        $this->guards['api'] = new TokenGuard('api', $config, $hasher);
    }

    public function guard(?string $name = null): SessionGuard|TokenGuard
    {
        $name ??= $this->config['default'] ?? 'web';
        return $this->guards[$name] ?? $this->guards['web'];
    }

    public function user(): mixed { return $this->guard()->user(); }
    public function id(): mixed { return $this->guard()->id(); }
    public function check(): bool { return $this->guard()->check(); }
    public function guest(): bool { return !$this->check(); }
    public function attempt(array $credentials): bool { return $this->guard()->attempt($credentials); }
    public function login(mixed $user): void { $this->guard()->login($user); }
    public function logout(): void { $this->guard()->logout(); }
    public function loginUsingId(mixed $id): bool { return $this->guard()->loginUsingId($id); }
}

final class SessionGuard
{
    private mixed $user = null;
    private array $users = [];

    public function __construct(public readonly string $name, private readonly array $config = [], private $hasher = null)
    {
        $this->users = $config['users'] ?? [];
    }

    public function attempt(array $credentials): bool
    {
        $email = $credentials['email'] ?? '';
        $password = $credentials['password'] ?? '';
        foreach ($this->users as $user) {
            if (($user['email'] ?? '') === $email) {
                if ($this->hasher !== null && method_exists($this->hasher, 'check')) {
                    if ($this->hasher->check($password, $user['password'] ?? '')) {
                        $this->login($user);
                        return true;
                    }
                } elseif (($user['password'] ?? '') === $password) {
                    $this->login($user);
                    return true;
                }
            }
        }
        return false;
    }

    public function login(mixed $user): void { $this->user = $user; }
    public function logout(): void { $this->user = null; }
    public function loginUsingId(mixed $id): bool
    {
        foreach ($this->users as $user) { if (($user['id'] ?? null) === $id) { $this->login($user); return true; } }
        return false;
    }
    public function user(): mixed { return $this->user; }
    public function id(): mixed { return $this->user['id'] ?? null; }
    public function check(): bool { return $this->user !== null; }
}

final class TokenGuard
{
    private mixed $user = null;
    private array $tokens = [];

    public function __construct(public readonly string $name, private readonly array $config = [], private $hasher = null)
    {
        $this->tokens = $config['tokens'] ?? [];
    }

    public function attempt(array $credentials): bool
    {
        $token = $credentials['token'] ?? $credentials['api_token'] ?? '';
        foreach ($this->tokens as $user) { if (($user['api_token'] ?? '') === $token) { $this->login($user); return true; } }
        return false;
    }

    public function login(mixed $user): void { $this->user = $user; }
    public function logout(): void { $this->user = null; }
    public function loginUsingId(mixed $id): bool { return false; }
    public function user(): mixed { return $this->user; }
    public function id(): mixed { return $this->user['id'] ?? null; }
    public function check(): bool { return $this->user !== null; }
}

final class AuthServiceProvider
{
    private ?AuthManager $manager = null;
    public function __construct(private readonly array $config = []) {}
    public function register(): void { $this->manager = new AuthManager($this->config); }
    public function boot(): void {}
    public function provides(): array { return [AuthManager::class]; }
    public function getManager(): AuthManager { if ($this->manager === null) $this->register(); return $this->manager; }

    /**
     * devices
     */
    public function devices(/* ... */): mixed
    {
        return null;
    }
    /**
     * once
     */
    public function once(/* ... */): mixed
    {
        return null;
    }
    /**
     * otp
     */
    public function otp(/* ... */): mixed
    {
        return null;
    }
    /**
     * resetPassword
     */
    public function resetPassword(/* ... */): mixed
    {
        return $this;
    }
    /**
     * sendPasswordResetLink
     */
    public function sendPasswordResetLink(/* ... */): mixed
    {
        return null;
    }
    /**
     * token
     */
    public function token(/* ... */): mixed
    {
        return $this->data["_token"] ?? bin2hex(random_bytes(16));
    }
    /**
     * twoFactor
     */
    public function twoFactor(/* ... */): mixed
    {
        return null;
    }
    /**
     * validate
     */
    public function validate(/* ... */): mixed
    {
        return null;
    }
}
