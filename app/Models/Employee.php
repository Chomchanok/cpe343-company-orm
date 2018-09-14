<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employee';

    protected $primaryKey = 'ssn';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function department()
    {
        return $this->belongsTo('App\Models\Department', 'dno');
    }

    public function dependents()
    {
        return $this->hasMany('App\Models\Dependent', 'essn');
    }

    public function supervisor()
    {
        // TODO: add relation over here.
    }

    public function supervisees()
    {
        // TODO: add relation over here.
    }

    public function manager()
    {
        // TODO: add relation over here.
    }

    public function projects()
    {
        return $this->belongsToMany('App\Models\Project', 'works_on', 'essn', 'pno');
    }
}