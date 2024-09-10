<?php
namespace App\Models;
use CodeIgniter\Model;

class AccountType_Model extends Model
{
    protected $table = 'account_type';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title','code','is_deleted'];
    protected $validationRules = [
        'title' => 'required|string',  ];

}