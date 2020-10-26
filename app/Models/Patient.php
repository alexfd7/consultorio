<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cpf',
        'birthday'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'birthday',
    ];

    public function getBirthdayAttribute( $value ) {
      return (new Carbon($value))->format('d/m/Y');
    }  

    public function getCreatedAtAttribute( $value ) {
      return (new Carbon($value))->format('d/m/Y');
    }  

    public function appointments()
    {
        return $this->hasMany(\App\Models\Appointment::class);
    }
}
