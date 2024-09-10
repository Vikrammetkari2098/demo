<?php echo $this->extend('layouts/default') ?>

<?php echo $this->section('content') ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Tax Manager</a></li>
                    </ol>
                    <a href="<?= base_url('tax-manager/add') ?>" class="btn btn-warning">+ Add</a>
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
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th>Type</th>
                                            <th>Rate</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($data['all'])) : ?>
                                            <?php $i = 1;
                                            foreach ($data['all'] as $item) : ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= esc($item['name']); ?></td>
                                                    <td><?= esc($item['code']); ?></td>
                                                    <td><?= esc($item['type']); ?></td>
                                                    <td><?= esc($item['rate']); ?></td>
                                                    <td>
                                                        <div class="">
                                                            <a href="<?= base_url('tax-manager/edit/' . $item['id']) ?>" class="btn btn-primary" title="Edit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>

                                                            <a href="<?= base_url('tax-manager/delete/' . $item['id']) ?>" class="btn btn-danger delete-btn" data-id="<?= $item['id'] ?>" title="Delete">
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
        let table = $('#userTable').DataTable();

        $('.delete-btn').on('click', function(e) {
            e.preventDefault();
            
            const url = $(this).attr('href');
            const row = $(this).closest('tr');
            
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
                    $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'success') {
                                Swal.fire('Deleted!', response.message, 'success');
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
</script>

<?php if (session()->getFlashdata('status')): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '<?= session()->getFlashdata('status') ?>',
        confirmButtonText: 'OK'
    }).then(function() {
        // Optionally redirect or perform other actions after the message is dismissed
        // window.location.href = '<?= base_url('tax-manager') ?>'; // Example redirect after message
    });
</script>
<?php endif; ?>


<?php echo $this->endSection() ?>
