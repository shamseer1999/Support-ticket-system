<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable=['title','message','priority','user_id'];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'ticket_categories');
    }

    public function labels()
    {
        return $this->belongsToMany(Label::class,'ticket_labels');
    }
}
