<?php echo $this->extend('layouts/default') ?>

<?php echo $this->section('content') ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active"><a href="<?= base_url('tax-manager') ?>">Tax Manager</a></li>
                        <li class="breadcrumb-item"><?= ($action == 'edit') ? 'Edit' : 'Add'; ?> Tax Manager</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('tax-manager/save') ?>" method="POST">
                            <!-- Hidden input for ID (used during editing) -->
                            <input type="hidden" name="id" value="<?= isset($data['tax_manager']['id']) ? esc($data['tax_manager']['id']) : ''; ?>">

                            <!-- Name Input -->
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm w-50" id="name" name="name" value="<?= isset($data['tax_manager']) ? esc($data['tax_manager']['name']) : ''; ?>" required style="border: 1px solid #ccc;">
                            </div>

                            <!-- Code Input -->
                            <div class="form-group">
                                <label for="code">Code <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm w-50" id="code" name="code" value="<?= isset($data['tax_manager']) ? esc($data['tax_manager']['code']) : ''; ?>" required style="border: 1px solid #ccc;">
                            </div>

                            <!-- Type Input (Dropdown for Fixed or Percentage) -->
                            <div class="form-group">
                                <label for="type">Type <span class="text-primary">*</span></label>
                                <select class="form-select w-50" id="type" name="type" required style="border: 1px solid #ccc;">
                                    <option value="">-- Select Type --</option>
                                    <option value="Percentage" <?= isset($data['tax_manager']['type']) && $data['tax_manager']['type'] == 'Percentage' ? 'selected' : ''; ?>>Percentage</option>
                                    <option value="Fixed" <?= isset($data['tax_manager']['type']) && $data['tax_manager']['type'] == 'Fixed' ? 'selected' : ''; ?>>Fixed</option>
                                </select>
                            </div>

                            <!-- Rate Input -->
                            <div class="form-group">
                                <label for="rate">Rate <span class="text-danger">*</span></label>
                                <input type="number" class="form-control form-control-sm w-50" id="rate" name="rate" step="0.01" value="<?= isset($data['tax_manager']) ? esc($data['tax_manager']['rate']) : ''; ?>" required style="border: 1px solid #ccc;">
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <div class="d-flex justify-content-start gap-2 mt-3">
                                <button type="submit" class="btn btn-primary"><?= ($action == 'edit') ? 'Save' : 'Save'; ?></button>
                                <a href="<?= base_url('tax-manager') ?>" class="btn btn-primary">Cancel</a>
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <!-- Include SweetAlert -->
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
 -->

<?php echo $this->endSection() ?>
