<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repo extends Model
{
    protected $fillable = ['name', 'html_url', 'description', 'owner_login', 'stargazers_count','user_id'];
}
