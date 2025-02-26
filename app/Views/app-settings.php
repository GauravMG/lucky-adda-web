<?= $this->extend('admin_template'); ?>

<?= $this->section('pageStyles'); ?>
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">

<style>
    /* Switch container */
    .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
    }

    /* Hide default checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* Slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: 0.4s;
        border-radius: 34px;
    }

    /* Circle inside the slider */
    .slider::before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: 0.4s;
        border-radius: 50%;
    }

    /* Checked state */
    input:checked+.slider {
        background-color: #28a745;
        /* Green */
    }

    input:checked+.slider::before {
        transform: translateX(26px);
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">App Settings</h3>
            </div>
            <!-- /.card-header -->
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Shutdown App</label>
                        <label class="switch">
                            <input type="checkbox" class="toggle-status" id="isAppShutdown">
                            <span class="slider"></span>
                        </label>

                        <button id="toggleButton" style="display: none;">Toggle Switch</button>
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
    var appSettingId = null

    $(document).ready(function() {
        // Add event listeners to all toggle switches after rendering
        document.querySelectorAll(".toggle-status").forEach((toggle) => {
            toggle.addEventListener("change", function() {
                let newStatus = this.checked ? "active" : "inactive";
                const toggleSwitch = this;

                if (!confirm(`Are you sure you want to ${newStatus === "inactive" ? "unblock" : "shutdown"} app?`)) {
                    // If the user cancels, revert the toggle back
                    toggleSwitch.checked = !toggleSwitch.checked;
                    return;
                }

                // Call API to update user status
                updateAppSettings(newStatus);
            });
        });

        fetchAppSettings()
    })

    async function fetchAppSettings() {
        await postAPICall({
            endPoint: "/app-setting/list",
            payload: {},
            callbackComplete: () => {},
            callbackSuccess: (response) => {
                if (response.success) {
                    appSettingId = response.data.appSettingId

                    document.getElementById("toggleButton").addEventListener("click", function() {
                        const toggleSwitch = document.getElementById("isAppShutdown");
                        toggleSwitch.checked = response.data.isAppShutdown;
                    });
                }
                loader.hide()
            }
        })
    }

    async function updateAppSettings(status) {
        await postAPICall({
            endPoint: "/app-setting/update",
            payload: JSON.stringify({
                appSettingId: Number(appSettingId),
                isAppShutdown: status === "inactive" ? false : true
            }),
            callbackSuccess: (response) => {
                if (!response.success) {
                    toastr.error(response.message)
                    fetchAppSettings()
                } else {
                    toastr.success(`App ${status === "inactive" ? "unblocked" : "shutdown"} successfully`)
                }
            }
        })
    }
</script>

<?= $this->endSection(); ?>