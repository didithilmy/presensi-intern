<script type="text/javascript" language="JavaScript" src="<?=BASE_URL?>/js/moment.min.js"></script>
<script type="text/javascript" language="JavaScript" src="<?=BASE_URL?>/js/moment-timezone-with-data.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
<style type="text/css">
    .e-user, .e-t12 {
        display: none;
    }
    .img-circle {
        width: 80px;
        height: 80px;
        overflow: hidden;
        border-radius: 100%;
        background-image: url('<?=BASE_URL?>/img/avatar.png');
        background-size: cover;
    }
</style>
<script type="text/javascript">
    const MEETING_ID = '<?=addslashes($id)?>';
</script>
<div class="container" style="margin-top: 24px">
    <div class="row">
        <div class="col-12">
            <h3>Add a new absence</h3>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 order-md-0">
            <div class="form-group">
                <label for="meeting-name" class="cols-sm-2 control-label">Meeting name</label>
                <div class="cols-sm-10">
                    <h5 id="meeting-name"></h5>
                </div>
            </div>

            <div class="form-group">
                <label for="meeting-location" class="cols-sm-2 control-label">Registration no</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" id="abs-tec_regno" aria-describedby="basic-addon3">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="btn-lookup">Lookup</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card e-user" style="margin-top: 16px; margin-bottom: 16px;" id="person-card">
                <div class="card-body" style="background: #fbfbfb">
                    <div class="img-circle" id="profile-url">
                    </div>
                    <h4 style="margin-top: 16px; margin-bottom: 0;" id="name"></h4>
                    <h5 style="margin: 0;" id="tec_regno"></h5>
                </div>
                <div class="card-body" id="person-notices">

                </div>
            </div>
            <div class="card e-user" style="margin-top: 16px;">
                <div class="card-header">Absence notices</div>
                <div>
                    <ul class="list-group list-group-flush" id="abs-notices">
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 order-md-1">

            <div class="form-group e-user">
                <label for="is_offline" class="cols-sm-2 control-label">Type of absence</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <select class="form-control" id="type">
                            <option value="0">Not attending</option>
                            <option value="1">Coming late</option>
                            <option value="2">Leaving early</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group e-user">
                <label for="is_offline" class="cols-sm-2 control-label">Type of urgency</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <select class="form-control" id="urgency">
                            <option value="0">Normal</option>
                            <option value="1">Short notice</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="e-user">
                <label for="abs-notes">Reasons</label>
                <textarea id="abs-notes" class="form-control"></textarea>
            </div>

            <label for="dtpicker" class="cols-sm-2 control-label e-user e-t12" style="margin-top: 16px;">Absence date and time</label>
            <div style="overflow:hidden; margin-top: 8px;" id="dtpicker" class="e-user">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="sch"></div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(function () {
                    $('#sch').datetimepicker({
                        inline: true,
                        sideBySide: true,
                        timeZone: 'Asia/Jakarta'
                    });
                });
            </script>

            <button class="btn btn-primary e-user" style="margin-top: 16px; margin-bottom: 32px;" id="btn-submit">Submit</button>

        </div>
    </div>
    <div style="width: 30px;">
        <div class="loader loader-small" style="display: none;"></div>
    </div>
</div>
<script type="text/javascript" src="<?=BASE_URL?>/js/meetings-view-abs-record.js"></script>