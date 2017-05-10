<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class WorkflowRecord extends Model
{
    protected $table = 'wf_records';
    protected $fillable = [
        'user_id',
        'wf_step_id',
        'eco_com_id'
        'ret_fun_id',
        'message'
    ];

    protected $guarded = ['id'];
}
