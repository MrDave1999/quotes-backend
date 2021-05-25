<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $table = 'quotes';
    protected $fillable = [
        'client_name', 
        'issue',
        'observation',
        'target_date'
    ];
    public $timestamps = false;

    public function getTargetDateAttribute($value)
    {
        return date_format(date_create($value), 'Y-m-d H:i');
    }
}