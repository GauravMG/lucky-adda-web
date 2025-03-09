<?= $this->extend('admin_template'); ?>

<?= $this->section('pageStyles'); ?>
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('headerButtons'); ?>
<div class="">
    <div style="display: flex; flex-direction: row; justify-content: flex-end; align-items: center; width: 100%">
        <label for="monthPicker" style="margin-bottom: unset; margin: 5px;">Select Month & Year:</label>
        <input type="month" id="monthPicker" class="form-control" style="width: 180px;">
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">All Results for <strong id="gameName"></strong></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="dtGameResultsList" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Result</th>
                        </tr>
                    </thead>
                    <tbody id="dataList">
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Date</th>
                            <th>Result</th>
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
    const gameId = Number('<?php echo $data["gameId"]; ?>')

    $(document).ready(function() {
        // Get the current month and year in YYYY-MM format
        const today = new Date();
        const currentMonth = today.toISOString().slice(0, 7); // "YYYY-MM"

        // Set the default value
        document.getElementById("monthPicker").value = currentMonth;

        fetchResults(currentMonth)
    })

    document.getElementById("monthPicker").addEventListener("change", function() {
        fetchResults(this.value)
    });

    function initializeDTGameResultsList() {
        $("#dtGameResultsList").DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "createdRow": function(row, data, index) {
                $('td', row).each(function(columnIndex) {
                    let colors = ["#f4c2c2", "#b3d9ff", "#ffdab3", "#d6f5d6", "#f7c6e6", "#e0ccff", "#cceeff", "#ffe680", "#e68a8a", "#80bfff", "#ffd966", "#b3ffb3", "#ffb3ff", "#ffcc99", "#d9d9d9"]; // Add more colors if needed
                    let colorIndex = columnIndex % colors.length; // Cycle through colors
                    $(this).css('background-color', colors[colorIndex]);
                    $(this).css('color', 'black');
                    $(this).css('textAlign', 'center');
                });
            }
        })
    }

    function getDatesOfCurrentMonth() {
        const dates = [];
        const now = new Date();
        const year = now.getFullYear();
        const month = now.getMonth(); // Current month (0-indexed)

        const lastDay = new Date(year, month + 1, 0).getDate(); // Get last day of the month

        for (let day = 1; day <= lastDay; day++) {
            dates.push(day.toString().padStart(2, '0')); // Convert to 2-digit format
        }

        return dates;
    }

    async function fetchResults(resultMonth) {
        if ($.fn.DataTable.isDataTable("#dtGameResultsList")) {
            $('#dtGameResultsList').DataTable().destroy()
        }

        const dates = getDatesOfCurrentMonth()

        await postAPICall({
            endPoint: "/game/list-result-chart",
            payload: JSON.stringify({
                "filter": {
                    gameId,
                    resultMonth
                },
                "range": {
                    "all": true
                },
                "sort": [{
                    "orderBy": "gameId",
                    "orderDir": "asc"
                }]
            }),
            callbackComplete: () => {},
            callbackSuccess: (response) => {
                if (response.success) {
                    const data = response.data[0]

                    document.getElementById("gameName").innerText = data.name

                    var html = ""

                    for (let i = 0; i < dates?.length; i++) {
                        html += `<tr>
                            <td>${dates[i]}</td>
                            <td>`

                        var dateResult = `-`
                        for (let j = 0; j < data.gameResults?.length; j++) {
                            if (Number(dates[i]) === Number(getDateFromDate(data.gameResults[j].resultTime))) {
                                dateResult = `${data.gameResults[j].resultNumber}`
                            }
                        }
                        html += dateResult

                        html += `</td>
                        </tr>`
                    }

                    document.getElementById("dataList").innerHTML = html

                    initializeDTGameResultsList()
                }
                loader.hide()
            }
        })
    }
</script>
<?= $this->endSection(); ?>