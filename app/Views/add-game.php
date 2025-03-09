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
                <h3 class="card-title"><?php if (isset($data["gameId"])) {
                                            echo "Edit Game";
                                        } else {
                                            echo "Add New Game";
                                        } ?></h3>
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
                                        <button type="button" class="btn btn-primary">Submit</button>
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
    let gameId = '<?php if (isset($data)) {
                        echo $data["gameId"];
                    } else {
                        echo "";
                    } ?>'

    document.addEventListener("DOMContentLoaded", function() {
        if (gameId !== "") {
            fetchGame()
        }

        function isValidTimeFormat(time) {
            return /^([01]\d|2[0-3]):([0-5]\d)$/.test(time); // Ensures HH:MM format
        }

        function compareTimes(time1, time2) {
            return time1.localeCompare(time2); // Compares two times lexicographically
        }

        function validateTimeFields() {
            let startTime = document.getElementById("startTime").value;
            let endTime = document.getElementById("endTime").value;
            let resultTime = document.getElementById("resultTime").value;

            if (startTime && !isValidTimeFormat(startTime)) {
                toastr.error("Start Time must be in HH:MM format!");
                return false;
            }
            if (endTime && !isValidTimeFormat(endTime)) {
                toastr.error("End Time must be in HH:MM format!");
                return false;
            }
            if (resultTime && !isValidTimeFormat(resultTime)) {
                toastr.error("Result Time must be in HH:MM format!");
                return false;
            }

            if (startTime && endTime && compareTimes(startTime, endTime) >= 0) {
                toastr.error("Start Time must be earlier than End Time!");
                return false;
            }

            if (startTime && resultTime && compareTimes(startTime, resultTime) >= 0) {
                toastr.error("Start Time must be earlier than Result Time!");
                return false;
            }

            if (endTime && resultTime && compareTimes(endTime, resultTime) >= 0) {
                toastr.error("End Time must be earlier than Result Time!");
                return false;
            }

            return true;
        }

        document.getElementById("startTime").addEventListener("input", function(e) {
            let value = e.target.value.replace(/[^0-9:]/g, "").substring(0, 5);
            e.target.value = value;
        });

        document.getElementById("endTime").addEventListener("input", function(e) {
            let value = e.target.value.replace(/[^0-9:]/g, "").substring(0, 5);
            e.target.value = value;
        });

        document.getElementById("resultTime").addEventListener("input", function(e) {
            let value = e.target.value.replace(/[^0-9:]/g, "").substring(0, 5);
            e.target.value = value;
        });

        async function fetchGame() {
            await postAPICall({
                endPoint: "/game/list",
                payload: JSON.stringify({
                    "filter": {
                        gameId: Number(gameId)
                    },
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
                        const data = response.data[0]
                        document.getElementById("name").value = data.name
                        document.getElementById("startTime").value = data.startTime
                        document.getElementById("endTime").value = data.endTime
                        document.getElementById("resultTime").value = data.resultTime
                    }

                    loader.hide()
                }
            })
        }

        async function onClickSubmit() {
            if (!await validateTimeFields()) return;

            const name = document.getElementById("name").value.trim();
            const city = "-";
            const logo = "https://lucky-adda.com/api/app-logo.png";
            const startTime = document.getElementById("startTime").value;
            const endTime = document.getElementById("endTime").value;
            const resultTime = document.getElementById("resultTime").value;

            if (!name) {
                toastr.error("Please enter a valid name!");
                return;
            }

            if (!startTime) {
                toastr.error("Please enter a valid start time!");
                return;
            }

            if (!endTime) {
                toastr.error("Please enter a valid end time!");
                return;
            }

            if (!resultTime) {
                toastr.error("Please enter a valid result time!");
                return;
            }

            if (gameId !== "") {
                if (confirm("Are you sure you want to edit this game?")) {
                    await postAPICall({
                        endPoint: "/game/update",
                        payload: JSON.stringify({
                            gameId: Number(gameId),
                            name,
                            city,
                            logo,
                            startTime,
                            endTime,
                            resultTime
                        }),
                        callbackSuccess: (response) => {
                            if (response.success) {
                                toastr.success(response.message);
                                window.location.href = "/games";
                            }
                        }
                    })
                }
            } else {
                if (confirm("Are you sure you want to create this game?")) {
                    await postAPICall({
                        endPoint: "/game/create",
                        payload: JSON.stringify({
                            name,
                            city,
                            logo,
                            startTime,
                            endTime,
                            resultTime
                        }),
                        callbackSuccess: (response) => {
                            if (response.success) {
                                toastr.success(response.message);
                                window.location.href = "/games";
                            }
                        }
                    })
                }
            }
        }

        document.querySelector(".btn-primary").addEventListener("click", onClickSubmit);
    });
</script>

<?= $this->endSection(); ?>