<?php

namespace App\Http\Requests\Auth;

use App\Models\Admin;
use App\Models\CustomerUser;
use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(string $role): void
    {
        $this->ensureIsNotRateLimited();


        if ($role == 'admin') {

            $user =    Admin::firstWhere([
                'email' => $this->input('email'),
            ]);

            if (!$user || !Hash::check($this->input('password'), $user->password) || !$user->hasRole('super-admin'))
                $this->throwError();

            Auth::guard('admin')->login($user, $this->boolean('remember'));
        }


        if ($role == 'customer') {

            $user =    CustomerUser::firstWhere([
                'email' => $this->input('email'),
            ]);

            if (!$user || !Hash::check($this->input('password'), $user->password))
                $this->throwError();

            Auth::guard('customer')->login($user, true);
        }





        // if (!$user->hasRole($role))
        //     $this->throwError();


        RateLimiter::clear($this->throttleKey());
    }



    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }


    private function throwError()
    {
        RateLimiter::hit($this->throttleKey());
        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }


    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('email')) . '|' . $this->ip());
    }
}
