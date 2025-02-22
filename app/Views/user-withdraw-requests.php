<?= $this->extend('admin_template'); ?>

<?= $this->section('pageStyles'); ?>
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('css/common.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User Withdraw Requests</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="dtUserWithdrawRequestsList" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Mobile</th>
                            <th>Amount</th>
                            <th>Withdraw Request Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="dataList">
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Mobile</th>
                            <th>Amount</th>
                            <th>Withdraw Request Date</th>
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
<script src="<?= base_url('js/common.js') . '?t=' . time(); ?>"></script>
<script>
    $(document).ready(function() {
        fetchGames()
    })

    function initializeDTUserWithdrawRequestsList() {
        $("#dtUserWithdrawRequestsList").DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        })
    }

    function fetchGames() {
        if ($.fn.DataTable.isDataTable("#dtUserWithdrawRequestsList")) {
            $('#dtUserWithdrawRequestsList').DataTable().destroy()
        }
        $.ajax({
            url: `https://impactadvisoryservices.com/v1/wallet/list`,
            method: 'POST',
            data: JSON.stringify({
                "filter": {
                    "approvalStatus": ["pending"]
                },
                "range": {
                    "all": true
                },
                "sort": [{
                    "orderBy": "walletId",
                    "orderDir": "desc"
                }]
            }),
            contentType: 'application/json',
            headers: {
                'Authorization': `Bearer ${jwtToken}`
            },
            beforeSend: function() {},
            complete: function() {},
            success: function(response) {
                if (response.success) {
                    var html = ""

                    for (let i = 0; i < response.data?.length; i++) {
                        html += `<tr>
                            <td>${response.data[i].user.mobile}</td>
                            <td>${response.data[i].amount}</td>
                            <td>${formatDate(response.data[i].createdAt)}</td>
                            <td>
                                <div style="display: flex; justify-content: space-around;">
                                    <span onclick="onClickUpdateApprovalStatus(${response.data[i].walletId}, 'approved')"><i class="fa fa-check view-icon"></i></span>
                                    <span onclick="onClickUpdateApprovalStatus(${response.data[i].walletId}, 'rejected')"><i class="fa fa-times view-icon"></i></span>
                                </div>
                            </td>
                        </tr>`
                    }

                    document.getElementById("dataList").innerHTML = html

                    if ($.fn.DataTable.isDataTable("#dtUserWithdrawRequestsList")) {
                        $('#dtUserWithdrawRequestsList').DataTable().destroy()
                    }
                    initializeDTUserWithdrawRequestsList()
                }
            },
            error: function(xhr, status, error, message) {
                alert("Something went wrong")
            }
        })
    }

    function onClickUpdateApprovalStatus(walletId, approvalStatus) {
        $.ajax({
            url: `https://impactadvisoryservices.com/v1/wallet/update`,
            method: 'POST',
            data: JSON.stringify({
                walletId,
                approvalStatus
            }),
            contentType: 'application/json',
            headers: {
                'Authorization': `Bearer ${jwtToken}`
            },
            beforeSend: function() {},
            complete: function() {},
            success: function(response) {
                if (response.success) {
                    alert(response.message)
                    fetchGames()
                }
            },
            error: function(xhr, status, error, message) {
                alert("Something went wrong")
            }
        })
    }
</script>
<?= $this->endSection(); ?>