<?php
namespace App\Models;

use CodeIgniter\Model;

class TaxManager_Model extends Model
{
    protected $table = 'taxes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'code', 'type', 'rate', 'is_deleted'];

    public function softDelete($id)
    {
        return $this->update($id, ['is_deleted' => 1]);
    }
}
?>