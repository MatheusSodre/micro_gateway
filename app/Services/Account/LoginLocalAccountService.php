<?php

namespace App\Services\Account;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response as HTTP;

final class LoginLocalAccountService
{
    protected string $email;
    protected string $password;
    public function execute(): string
    {
        if (!User::query()->where('email', strtolower($this->getEmail()))->exists()) {
            throw new Exception('User not found', HTTP::HTTP_NOT_FOUND);
        }
        if (!Auth::attempt(['email' => strtolower($this->getEmail()), 'password' => $this->getPassword()])) {
            throw new Exception('Password not match', HTTP::HTTP_FORBIDDEN);
        }
        return Auth::user()->createToken('Personal Access Token')->plainTextToken;
    }

    public function getEmail(): string
    {
        return Str::lower($this->email);
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }
}
