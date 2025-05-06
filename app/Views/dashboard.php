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
<div class="row" id="gameStatsContainer">
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
        fetchGameStats()
    })

    async function fetchGameStats() {
        await postAPICall({
            endPoint: "/report/games-stats",
            payload: {},
            callbackComplete: () => {},
            callbackSuccess: (response) => {
                if (response.success) {
                    var html = ""

                    for (let i = 0; i < response.data?.length; i++) {
                        let item = response.data[i]

                        html += `<div class="col-md-3">
                            <div class="card card-widget widget-user-2 shadow border border-dark">
                                <div class="widget-user-header bg-dark">
                                    <div class="widget-user-image">
                                        <img class="img-circle elevation-2" src="${item.logo}"
                                            alt="${item.gameName}">
                                    </div>

                                    <h3 class="widget-user-username">${item.gameName}</h3>
                                </div>
                                <div class="card-footer p-0">
                                    <ul class="nav flex-column border-bottom">
                                        <li class="nav-item bet-details-item-container">
                                            <a class="nav-link no-style-link">
                                                Total Bet Amount <span class="float-right badge bg-primary">₹ ${item.totalBetAmount}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item bet-details-item-container">
                                            <a class="nav-link no-style-link">
                                                Total Winnings <span class="float-right badge bg-info">₹ ${item.totalWinningAmount}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item bet-details-item-container">
                                            <a class="nav-link no-style-link">
                                                Overall Profit/Loss <span class="float-right badge${item.totalProfit.toString().includes("-") ? " bg-danger" : " bg-success"}">₹ ${item.totalProfit}</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="row border-bottom">
                                        <div class="col-sm-6 border-right">
                                            ${(item.resultNumber ?? "").toString().trim() !== "" ? `<a href="/report/bets-by-users?gameId=${item.gameId}&number=${item.resultNumber}" class="no-style-link">` : ""}
                                                <div class="description-block">
                                                    <h5 class="description-header">${(item.resultNumber ?? "").toString().trim() !== "" ? item.resultNumber : "N/A"}</h5>
                                                    <span class="description-text">Winning Number${(item.resultNumber ?? "").toString().trim() !== "" ? ` <i class="fas fa-arrow-circle-right"></i>` : ""}</span>
                                                </div>
                                            ${(item.resultNumber ?? "").toString().trim() !== "" ? `</a>` : ""}

                                        </div>

                                        <div class="col-sm-6">
                                            ${(item.maxBetAmountNumber ?? "").toString().trim() !== "" ? `<a href="/report/bets-by-users?gameId=${item.gameId}&number=${item.maxBetAmountNumber}" class="no-style-link">` : ""}
                                                <div class="description-block">
                                                    <h5 class="description-header">${(item.maxBetAmountNumber ?? "").toString().trim() !== "" ? item.maxBetAmountNumber : "N/A"}</h5>
                                                    <span class="description-text">Max Bet Amount Placed On${(item.maxBetAmountNumber ?? "").toString().trim() !== "" ? `    <i class="fas fa-arrow-circle-right"></i>` : ""}</span>
                                                </div>
                                            ${(item.maxBetAmountNumber ?? "").toString().trim() !== "" ? `</a>` : ""}

                                        </div>

                                    </div>

                                    <div class="col-12 mt-2">
                                        <div class="small-box mb-2 bg-secondary">
                                            ${(item.resultNumber ?? "").toString().trim() !== "" || (item.maxBetAmountNumber ?? "").toString().trim() !== "" ? `<a href="/report/bets-by-numbers?gameId=${item.gameId}" class="small-box-footer">` : ""}
                                                <div class="small-box-footer">
                                                    View analytics for all numbers${(item.resultNumber ?? "").toString().trim() !== "" || (item.maxBetAmountNumber ?? "").toString().trim() !== "" ? ` <i class="fas fa-arrow-circle-right"></i>` : ""}
                                                </div>
                                            ${(item.resultNumber ?? "").toString().trim() !== "" || (item.maxBetAmountNumber ?? "").toString().trim() !== "" ? `</a>` : ""}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>`
                    }

                    document.getElementById("gameStatsContainer").innerHTML = html
                }
                loader.hide()
            }
        })
    }
</script>
<?= $this->endSection(); ?>