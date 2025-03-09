<?= $this->extend('admin_template'); ?>

<?= $this->section('pageStyles'); ?>
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Announce Game Result</h3>
            </div>
            <!-- /.card-header -->
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="resultNumber">Result Number</label>
                        <input type="text" class="form-control" id="resultNumber" placeholder="Enter result number">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-primary" onclick="onClickSubmit()">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </form>
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
    const gameId = Number('<?php echo $data["gameId"]; ?>')

    async function onClickSubmit() {
        const resultNumber = document.getElementById("resultNumber").value

        if ((resultNumber ?? "").trim() === "") {
            toastr.error("Please enter a valid number")
            return
        }

        if (confirm("Are you sure you want to announce result for this game?")) {
            await postAPICall({
                endPoint: "/game/process-result",
                payload: JSON.stringify({
                    gameId,
                    resultNumber
                }),
                callbackSuccess: (response) => {
                    if (response.success) {
                        toastr.success("Game result annouced!")
                        window.location.href = "/games"
                    }
                }
            })
        }
    }
</script>
<?= $this->endSection(); ?>