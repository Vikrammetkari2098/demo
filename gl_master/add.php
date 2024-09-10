<?php echo $this->extend('layouts/default') ?>

<?php echo $this->section('content') ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active"><a href="<?= base_url('gl-master') ?>">GL Master</a></li>
                        <li class="breadcrumb-item">Add GL Master</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('gl-master/save'); ?>" method="POST">
                            <div class="form-group">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm w-50" id="title" name="title" required>
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control form-control-sm w-50" id="slug" name="slug">
                            </div>

                            <div class="form-group">
                                <label for="credit_code">Credit Code <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm w-50" id="credit_code" name="credit_code" required>
                            </div>

                            <div class="form-group">
                                <label for="debit_code">Debit Code</label>
                                <input type="text" class="form-control form-control-sm w-50" id="debit_code" name="debit_code">
                            </div>

                            <div class="d-flex justify-content-start gap-2 mt-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="<?= base_url('gl-master') ?>" class="btn btn-primary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection() ?>
