# Tavaan Engine — Auth

> **احراز هویت** — موتور Auth در فریمورک تَوان

## مشخصات

| فیلد | مقدار |
|---|---|
| شناسه | `tavaan.engine.auth` |
| نام | `Auth` |
| عنوان فارسی | احراز هویت |
| نسخه | `0.1.0` |
| namespace | `Tavaan\Engine\Auth` |
| نوع | `engine` |
| Facade | `Auth` (accessor: `auth`) |

## توضیحات

M4 — چند Guard (session/jwt)، JWT خودنوشته با algorithm pinning، refresh rotation + reuse detection، OTP یک‌بارمصرف، TOTP RFC 6238، Device tracking، Session hardening، Password broker.

## قراردادها (Contracts)

این موتور قراردادهای زیر را ارائه می‌دهد:

- `Tavaan\Engine\Auth\Contracts\Authenticatable`
- `Tavaan\Engine\Auth\Contracts\GuardInterface`
- `Tavaan\Engine\Auth\Contracts\StatefulGuard`
- `Tavaan\Engine\Auth\Contracts\UserProviderInterface`

## خطاها (Exceptions)

- `Tavaan\Engine\Auth\Exceptions\AccountBannedException`
- `Tavaan\Engine\Auth\Exceptions\AuthenticationException`
- `Tavaan\Engine\Auth\Exceptions\ThrottledException`
- `Tavaan\Engine\Auth\Exceptions\TokenExpiredException`
- `Tavaan\Engine\Auth\Exceptions\TokenInvalidException`

## Facadeها

- `Tavaan\Engine\Auth\Facades\Auth`

## کلاس‌های اصلی

- `src/Devices/DeviceManager.php`
- `src/GenericUser.php`
- `src/Jwt/Base32.php`
- `src/Jwt/Base64Url.php`
- `src/Jwt/JwtEncoder.php`
- `src/Middleware/AuthenticateMiddleware.php`
- `src/Otp/ArrayOtpChannel.php`
- `src/Otp/LogOtpChannel.php`
- `src/Otp/OtpChannelInterface.php`
- `src/Otp/OtpManager.php`
- `src/Passwords/PasswordBroker.php`
- `src/Providers/DatabaseUserProvider.php`
- `src/Throttle/LoginThrottle.php`
- `src/TokenManager.php`
- `src/TokenPair.php`
- `src/TwoFactor/Totp.php`
- `src/TwoFactor/TwoFactorManager.php`
- `src/auth.php`

## Service Providerها

- `Tavaan\Engine\Auth\AuthManagerServiceProvider`

## وابستگی‌ها

**موتورهای مورد‌نیاز:**

- `session`
- `hash`
- `crypt`
- `event`
- `database`
- `cache`
- `config`

**موتورهای اختیاری:**

- `http`
- `orm`
- `notification`

## جداول دیتابیس

- `password_resets`
- `personal_access_tokens`
- `user_devices`
- `two_factor_secrets`

## پیکربندی

- فایل پیکربندی: `config/auth.php`
- کلید: `auth`

## نصب

```bash
git clone https://github.com/andrbi106/Tavaan-Engine-Auth.git
```

این موتور بخشی از فریمورک تَوان است و معمولاً به‌صورت مستقیم نصب نمی‌شود،
بلکه توسط [Tavaan-Core](https://github.com/andrbi106/Tavaan-Core) مدیریت می‌شود.

## روابط با سایر مخازن

| مخزن | نقش |
|---|---|
| **`andrbi106/Tavaan-Engine-Auth`** (این مخزن) | موتور Auth |
| `andrbi106/Tavaan-Engine-Core` | ساختار پایه + درگاه ارتباط موتورها |
| `andrbi106/Tavaan-Core` | اسکلت اپلیکیشن + همهٔ موتورها |
| `Derogaramin/Tavaan-Framework` | فریمورک مادر (monorepo) |

## مجوز

MIT — هم‌راستا با فریمورک مادر تَوان.
