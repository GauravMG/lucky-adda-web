<?= $this->extend('admin_template'); ?>

<?= $this->section('pageStyles'); ?>
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
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
                        <input type="text" class="form-control" id="resultNumber" placeholder="Enter result number in format 00, 01, 21, A1, B0">
                    </div>
                    <div class="form-group">
                        <label>Result Date and Time:</label>
                        <div class="input-group date" id="resultTime" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#resultTime" />
                            <div class="input-group-append" data-target="#resultTime" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
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
<script src="<?= base_url('assets/adminlte/plugins/moment/moment.min.js'); ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
<script>
    const gameId = Number('<?php echo $data["gameId"]; ?>')

    function validateResultNumber(value) {
        const numberPattern = /^[0-9]{2}$/; // 00 to 99 (as string)
        const alphaNumPattern = /^[AB][0-9]$/; // A0-A9 or B0-B9

        return numberPattern.test(value) || alphaNumPattern.test(value);
    }

    $(document).ready(function() {
        $('#resultTime').datetimepicker({
            icons: {
                time: 'far fa-clock'
            }
        });
    })

    async function onClickSubmit() {
        const resultNumber = document.getElementById("resultNumber").value
        const resultTime = document.querySelector('#resultTime input').value

        if ((resultNumber ?? "").trim() === "") {
            toastr.error("Please enter a valid result number")
            return
        }

        if (!validateResultNumber(resultNumber)) {
            toastr.error("Result number should be between 00 - 99 or A0 - A9 or B0 - B9")
            return
        }

        if ((resultTime ?? "").trim() === "") {
            toastr.error("Please enter a valid result date and time")
            return
        }

        const formattedResultTime = moment(resultTime).format('YYYY-MM-DD HH:mm:ss')

        if (confirm("Are you sure you want to announce result for this game?")) {
            await postAPICall({
                endPoint: "/game/process-result",
                payload: JSON.stringify({
                    gameId,
                    resultNumber,
                    resultTime
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