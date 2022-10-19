<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentAttachment extends Model
{
    protected $table = 'parent_attachments';
    public $timestamps = false;

    protected $fillable=['file_name,parent_id'];
}
