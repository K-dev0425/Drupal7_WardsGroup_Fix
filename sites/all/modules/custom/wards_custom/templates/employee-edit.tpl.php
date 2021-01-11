<?php
$uid =  arg(1);
$employee_db = db_query('SELECT * FROM {users} WHERE uid= :uid', array(':uid'=>(int)$uid))->fetchAll();
$log_db = db_query('SELECT * FROM {node_revision} WHERE uid= :uid', array(':uid'=>(int)$uid))->fetchAll();
$employee = $employee_db[0];
$node = node_load($log_db[0]->nid);

?>
<div id="employee-edit-main" class="block block-system">
    <form action="/?q=employee/<?= $uid ?>/form_edit" method="post" id="employee-edit-form">
        <div class="container">
            <div class="top-wrapper">
                <div class="field-group-htabs-wrapper field-group-htabs">
                    <div class="horizontal-tabs clearfix">
                        <ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
                            <li class="active">
                                <a href="#employee_details_tab" data-toggle="tab">
                                    <strong>Employee Details</strong>
                                </a>
                            </li>
                            <li>
                                <a href="#audit_trail_tab">
                                    <strong>Audit Trail</strong>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content" style="margin-top: 30px; padding-left: 15px">
                            <div class="tab-pane fade in active" id="employee_details_tab">
                                <fieldset class="field-group-htab form-wrapper horizontal-tabs-pane">
                                    <div class="fieldset-wrapper">
                                        <div class="form-wrapper row" id="employee_details_section">
                                            <h3>Employee Details - <span style="color: #111"><?= $employee->name ?></span></h3>
                                            <div class="col-sm-6 field-group-div">
                                                <div class="form-group">
                                                    <input type="hidden" name="uid" id="uid" value="<?= $uid ?>">
                                                    <input type="hidden" name="pass" id="pass" value="<?= $employee->pass ?>">
                                                    <label for="first_name">First Name (username)</label>
                                                    <input type="text" name="first_name" id="first_name" value="<?= $employee->first_name ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="mobile">Mobile</label>
                                                    <input type="number" name="mobile" id="mobile" value="<?= $employee->mobile ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="employee_id">Employee ID</label>
                                                    <input type="text" name="employee_id" id="employee_id" value="<?= $employee->employee_id ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 field-group-div">
                                                <div class="form-group">
                                                    <label for="last_name">Last Name</label>
                                                    <input type="text" name="last_name" id="last_name" value="<?= $employee->last_name ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="branch">Branch</label>
                                                    <select name="branch" id="branch">
                                                        <option value="0">- Select a value -</option>
                                                        <?php
                                                        $branch_array = taxonomy_get_tree(8);
                                                        foreach ($branch_array as $branch) {
                                                            if ($branch->tid == $employee->branch) {
                                                                ?>
                                                                <option value="<?= $branch->tid ?>" selected><?= $branch->name ?></option>
                                                            <?php } else { ?>
                                                                <option value="<?= $branch->tid ?>"><?= $branch->name ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-wrapper row" id="login_details_section">
                                            <h3>Login Details</h3>
                                            <div class="col-sm-6 field-group-div">
                                                <div class="form-group">
                                                    <label for="can_login">Can Login?</label>
                                                    <?php if ($employee->can_login) {?>
                                                        <input type="checkbox" name="can_login" id="can_login" value="<?= $employee->can_login ?>" checked>
                                                    <?php } else { ?>
                                                        <input type="checkbox" name="can_login" id="can_login" value="<?= $employee->can_login ?>">
                                                    <?php } ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="new_password">New Password</label>
                                                    <input type="password" name="new_password" id="new_password">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 field-group-div">
                                                <div class="form-group">
                                                    <label for="can_app">Can use app?</label>
                                                    <?php if ($employee->can_app) {?>
                                                        <input type="checkbox" name="can_app" id="can_app" value="<?= $employee->can_app ?>" checked>
                                                    <?php } else { ?>
                                                        <input type="checkbox" name="can_app" id="can_app" value="<?= $employee->can_app ?>">
                                                    <?php } ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="new_pin">New Pin</label>
                                                    <input type="password" name="new_pin" id="new_pin">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-button">
                                        <button type="button" id="employee_submit" class="btn-success">Save</button>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="tab-pane fade" id="audit_trail_tab">
                                <fieldset class="field-group-htab form-wrapper horizontal-tabs-pane">
                                    <div class="fieldset-wrapper">
                                        <h3>Audit Log (<?= $employee->name ?>)</h3>
                                        <div id="log_section">
                                            <?php
                                            foreach ($log_db as $log) {
                                                $node = node_load($log->nid);
                                                $type = $node->type;
                                                $no = ($type == 'job') ? $node->field_connote_no['und'][0]['value'] : $log->nid;
                                                $status = $log->status; //not node, log
                                                if ($status == 1) $status = 'updated';
                                                else $status = 'created';
                                                if (count($log->field_job_status) > 0 && $log->field_job_status[(int)count($log->field_job_status) - 1]['und'][0]['value'] == 1) $status = 'deleted';
                                                $message = 'User '. $employee->name . ' '. $status .' a new '. $type .' '. $no.' on '. format_date($log->timestamp, 'short');

                                                echo $message . '</br>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
    #employee-edit-form label {
        display: block;
    }
    #employee-edit-form input {
        border: 1px solid #ddd;
        height: 33px;
        padding: 5px 7px;
        width: 100%;
        max-width: 300px;
    }
    #employee-edit-form .form-wrapper.row h3 {
        color: #0074BD;
        margin-left: 15px;
        font-weight: 600;
    }
    .nav-tabs li a {
        color: #333;
    }
    .nav-tabs .active a {
        color: #0074BD!important;
    }
</style>

<script>
    var uid = '<?= $uid ?>';
    jQuery(document).ready(function () {
        jQuery('#employee_submit').click(function () {
            var can_login = jQuery('#can_login:checked').length;
            if (can_login) jQuery('#can_login').val('1');
            else jQuery('#can_login').val('0');
            var can_app = jQuery('#can_app:checked').length;
            if (can_app) jQuery('#can_app').val('1');
            else jQuery('#can_app').val('0');
            var form_data = jQuery('#employee-edit-form').serialize();
            console.log(form_data);

            jQuery.ajax({
                url: '/employee/' + uid + '/form_edit',
                type: 'post',
                data: form_data,
                // async: true,
                success: function (msg) {
                    console.log(msg);
                    window.location.reload();
                }
            });

            // jQuery('#employee-edit-form').submit();

        });
    })
</script>