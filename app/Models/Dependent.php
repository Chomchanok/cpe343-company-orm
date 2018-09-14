<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dependent';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'essn');
    }
}