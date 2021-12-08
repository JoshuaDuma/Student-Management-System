<?php

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * A school may have many classrooms.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    ## ADD RELATIONSHIP
}
