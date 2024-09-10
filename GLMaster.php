<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GLMasterModel;

class GLMaster extends BaseController
{
    protected $GLMasterModel;

    public function __construct()
    {
        $this->GLMasterModel = new GLMasterModel();
        helper('asset');
    }

    public function index()
    {
        $data['all'] = $this->GLMasterModel->where('is_deleted', 0)->findAll();
        $action = __FUNCTION__;
        $page_title = 'GLMaster';

        return view('gl_master/index', compact('action', 'page_title', 'data'));
    }

    public function edit($id)
    {
        $data['gl_master'] = $this->GLMasterModel->find($id);

        if (!$data['gl_master']) {
            return redirect()->to(base_url('gl-master'))->with('status', 'Record not found');
        }

        $page_title = 'Edit GL Master';
        $action = 'edit';

        return view('gl_master/form', compact('data', 'page_title', 'action'));
    }

   /* public function save()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'title' => 'required',
            'credit_code' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Validation failed']);
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'slug' => $this->request->getPost('slug'),
            'credit_code' => $this->request->getPost('credit_code'),
            'debit_code' => $this->request->getPost('debit_code')
        ];

        if ($this->request->getPost('id')) {
            $id = $this->request->getPost('id');
            $this->GLMasterModel->update($id, $data);
            return redirect()->to(base_url('gl-master'))->with('status', 'Data successfully updated!');
        } else {
            $this->GLMasterModel->insert($data);
            return redirect()->to(base_url('gl-master'))->with('status', 'Data successfully saved!');
        }
    }*/

    public function add()
    {
        return view('gl_master/add', ['action' => 'add']);
    }

    public function getData()
    {
        $data = $this->GLMasterModel->where('is_deleted', 0)->findAll();
        return $this->response->setJSON(['data' => $data]);
    }

    public function delete($id)
    {
        $data = ['is_deleted' => 1];

        if ($this->GLMasterModel->update($id, $data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Record successfully soft-deleted']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete record']);
        }
    }

public function save()
{
    $validation = \Config\Services::validation();
    $validation->setRules([
        'title' => 'required',
        'credit_code' => 'required'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        return redirect()->back()->withInput()->with('status', 'Validation failed');
    }

    $data = [
        'title' => $this->request->getPost('title'),
        'slug' => $this->request->getPost('slug'),
        'credit_code' => $this->request->getPost('credit_code'),
        'debit_code' => $this->request->getPost('debit_code')
    ];

    if ($this->request->getPost('id')) {
        $id = $this->request->getPost('id');
        $this->GLMasterModel->update($id, $data);
        return redirect()->to(base_url('gl-master'))->with('status', 'Data successfully updated!');
    } else {
        $this->GLMasterModel->insert($data);
        return redirect()->to(base_url('gl-master'))->with('status', 'Data successfully saved!');
    }
}


}
