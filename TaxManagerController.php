<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TaxManager_Model;

class TaxManagerController extends BaseController
{
    protected $TaxManager_Model;

    public function __construct()
    {
        $this->TaxManager_Model = new TaxManager_Model();
        helper('asset');
    }

    public function index()
    {
        $data['all'] = $this->TaxManager_Model->where('is_deleted', 0)->findAll();
        $action = __FUNCTION__;
        $page_title = 'Tax Manager';

        return view('tax_manager/index', compact('action', 'page_title', 'data'));
    }

    public function edit($id)
    {
        $data['tax_manager'] = $this->TaxManager_Model->find($id);

        if (!$data['tax_manager']) {
            return redirect()->to(base_url('tax-manager'))->with('status', 'Record not found');
        }

        $page_title = 'Edit Tax Manager';
        $action = 'edit';

        return view('tax_manager/edit', compact('data', 'page_title', 'action'));
    }

    public function save()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
            'code' => 'required',
            'type' => 'required',
            'rate' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('status', 'Validation failed');
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'code' => $this->request->getPost('code'),
            'type' => $this->request->getPost('type'),
            'rate' => $this->request->getPost('rate')
        ];

        if ($this->request->getPost('id')) {
            $id = $this->request->getPost('id');
            $this->TaxManager_Model->update($id, $data);
            return redirect()->to(base_url('tax-manager'))->with('status', 'Data successfully updated!');
        } else {
            $this->TaxManager_Model->insert($data);
            return redirect()->to(base_url('tax-manager'))->with('status', 'Data successfully saved!');
        }
    }

    public function add()
    {
        return view('tax_manager/add', ['action' => 'add']);
    }

    public function delete($id)
    {
        $result = $this->TaxManager_Model->softDelete($id);

        if ($result) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Record successfully soft-deleted']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete record']);
        }
    }
}
?>