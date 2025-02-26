<?= $this->extend('admin_template'); ?>

<?= $this->section('pageStyles'); ?>
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Personal Details</h3>
                        <span id="leadCreatedAt" style="float: right; font-size: 12px;"></span>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="fullName" placeholder="Enter full name" readonly>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="status">Mobile</label>
                                <input type="text" class="form-control" id="mobile" placeholder="Enter mobile" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="source">DOB</label>
                                <input type="text" class="form-control" id="dob" placeholder="Enter dob" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">UPI Details</h3>
                        <span id="leadCreatedAt" style="float: right; font-size: 12px;"></span>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="upiName" placeholder="Enter UPI name" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">UPI ID</label>
                            <input type="text" class="form-control" id="upiID" placeholder="Enter UPI ID" readonly>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Bank Account Details</h3>
                        <span id="leadCreatedAt" style="float: right; font-size: 12px;"></span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Beneficiary Name</label>
                                <input type="text" class="form-control" id="beneficiaryName" placeholder="Enter beneficiary name" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Account Number</label>
                                <input type="text" class="form-control" id="accountNumber" placeholder="Enter account number" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Bank Name</label>
                                <input type="text" class="form-control" id="bankName" placeholder="Enter bank name" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">IFSC Code</label>
                                <input type="text" class="form-control" id="ifscCode" placeholder="Enter IFSC code" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User Withdraw Requests</h3>
                        <span id="leadCreatedAt" style="float: right; font-size: 12px;"></span>
                    </div>
                    <div class="card-body">
                        <table id="dtUserWithdrawRequestsList" class="table table-bordered table-hover">
                            <thead>
                                <tr>
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
                                    <th>Amount</th>
                                    <th>Withdraw Request Date</th>
                                    <th>Updated Date</th>
                                    <th>Remarks</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
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
        const userId = Number('<?php echo $data["userId"]; ?>')

        $(document).ready(function() {
            fetchUsers()
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

        async function fetchUsers() {
            if ($.fn.DataTable.isDataTable("#dtUserWithdrawRequestsList")) {
                $('#dtUserWithdrawRequestsList').DataTable().destroy()
            }

            await Promise.all([
                postAPICall({
                    endPoint: "/user/list",
                    payload: JSON.stringify({
                        "filter": {
                            userId
                        }
                    }),
                    callbackComplete: () => {},
                    callbackSuccess: (response) => {
                        if (response.success) {
                            const data = response.data[0]

                            document.getElementById("fullName").value = data.fullName
                            document.getElementById("mobile").value = data.mobile
                            document.getElementById("dob").value = formatDateWithoutTime(data.dob)
                        }
                        loader.hide()
                    }
                }),

                postAPICall({
                    endPoint: "/user-bank-detail/list",
                    payload: JSON.stringify({
                        "filter": {
                            userId
                        }
                    }),
                    callbackComplete: () => {},
                    callbackSuccess: (response) => {
                        if (response.success) {
                            for (let i = 0; i < response.data?.length; i++) {
                                const data = response.data[i]

                                switch (data.accountType) {
                                    case "upi":
                                        document.getElementById("upiName").value = data.accountHolderName
                                        document.getElementById("upiID").value = data.accountNumber

                                        break

                                    case "bank_saving":
                                        document.getElementById("beneficiaryName").value = data.accountHolderName
                                        document.getElementById("accountNumber").value = data.accountNumber
                                        document.getElementById("bankName").value = data.bankName
                                        document.getElementById("ifscCode").value = data.ifscCode

                                        break
                                }
                            }
                        }
                        loader.hide()
                    }
                }),

                postAPICall({
                    endPoint: "/wallet/list",
                    payload: JSON.stringify({
                        filter: {
                            userId,
                        },
                        range: {
                            all: true,
                        },
                        sort: [{
                            orderBy: 'walletId',
                            orderDir: 'asc',
                        }],
                    }),
                    callbackComplete: () => {},
                    callbackSuccess: (response) => {
                        if (response.success) {
                            var html = ""

                            for (let i = 0; i < response.data?.length; i++) {
                                html += `<tr>
                                    <td>₹ ${response.data[i].amount}</td>
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
                }),
            ])
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