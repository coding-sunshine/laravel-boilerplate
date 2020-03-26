<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\Concerns\HasSchemalessAttributes;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Concerns\ScoutSearch;


class User extends Authenticatable
{
    use HasApiTokens, HasRoles, HasSchemalessAttributes, LogsActivity, Notifiable, ScoutSearch;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes whose changes are logged
     *
     * @var array
     */
    protected static $logAttributes = [
        'name', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be searchable.
     *
     * @var array
     */
    protected $searchable = [
        'name',
        'email',
    ];
}
