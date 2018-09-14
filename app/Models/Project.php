<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project';

    protected $primaryKey = 'pnumber';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function employees()
    {
        // TODO: add relation over here.
    }

    public function department()
    {
        // TODO: add relation over here.
    }
}