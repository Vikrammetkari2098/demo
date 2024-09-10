<?php
namespace App\Models;
use CodeIgniter\Model;

class GLMasterModel extends Model
{
    protected $table = 'gl_master';
    protected $primaryKey = 'id';
    protected $allowedFields = ['slug','title','credit_code','debit_code','is_deleted'];
    protected $validationRules = [
        'title' => 'required|string', 
    ];

}