<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{

    protected $table = 'oauth_clients';
    
    protected $fillable = [
        'name', 'secret', 'redirect', 'personal_access_client', 'password_client', 'revoked',
    ];
}
