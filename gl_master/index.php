    <?php echo $this->extend('layouts/default') ?>

    <?php echo $this->section('content') ?>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">GL Master</a></li>
                        </ol>
                        <a href="<?= base_url('gl-master/add') ?>" class="btn btn-warning">+ Add</a>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="my-post-content pt-3">
                                <div class="table-responsive">
                                    <table id="userTable" class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Credit Code</th>
                                                <th>Debit Code</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($data['all'])) : ?>
                                                <?php $i = 1;
                                                foreach ($data['all'] as $item) : ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><?= esc($item['title']); ?></td>
                                                        <td><?= esc($item['credit_code']); ?></td>
                                                        <td><?= esc($item['debit_code']); ?></td>
                                                        <td>
                                                            <div class="">
                                                                <a href="<?= base_url('gl-master/edit/' . $item['id']) ?>" class="btn    btn-primary"   title="Edit">
                                                                 <i class="fa fa-edit"></i>
                                                                                 </a>

                                                                <a href="<?= base_url('gl-master/delete/' . $item['id']) ?>" class="btn btn-primary delete-btn" data-id="<?= $item['id'] ?>" title="<?= 'Delete'; ?>">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php $i++;
                                                endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="6">No data available</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
     $(document).ready(function() {
        // Initialize DataTable
        let table = $('#userTable').DataTable();

        // Handle delete button click event
        document.querySelectorAll('.delete-btn').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent default link behavior

                const url = this.href; // Get the href of the link
                const row = $(this).closest('tr'); // Get the row of the clicked button

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Send the Ajax request to perform the soft delete
                        $.ajax({
                            url: url,
                            type: 'POST',
                            dataType: 'json',
                            success: function(response) {
                                if (response.status === 'success') {
                                    Swal.fire(
                                        'Deleted!',
                                        response.message,
                                        'success'
                                    );
                                    // Remove the row from the DataTable
                                    table.row(row).remove().draw();
                                } else {
                                    Swal.fire('Error!', response.message, 'error');
                                }
                            },
                            error: function() {
                                Swal.fire('Error!', 'Failed to delete the record.', 'error');
                            }
                        });
                    }
                });
            });
        });
    });


    </script>

<?php if (session()->getFlashdata('status')): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '<?= session()->getFlashdata('status') ?>',
        confirmButtonText: 'OK'
    }).then(function() {
        // Redirect or perform other actions if needed
        window.location.href = '<?= base_url('gl-master') ?>'; // Example redirect after message
    });
</script>

<?php endif; ?>

    <?php echo $this->endSection() ?>
