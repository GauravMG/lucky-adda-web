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
                <h3 class="card-title">Add New Game</h3>
            </div>
            <!-- /.card-header -->
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="startTime">Start Time</label>
                        <input type="text" class="form-control" id="startTime" placeholder="Enter start time in format 13:00">
                    </div>
                    <div class="form-group">
                        <label for="endTime">End Time</label>
                        <input type="text" class="form-control" id="endTime" placeholder="Enter end time in format 13:00">
                    </div>
                    <div class="form-group">
                        <label for="resultTime">Result Time</label>
                        <input type="text" class="form-control" id="resultTime" placeholder="Enter result time in format 13:00">
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
<script src="<?= base_url('js/common.js') . '?t=' . time(); ?>"></script>
<script>
    function onClickSubmit() {
        const name = document.getElementById("name").value
        const city = "-"
        const logo = "https://impactadvisoryservices.com/app-logo.png"
        const startTime = document.getElementById("startTime").value
        const endTime = document.getElementById("endTime").value
        const resultTime = document.getElementById("resultTime").value

        if ((name ?? "").trim() === "") {
            alert("Please enter a valid name")
            return
        }

        if ((startTime ?? "").trim() === "") {
            alert("Please enter a valid start time")
            return
        }

        if ((endTime ?? "").trim() === "") {
            alert("Please enter a valid end time")
            return
        }

        if ((resultTime ?? "").trim() === "") {
            alert("Please enter a valid result time")
            return
        }

        $.ajax({
            url: `https://impactadvisoryservices.com/v1/game/create`,
            method: 'POST',
            data: JSON.stringify({
                name,
                city,
                logo,
                startTime,
                endTime,
                resultTime
            }),
            contentType: 'application/json',
            headers: {
                'Authorization': `Bearer ${jwtToken}`
            },
            beforeSend: function() {},
            complete: function() {},
            success: function(response) {
                if (response.success) {
                    window.location.href = "/games"
                }
            },
            error: function(xhr, status, error, message) {
                alert("Something went wrong")
            }
        })
    }
</script>
<?= $this->endSection(); ?>