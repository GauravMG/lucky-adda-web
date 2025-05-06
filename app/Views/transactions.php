<?= $this->extend('admin_template'); ?>

<?= $this->section('pageStyles'); ?>
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">

<style>
    .red {
        color: red;
    }

    .green {
        color: green;
    }

    .image-icon {
        cursor: pointer;
        font-size: 24px;
        /* Increase icon size */
        color: #343a40;
        /* Set icon color */
        margin-left: 10px;
    }

    .image-icon:hover {
        color: #535c65;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Transactions</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="dtUserWithdrawRequestsList" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>S. No.</th>
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
                            <th>S. No.</th>
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

    <!-- Modal for Remarks and File Upload -->
    <div class="modal fade" id="remarksModal" tabindex="-1" role="dialog" aria-labelledby="remarksModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="remarksModalLabel">Rejection Remarks</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="walletIdInput">
                    <textarea id="remarksInput" class="form-control" placeholder="Enter remarks..." required></textarea>
                    <br>
                    <label for="imageInput">Upload Image (Optional):</label>
                    <input type="file" id="imageInput" class="form-control" accept="image/*">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="submitRejection()">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="imagePreviewModal" tabindex="-1" role="dialog" aria-labelledby="imagePreviewModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imagePreviewModalLabel">Image Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img id="previewImage" src="" class="img-fluid" style="max-width: 100%;" />
                </div>
            </div>
        </div>
    </div>
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
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        })
    }

    function showImage(imageUrl) {
        $("#previewImage").attr("src", imageUrl);
        $("#imagePreviewModal").modal("show");
    }

    async function fetchUserWithdrawRequest() {
        if ($.fn.DataTable.isDataTable("#dtUserWithdrawRequestsList")) {
            $('#dtUserWithdrawRequestsList').DataTable().destroy()
        }

        await postAPICall({
            endPoint: "/wallet/list",
            payload: JSON.stringify({
                "filter": {
                    // "approvalStatus": ["pending", "rejected"],
                    // "transactionType": "debit"
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
                            <td>${i + 1}</td>
                            <td>${response.data[i].user?.fullName ?? ""}</td>
                            <td>${response.data[i].user?.mobile ?? ""}</td>
                            <td>${response.data[i].amount}</td>
                            <td>${formatDate(response.data[i].createdAt)}</td>
                            <td>${(response.data[i].updatedAt ?? "").trim() !== "" ? formatDate(response.data[i].updatedAt) : ""}</td>
                            <td>
                                <div style="display: flex; justify-content: space-between;">
                                    <span>${response.data[i].approvalRemarks ?? ""}</span>
                                    ${(response.data[i].imageUrl ?? "").trim() !== "" ? `
                                        <span onclick="showImage('${response.data[i].imageUrl}')">
                                            <i class="fa fa-image view-icon image-icon"></i>
                                        </span>
                                    ` : ""}
                                </div>
                            </td>
                            <td>
                                <div style="display: flex; justify-content: space-around;">
                                    ${response.data[i].approvalStatus === "pending" ? `
                                    <span class="green" onclick="onClickUpdateApprovalStatus(${response.data[i].walletId}, 'approved')"><i class="fa fa-check view-icon"></i></span>
                                    <span class="red" onclick="onClickUpdateApprovalStatus(${response.data[i].walletId}, 'rejected')"><i class="fa fa-times view-icon"></i></span>
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
        // Ask for remarks if the status is 'rejected'
        if (approvalStatus === "rejected") {
            $("#walletIdInput").val(walletId);
            $("#remarksInput").val("");
            $("#imageInput").val("");
            $("#remarksModal").modal("show");
        } else {
            processApproval(walletId, approvalStatus)
        }
    }

    async function submitRejection() {
        const walletId = $("#walletIdInput").val();
        const approvalRemarks = $("#remarksInput").val();
        const fileInput = document.getElementById("imageInput");

        let additionalPayload = {}

        if (!approvalRemarks.trim()) {
            toastr.error("Remarks are required for rejection!");
            return;
        }

        additionalPayload = {
            ...additionalPayload,
            approvalRemarks
        }

        if (fileInput.files.length > 0) {
            const imageUrl = await uploadImage(fileInput.files[0]);
            additionalPayload = {
                ...additionalPayload,
                imageUrl
            }
        }

        processApproval(walletId, "rejected", additionalPayload)
    }

    async function processApproval(walletId, approvalStatus, additionalPayload = {}) {
        if (confirm(`Are you sure you want to ${approvalStatus === "approved" ? "approve" : "reject"} this transaction?`)) {
            await postAPICall({
                endPoint: "/wallet/update",
                payload: JSON.stringify({
                    walletId: parseInt(walletId),
                    approvalStatus,
                    ...additionalPayload
                }),
                callbackSuccess: (response) => {
                    if (response.success) {
                        toastr.success(`Transaction ${approvalStatus}!`);

                        if (approvalStatus === "rejected") {
                            $("#remarksModal").modal("hide");
                        }

                        fetchUserWithdrawRequest();
                    }
                }
            })
        }
    }
</script>
<?= $this->endSection(); ?>