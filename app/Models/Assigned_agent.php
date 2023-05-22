<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assigned_agent extends Model
{
    use HasFactory;

    protected $table="assigned_agents";

    protected $fillable=[
        'ticket_id','agent_id','assigned_by'
    ];
}
