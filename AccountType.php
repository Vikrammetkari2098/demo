<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccountType_Model;

class AccountType extends BaseController
{
    protected $AccountType_Model;

    public function __construct()
    {
        $this->AccountType_Model = new AccountType_Model();
        helper('asset');
    }

    public function index()
    {
        $data['all'] = $this->AccountType_Model->where('is_deleted', 0)->findAll();
        $action = __FUNCTION__;
        $page_title = 'Account Type';

        return view('account_type/index', compact('action', 'page_title', 'data'));
    }
         //edit
    public function edit($id)
    {
        $accountType = $this->AccountType_Model->find($id);
        if (!$accountType) {
            return redirect()->to('/account-Type')->with('error', 'Account Type not found');
        }

        return view('account_type/edit', ['accountType' => $accountType]);
    }
           //update
    public function update($id)
    {
        $validation = $this->validate([
            'title' => 'required',
            'code'  => 'required'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->AccountType_Model->update($id, [
            'title' => $this->request->getPost('title'),
            'code'  => $this->request->getPost('code')
        ]);

        return redirect()->to('/account-Type')->with('success', 'Account Type updated successfully.');
    }
          //add
    public function add()
    {
        helper('form');
        return view('account_type/add');
    }
           //store
    public function store()
    {
        helper('form');

        $validationRules = [
            'title' => 'required|min_length[3]',
            'code'  => 'required|min_length[2]',
        ];

        if ($this->validate($validationRules)) {
            $data = [
                'title' => $this->request->getPost('title'),
                'code'  => $this->request->getPost('code'),
            ];

            $this->AccountType_Model->insert($data);

            return redirect()->to(base_url('account-Type'))->with('status', 'Account type added successfully.');
        } else {
            return view('account_type/add', ['validation' => $this->validator]);
        }
    }
         //delete
    public function delete($id)
    {
        $data = ['is_deleted' => 1];

        if ($this->AccountType_Model->update($id, $data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Record successfully soft-deleted']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete record']);
        }
    }
}
