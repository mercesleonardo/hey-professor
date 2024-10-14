<?php

use Illuminate\Contracts\Auth\Authenticatable;

function user(): ?Authenticatable
{
    if (auth()->check()) {
        return auth()->user();
    }

    return null;
}
