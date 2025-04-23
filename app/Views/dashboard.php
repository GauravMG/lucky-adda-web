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

    .widget-user-header {
        display: flex !important;
        align-items: center !important;
    }

    .widget-user-username {
        margin-left: 10px !important;
    }

    .badge {
        font-size: 16px !important;
    }

    .description-header {
        font-size: 22px !important;
    }

    .description-text {
        font-size: 14px !important;
    }

    .bet-details-item-container {
        border: unset !important;
    }

    .no-style-link {
        text-decoration: none;
        color: black;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-3">
        <div class="card card-widget widget-user-2 shadow">
            <div class="widget-user-header bg-warning">
                <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="https://lucky-adda.com/api/app-logo.png"
                        alt="User Avatar">
                </div>

                <h3 class="widget-user-username">Game 1</h3>
            </div>
            <div class="card-footer p-0">
                <ul class="nav flex-column border-bottom">
                    <li class="nav-item bet-details-item-container">
                        <a class="nav-link no-style-link">
                            Total Bet Amount <span class="float-right badge bg-primary">₹ 31</span>
                        </a>
                    </li>
                    <li class="nav-item bet-details-item-container">
                        <a class="nav-link no-style-link">
                            Total Winnings <span class="float-right badge bg-info">₹ 5</span>
                        </a>
                    </li>
                    <li class="nav-item bet-details-item-container">
                        <a class="nav-link no-style-link">
                            Overall Profit <span class="float-right badge bg-success">₹ 12</span>
                        </a>
                    </li>
                </ul>

                <div class="row border-bottom">
                    <div class="col-sm-6 border-right">
                        <a href="/report/bets-by-users?gameId=1&number=05" class="no-style-link">
                            <div class="description-block">
                                <h5 class="description-header">05</h5>
                                <span class="description-text">Winning Number <i class="fas fa-arrow-circle-right"></i></span>
                            </div>
                        </a>

                    </div>

                    <div class="col-sm-6">
                        <a href="/report/bets-by-users?gameId=1&number=33" class="no-style-link">
                            <div class="description-block">
                                <h5 class="description-header">33</h5>
                                <span class="description-text">Max Bet Amount Placed On <i class="fas fa-arrow-circle-right"></i></span>
                            </div>
                        </a>

                    </div>

                </div>

                <div class="col-12 mt-2">
                    <div class="small-box bg-info mb-2">
                        <a href="/report/bets-by-numbers?gameId=1" class="small-box-footer">
                            View analytics for all numbers <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-12">
                    <div class="small-box bg-info mb-3">
                        <a href="/report/bets-by-users?gameId=1" class="small-box-footer">
                            View analytics for all users <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
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
        // fetchGames()
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
            return true
        } else if (currentMinutes < otherMinutes) {
            return false
        } else {
            return true
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
                            <td><img class="logo" src="${response.data[i].logo}" alt="${response.data[i].name}" /></td>
                            <td>${response.data[i].name}</td>
                            <td>${response.data[i].startTime}</td>
                            <td>${response.data[i].endTime}</td>
                            <td>${response.data[i].resultTime}</td>
                            <td>
                                <div style="display: flex; justify-content: space-around;">
                                    ${compareTime(currentTime, response.data[i].resultTime)  ? `<!-- <span onclick="onClickViewGame(${response.data[i].gameId})"><i class="fa fa-bullhorn view-icon"></i></span> -->` : "<!-- <span>&nbsp;&nbsp;&nbsp;&nbsp;</span> -->"}
                                    <span onclick="onClickViewGame(${response.data[i].gameId})"><i class="fa fa-bullhorn view-icon"></i></span>
                                    <span onclick="onClickViewGameResultChart(${response.data[i].gameId})"><i class="fa fa-file-alt view-icon"></i></span>
                                    <span onclick="onClickEditGame(${response.data[i].gameId})"><i class="fa fa-edit view-icon"></i></span>
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

    function onClickEditGame(gameId) {
        window.location.href = `/games/edit/${gameId}`
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