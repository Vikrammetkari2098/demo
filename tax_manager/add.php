<?php echo $this->extend('layouts/default') ?>

<?php echo $this->section('content') ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <ol class="breadcrumb mb-0">
                         <li class="breadcrumb-item active"><a href="<?= base_url('tax-manager') ?>">Tax Manager</a></li>
                        <li class="breadcrumb-item">Add Tax Manager</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('tax-manager/save'); ?>" method="POST">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm w-50" id="name" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="code">Code <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm w-50" id="code" name="code" required>
                            </div>

                            <div class="form-group">
                                <label for="type">Type <span class="text-danger">*</span></label>
                                <select class="form-select w-50" id="type" name="type" required>
                                    <option value="">-- Select Type --</option>
                                    <option value="Percentage">Percentage</option>
                                    <option value="Fixed">Fixed</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="rate">Rate <span class="text-danger">*</span></label>
                                <input type="number" class="form-control form-control-sm w-50" id="rate" name="rate" step="0.01" required>
                            </div>

                            <div class="d-flex justify-content-start gap-2 mt-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="<?= base_url('tax-manager') ?>" class="btn btn-primary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection() ?>
