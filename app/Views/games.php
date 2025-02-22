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
                <h3 class="card-title">All Games</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="dtGamesList" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Result Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="dataList">
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Result Time</th>
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

    function initializeDTGamesList() {
        $("#dtGamesList").DataTable({
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
        $.ajax({
            url: `https://impactadvisoryservices.com/v1/game/list`,
            method: 'POST',
            data: JSON.stringify({
                "filter": {},
                "range": {
                    "all": true
                },
                "sort": [{
                    "orderBy": "startTime",
                    "orderDir": "asc"
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
                            <td>${response.data[i].name}</td>
                            <td>${response.data[i].startTime}</td>
                            <td>${response.data[i].endTime}</td>
                            <td>${response.data[i].resultTime}</td>
                            <td>
                                <div style="display: flex; justify-content: space-around;">
                                    <span onclick="onClickViewGame(${response.data[i].gameId})"><i class="fa fa-view view-icon"></i></span>
                                </div>
                            </td>
                        </tr>`
                    }

                    document.getElementById("dataList").innerHTML = html

                    initializeDTGamesList()
                }
            },
            error: function(xhr, status, error, message) {
                alert("Something went wrong")
            }
        })
    }

    function onClickViewGame(gameId) {
        console.log(`gameId`, gameId)
    }
</script>
<?= $this->endSection(); ?>