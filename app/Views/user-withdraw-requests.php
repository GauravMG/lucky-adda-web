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
                <h3 class="card-title">User Withdraw Requests</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="dtUserWithdrawRequestsList" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Mobile</th>
                            <th>Amount</th>
                            <th>Withdraw Request Date</th>
                            <th>Updated Date</th>
                            <th>Remarks</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="dataList">
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Full Name</th>
                            <th>Mobile</th>
                            <th>Amount</th>
                            <th>Withdraw Request Date</th>
                            <th>Updated Date</th>
                            <th>Remarks</th>
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
        fetchUserWithdrawRequest()
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

    async function fetchUserWithdrawRequest() {
        if ($.fn.DataTable.isDataTable("#dtUserWithdrawRequestsList")) {
            $('#dtUserWithdrawRequestsList').DataTable().destroy()
        }

        await postAPICall({
            endPoint: "/wallet/list",
            payload: JSON.stringify({
                "filter": {
                    "approvalStatus": ["pending", "rejected"],
                    "transactionType": "debit"
                },
                "range": {
                    "all": true
                },
                "sort": [{
                    "orderBy": "walletId",
                    "orderDir": "desc"
                }]
            }),
            callbackComplete: () => {},
            callbackSuccess: (response) => {
                if (response.success) {
                    var html = ""

                    for (let i = 0; i < response.data?.length; i++) {
                        html += `<tr>
                            <td>${response.data[i].user.fullName ?? ""}</td>
                            <td>${response.data[i].user.mobile}</td>
                            <td>${response.data[i].amount}</td>
                            <td>${formatDate(response.data[i].createdAt)}</td>
                            <td>${(response.data[i].updatedAt ?? "").trim() !== "" ? formatDate(response.data[i].updatedAt) : ""}</td>
                            <td>${response.data[i].approvalRemarks ?? ""}</td>
                            <td>
                                <div style="display: flex; justify-content: space-around;">
                                    ${response.data[i].approvalStatus === "pending" ? `
                                    <span onclick="onClickUpdateApprovalStatus(${response.data[i].walletId}, 'approved')"><i class="fa fa-check view-icon"></i></span>
                                    <span onclick="onClickUpdateApprovalStatus(${response.data[i].walletId}, 'rejected')"><i class="fa fa-times view-icon"></i></span>
                                    ` : `<span style="color: ${response.data[i].approvalStatus === "approved" ? "green" : "red"}">${response.data[i].approvalStatus.toUpperCase()} </span>`}
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
                loader.hide()
            }
        })
    }

    async function onClickUpdateApprovalStatus(walletId, approvalStatus) {
        let approvalRemarks = "";

        // Ask for remarks if the status is 'rejected'
        if (approvalStatus === "rejected") {
            approvalRemarks = prompt("Please enter remarks for rejection:");

            // If user cancels or enters an empty remark, stop the process
            if (approvalRemarks === null || approvalRemarks.trim() === "") {
                toastr.error("Remarks are required for rejection!");
                return;
            }
        }

        if (confirm(`Are you sure you want to ${approvalStatus === "approved" ? "approve" : "reject"} this transaction?`)) {
            await postAPICall({
                endPoint: "/wallet/update",
                payload: JSON.stringify({
                    walletId,
                    approvalStatus,
                    approvalRemarks
                }),
                callbackSuccess: (response) => {
                    if (response.success) {
                        toastr.success(`Transaction ${approvalStatus}!`);
                        fetchUserWithdrawRequest();
                    }
                }
            })
        }
    }
</script>
<?= $this->endSection(); ?>