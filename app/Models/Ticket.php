<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $fillable = ['ticket_code','category','issue_type','system','platform'];
}
