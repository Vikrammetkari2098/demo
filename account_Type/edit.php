    <?php echo $this->extend('layouts/default') ?>

    <?php echo $this->section('content') ?>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Account Type</h4>

                            <form action="<?= base_url('account-Type/update/' . $accountType['id']) ?>" method="POST">
                                <div class="row">
                                    <!-- Title Input -->
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control form-control-sm" id="title" name="title" value="<?= esc($accountType['title']); ?>" required>
                                        </div>
                                    </div>

                                    <!-- Code Input -->
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="code">Code</label>
                                            <input type="text" class="form-control form-control-sm" id="code" name="code" value="<?= esc($accountType['code']); ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="d-flex justify-content-start mt-3">
                                    <button type="submit" class="btn btn-primary btn-sm" style="margin-right: 10px;">Save</button> <!-- 10px gap added here -->
                                    <a href="<?= base_url('account-Type') ?>" class="btn btn-primary btn-sm">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $this->endSection() ?>
