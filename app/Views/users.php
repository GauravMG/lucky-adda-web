<?= $this->extend('admin_template'); ?>

<?= $this->section('pageStyles'); ?>
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Users</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="dtUsersList" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Mobile</th>
                            <th>DOB</th>
                            <th>Resgistration Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="dataList">
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Full Name</th>
                            <th>Mobile</th>
                            <th>DOB</th>
                            <th>Resgistration Date</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<?= $this->endSection(); ?>

<?= $this->section('pageScripts'); ?>
<script src="<?= base_url('assets/adminlte/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>

<script>
    $(document).ready(function() {
        fetchUsers()
    })

    function initializeDTUsersList() {
        $("#dtUsersList").DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        })
    }

    function fetchUsers() {
        if ($.fn.DataTable.isDataTable("#dtUsersList")) {
            $('#dtUsersList').DataTable().destroy()
        }
        $.ajax({
            url: `https://impactadvisoryservices.com/v1/user/list`,
            method: 'POST',
            data: JSON.stringify({
                "filter": {
                    "roleId": 2
                },
                "range": {
                    "all": true
                },
                "sort": [{
                    "orderBy": "fullName",
                    "orderDir": "asc"
                }]
            }),
            contentType: 'application/json',
            headers: {
                'Authorization': `Bearer ${jwtToken}`
            },
            beforeSend: function() {
                loader.show()
            },
            complete: function() {},
            success: function(response) {
                if (response.success) {
                    var html = ""

                    for (let i = 0; i < response.data?.length; i++) {
                        html += `<tr>
                            <td>${response.data[i].fullName ?? ""}</td>
                            <td>${response.data[i].mobile}</td>
                            <td>${(response.data[i].dob ?? "").trim() !== "" ? formatDateWithoutTime(response.data[i].dob) : ""}</td>
                            <td>${formatDate(response.data[i].createdAt)}</td>
                            <td>
                                <div style="display: flex; justify-content: space-around;">
                                    <span onclick="onClickDeleteUser(${response.data[i].userId})"><i class="fa fa-trash view-icon"></i></span>
                                </div>
                            </td>
                        </tr>`
                    }

                    document.getElementById("dataList").innerHTML = html

                    initializeDTUsersList()
                }
                loader.hide()
            },
            error: function(xhr, status, error, message) {
                loader.hide()
                toastr.error("Something went wrong")
            }
        })
    }

    function onClickDeleteUser(userId) {
        if (confirm("Are you sure you want to delete this user?")) {
            $.ajax({
                url: `https://impactadvisoryservices.com/v1/user/delete`,
                method: 'POST',
                data: JSON.stringify({
                    userIds: [Number(userId)]
                }),
                contentType: 'application/json',
                headers: {
                    'Authorization': `Bearer ${jwtToken}`
                },
                beforeSend: function() {
                    loader.show()
                },
                complete: function() {
                    loader.hide()
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success("User deleted successfully!")
                        fetchUsers();
                    }
                },
                error: function(xhr, status, error, message) {
                    toastr.error("Something went wrong")
                }
            });
        }
    }
</script>
<?= $this->endSection(); ?>