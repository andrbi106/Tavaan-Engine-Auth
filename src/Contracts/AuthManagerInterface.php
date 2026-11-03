<?php

declare(strict_types=1);

namespace Tavaan\Engine\Auth\Contracts;

/**
 * قرارداد AuthManager.
 *
 * @see \Tavaan\Engine\Auth\AuthManager
 * @api 1.0
 */
interface AuthManagerInterface
{
    /**
     * متد guard.
     *
     * @return mixed
     */
    public function guard(/* ... */): mixed;

    /**
     * متد user.
     *
     * @return mixed
     */
    public function user(/* ... */): mixed;

    /**
     * متد id.
     *
     * @return mixed
     */
    public function id(/* ... */): mixed;

    /**
     * متد check.
     *
     * @return mixed
     */
    public function check(/* ... */): mixed;

    /**
     * متد guest.
     *
     * @return mixed
     */
    public function guest(/* ... */): mixed;

    /**
     * متد attempt.
     *
     * @return mixed
     */
    public function attempt(/* ... */): mixed;

    /**
     * متد once.
     *
     * @return mixed
     */
    public function once(/* ... */): mixed;

    /**
     * متد login.
     *
     * @return mixed
     */
    public function login(/* ... */): mixed;

    /**
     * متد loginUsingId.
     *
     * @return mixed
     */
    public function loginUsingId(/* ... */): mixed;

    /**
     * متد logout.
     *
     * @return mixed
     */
    public function logout(/* ... */): mixed;

    /**
     * متد validate.
     *
     * @return mixed
     */
    public function validate(/* ... */): mixed;

    /**
     * متد token.
     *
     * @return mixed
     */
    public function token(/* ... */): mixed;

    /**
     * متد otp.
     *
     * @return mixed
     */
    public function otp(/* ... */): mixed;

    /**
     * متد twoFactor.
     *
     * @return mixed
     */
    public function twoFactor(/* ... */): mixed;

    /**
     * متد devices.
     *
     * @return mixed
     */
    public function devices(/* ... */): mixed;

    /**
     * متد register.
     *
     * @return mixed
     */
    public function register(/* ... */): mixed;

    /**
     * متد sendPasswordResetLink.
     *
     * @return mixed
     */
    public function sendPasswordResetLink(/* ... */): mixed;

    /**
     * متد resetPassword.
     *
     * @return mixed
     */
    public function resetPassword(/* ... */): mixed;
}