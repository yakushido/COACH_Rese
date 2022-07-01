<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'detail',
        'picture',
        'area_id',
        'genre_id'
    ];

    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }
    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }

    public function reservations()
    {
        return $this->hasMany('App\Models\Reservation');
    }

    public function favorites()
    {
        return $this->hasMany('App\Models\Favorite');
    }

    public function owners()
    {
        return $this->hasMany('App\Models\Owner');
    }

    public function is_liked_by_auth_user()
    {
        $id = Auth::id();

        $likers = array();
        
        foreach($this->favorites as $favorite) {
            array_push($likers, $favorite->user_id);
        }

        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }
}
