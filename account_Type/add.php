    <?php echo $this->extend('layouts/default') ?>

    <?php echo $this->section('content') ?>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Account Type</h4>

                            <?php if (isset($validation)): ?>
                                <div class="alert alert-danger">
                                    <?= $validation->listErrors(); ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?= base_url('account-Type/store') ?>" method="POST">
                                <div class="row">
                                    <!-- Title Input -->
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control form-control-sm" id="title" name="title" value="<?= set_value('title'); ?>" required>
                                        </div>
                                    </div>

                                    <!-- Code Input -->
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="code">Code</label>
                                            <input type="text" class="form-control form-control-sm" id="code" name="code" value="<?= set_value('code'); ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="d-flex justify-content-start mt-3">
                                    <button type="submit" class="btn btn-primary btn-sm" style="margin-right: 10px;">Save</button>
                                    <a href="<?= base_url('account-Type') ?>" class="btn btn-primary btn-sm">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (session()->getFlashdata('status')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('status'); ?>
        </div>
    <?php endif; ?>
    <?php echo $this->endSection() ?>
