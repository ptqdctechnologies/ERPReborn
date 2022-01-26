<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

trait ThrottlesLogins
{
    /**
     * Determine if the user has too many failed login attempts.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function hasTooManyLoginAttempts(Request $request)
    {
        return $this->limiter()->tooManyAttempts(
            $this->throttleKey($request), $this->maxAttempts()
        );
    }

    /**
     * Increment the login attempts for the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function incrementLoginAttempts(Request $request)
    {
        $this->limiter()->hit(
            $this->throttleKey($request), $this->decayMinutes() * 60
        );
    }

    /**
     * Redirect the user after determining they are locked out.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );

        throw ValidationException::withMessages([
            $this->username() => [trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ])],
        ])->status(Response::HTTP_TOO_MANY_REQUESTS);
    }

    /**
     * Clear the login locks for the given user credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function clearLoginAttempts(Request $request)
    {
        $this->limiter()->clear($this->throttleKey($request));
    }

    /**
     * Fire an event when a lockout occurs.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function fireLockoutEvent(Request $request)
    {
        event(new Lockout($request));
    }

    /**
     * Get the throttle key for the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function throttleKey(Request $request)
    {
        return $this->removeSpecialCharacters(Str::lower($request->input($this->username())).'|'.$request->ip());
    }

    /**
     * Get the rate limiter instance.
     *
     * @return \Illuminate\Cache\RateLimiter
     */
    protected function limiter()
    {
        return app(RateLimiter::class);
    }

    /**
     * Get the maximum number of attempts to allow.
     *
     * @return int
     */
    public function maxAttempts()
    {
        return property_exists($this, 'maxAttempts') ? $this->maxAttempts : 5;
    }

    /**
     * Get the number of minutes to throttle for.
     *
     * @return int
     */
    public function decayMinutes()
    {
        return property_exists($this, 'decayMinutes') ? $this->decayMinutes : 1;
    }

    /**
     * Remove special characters that may allow users to bypass rate limiting.
     *
     * @param  string  $key
     * @return string
     */
    protected function removeSpecialCharacters($key)
    {
        $values = [
            'ⓐ' => 'a',
            'ⓑ' => 'b',
            'ⓒ' => 'c',
            'ⓓ' => 'd',
            'ⓔ' => 'e',
            'ⓕ' => 'f',
            'ⓖ' => 'g',
            'ⓗ' => 'h',
            'ⓘ' => 'i',
            'ⓙ' => 'j',
            'ⓚ' => 'k',
            'ⓛ' => 'l',
            'ⓜ' => 'm',
            'ⓝ' => 'n',
            'ⓞ' => 'o',
            'ⓟ' => 'p',
            'ⓠ' => 'q',
            'ⓡ' => 'r',
            'ⓢ' => 's',
            'ⓣ' => 't',
            'ⓤ' => 'u',
            'ⓥ' => 'v',
            'ⓦ' => 'w',
            'ⓧ' => 'x',
            'ⓨ' => 'y',
            'ⓩ' => 'z',
            '①' => '1',
            '②' => '2',
            '③' => '3',
            '④' => '4',
            '⑤' => '5',
            '⑥' => '6',
            '⑦' => '7',
            '⑧' => '8',
            '⑨' => '9',
            '⑩' => '10',
            '⑪' => '11',
            '⑫' => '12',
            '⑬' => '13',
            '⑭' => '14',
            '⑮' => '15',
            '⑯' => '16',
            '⑰' => '17',
            '⑱' => '18',
            '⑲' => '19',
            '⑳' => '20',
            '⓪' => '0',
            '⓵' => '1',
            '⓶' => '2',
            '⓷' => '3',
            '⓸' => '4',
            '⓹' => '5',
            '⓺' => '6',
            '⓻' => '7',
            '⓼' => '8',
            '⓽' => '9',
            '⓾' => '10',
            '⓫' => '11',
            '⓬' => '12',
            '⓭' => '13',
            '⓮' => '14',
            '⓯' => '15',
            '⓰' => '16',
            '⓱' => '17',
            '⓲' => '18',
            '⓳' => '19',
            '⓴' => '20',
            '⓿' => '0',
        ];

        return strtr($key, $values);
    }
}
