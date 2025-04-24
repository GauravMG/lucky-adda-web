<?= $this->extend('admin_template'); ?>

<?= $this->section('pageStyles'); ?>
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">

<style>
    .logo {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">All Bets Placed By Users <?php if (isset($data["number"])) {
                                                                    echo " On Number - " . $data["number"];
                                                                } ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="dtList" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Mobile</th>
                            <th <?php if (isset($data["number"])) {
                                    echo 'style="display: none;"';
                                } ?>>Number</th>
                            <th>Bet Amount</th>
                        </tr>
                    </thead>
                    <tbody id="dataList">
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Full Name</th>
                            <th>Mobile</th>
                            <th <?php if (isset($data["number"])) {
                                    echo 'style="display: none;"';
                                } ?>>Number</th>
                            <th>Bet Amount</th>
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
    let gameId = '<?= $data["gameId"] ?? ""; ?>'
    if ((gameId ?? "").toString().trim() !== "" && !["undefined", "null"].includes(gameId)) {
        gameId = parseInt(gameId.toString())
    } else {
        gameId = null
    }

    let number = '<?= $data["number"] ?? ""; ?>'
    if ((number ?? "").toString().trim() !== "" && !["undefined", "null"].includes(number)) {
        number = number.toString()
    } else {
        number = null
    }

    $(document).ready(function() {
        fetchBetsByUsers()
    })

    function initializeDTList() {
        $("#dtList").DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        })
    }

    async function fetchBetsByUsers() {
        if ($.fn.DataTable.isDataTable("#dtList")) {
            $('#dtList').DataTable().destroy()
        }

        let payload = {
            filter: {
                gameId
            }
        }
        if (number) {
            payload.filter = {
                ...payload.filter,
                number
            }
        }

        await postAPICall({
            endPoint: "/report/bets-by-users",
            payload: JSON.stringify(payload),
            callbackComplete: () => {},
            callbackSuccess: (response) => {
                if (response.success) {
                    var html = ""

                    for (let i = 0; i < response.data?.length; i++) {
                        let item = response.data[i]

                        html += `<tr>
                            <td>${item.userFullName}</td>
                            <td>${item.userMobile}</td>
                            <td>${item.betNumber}</td>
                            <td>₹ ${item.betAmount}</td>
                        </tr>`
                    }

                    document.getElementById("dataList").innerHTML = html

                    initializeDTList()
                }
                loader.hide()
            }
        })
    }
</script>
<?= $this->endSection(); ?>