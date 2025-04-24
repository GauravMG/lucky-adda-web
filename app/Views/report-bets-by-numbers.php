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
<div class="row" id="betsByNumbersContainer">
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

    $(document).ready(function() {
        fetchBetsByNumbers()
    })

    async function fetchBetsByNumbers() {
        let payload = {
            filter: {
                gameId
            }
        }

        await postAPICall({
            endPoint: "/report/bets-by-numbers",
            payload: JSON.stringify(payload),
            callbackComplete: () => {},
            callbackSuccess: (response) => {
                if (response.success) {
                    var html = ""

                    for (let i = 0; i < response.data?.length; i++) {
                        let item = response.data[i]

                        html += `<div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box shadow border border-dark">
                                <span class="info-box-icon bg-secondary">${item.number}</span>
                                <div class="info-box-content">
                                    <span class="info-box-number">Total Bets Placed : ${item.totalBetsPlaced}</span>
                                    <span class="info-box-number">Total Bet Amount : ₹ ${item.totalBetAmount}</span>
                                </div>

                            </div>

                        </div>`
                    }

                    document.getElementById("betsByNumbersContainer").innerHTML = html
                }
                loader.hide()
            }
        })
    }
</script>
<?= $this->endSection(); ?>