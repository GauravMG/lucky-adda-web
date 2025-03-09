<?= $this->extend('admin_template'); ?>

<?= $this->section('pageStyles'); ?>
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('headerButtons'); ?>
<div class="col-md-5 offset-md-7">
    <a href="/games/add"><button type="button" class="btn btn-primary">Add New Game</button></a>
</div>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card card-dark">
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

<script>
    $(document).ready(function() {
        fetchGames()
    })

    function initializeDTGamesList() {
        $("#dtGamesList").DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        })
    }

    function compareTime(currentTime, otherTime) {
        // Convert "HH:mm" to total minutes
        const getMinutes = (time) => {
            const [hours, minutes] = time.split(':').map(Number);
            return hours * 60 + minutes;
        };

        const currentMinutes = getMinutes(currentTime);
        const otherMinutes = getMinutes(otherTime);

        if (currentMinutes > otherMinutes) {
            console.log(`${currentTime} is later than ${otherTime}`);
            return true
        } else if (currentMinutes < otherMinutes) {
            console.log(`${currentTime} is earlier than ${otherTime}`);
            return false
        } else {
            return true
            console.log(`${currentTime} is the same as ${otherTime}`);
        }
    }

    async function fetchGames() {
        if ($.fn.DataTable.isDataTable("#dtGamesList")) {
            $('#dtGamesList').DataTable().destroy()
        }

        await postAPICall({
            endPoint: "/game/list",
            payload: JSON.stringify({
                "filter": {},
                "range": {
                    "all": true
                },
                "sort": [{
                    "orderBy": "startTime",
                    "orderDir": "asc"
                }]
            }),
            callbackComplete: () => {},
            callbackSuccess: (response) => {
                if (response.success) {
                    var html = ""

                    const now = new Date();
                    const hours = String(now.getHours()).padStart(2, '0'); // Get hours and pad with leading zero if necessary
                    const minutes = String(now.getMinutes()).padStart(2, '0'); // Get minutes and pad with leading zero if necessary
                    const currentTime = `${hours}:${minutes}`;

                    for (let i = 0; i < response.data?.length; i++) {
                        html += `<tr>
                            <td>${response.data[i].name}</td>
                            <td>${response.data[i].startTime}</td>
                            <td>${response.data[i].endTime}</td>
                            <td>${response.data[i].resultTime}</td>
                            <td>
                                <div style="display: flex; justify-content: space-around;">
                                    ${compareTime(currentTime, response.data[i].resultTime)  ? `<!-- <span onclick="onClickViewGame(${response.data[i].gameId})"><i class="fa fa-bullhorn view-icon"></i></span> -->` : "<!-- <span>&nbsp;&nbsp;&nbsp;&nbsp;</span> -->"}
                                    <span onclick="onClickViewGame(${response.data[i].gameId})"><i class="fa fa-bullhorn view-icon"></i></span>
                                    <span onclick="onClickViewGameResultChart(${response.data[i].gameId})"><i class="fa fa-file-alt view-icon"></i></span>
                                    <span onclick="onClickDeleteGame(${response.data[i].gameId})"><i class="fa fa-trash view-icon"></i></span>
                                </div>
                            </td>
                        </tr>`
                    }

                    document.getElementById("dataList").innerHTML = html

                    initializeDTGamesList()
                }
                loader.hide()
            }
        })
    }

    function onClickViewGame(gameId) {
        window.location.href = `/games/anounce-result/${gameId}`
    }

    function onClickViewGameResultChart(gameId) {
        window.location.href = `/games/result-chart/${gameId}`
    }

    async function onClickDeleteGame(gameId) {
        if (confirm("Are you sure you want to delete this game?")) {
            await postAPICall({
                endPoint: "/game/delete",
                payload: JSON.stringify({
                    gameIds: [Number(gameId)]
                }),
                callbackSuccess: (response) => {
                    if (response.success) {
                        toastr.success("Game deleted successfully!")
                        fetchGames();
                    }
                }
            })
        }
    }
</script>
<?= $this->endSection(); ?>