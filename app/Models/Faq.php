<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['category','issue_type','system','platform','response_text','reset_url','requires_ticket'];
}
