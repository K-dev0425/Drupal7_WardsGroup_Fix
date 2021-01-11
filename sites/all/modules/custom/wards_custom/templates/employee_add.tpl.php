<div id="employee-edit-main" class="block block-system">
    <form action="#" method="post" id="employee-add-form">
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
                        </ul>

                        <div class="tab-content" style="margin-top: 30px; padding-left: 15px">
                            <div class="tab-pane fade in active" id="employee_details_tab">
                                <fieldset class="field-group-htab form-wrapper horizontal-tabs-pane">
                                    <div class="fieldset-wrapper">
                                        <div class="form-wrapper row" id="employee_details_section">
                                            <h3>Employee Details</h3>
                                            <div class="col-sm-6 field-group-div">
                                                <div class="form-group">
                                                    <input type="hidden" name="uid" id="uid">
                                                    <input type="hidden" name="pass" id="pass">
                                                    <label for="first_name">First Name</label>
                                                    <input type="text" name="first_name" id="first_name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="mobile">Mobile</label>
                                                    <input type="number" name="mobile" id="mobile">
                                                </div>
                                                <div class="form-group">
                                                    <label for="employee_id">Employee ID</label>
                                                    <input type="text" name="employee_id" id="employee_id">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 field-group-div">
                                                <div class="form-group">
                                                    <label for="last_name">Last Name</label>
                                                    <input type="text" name="last_name" id="last_name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="branch">Branch</label>
                                                    <select name="branch" id="branch">
                                                        <option value="0">- Select a value -</option>
                                                        <?php
                                                        $branch_array = taxonomy_get_tree(8);
                                                        foreach ($branch_array as $branch) { ?>
                                                                <option value="<?= $branch->tid ?>"><?= $branch->name ?></option>
                                                            <?php
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
                                                    <input type="checkbox" name="can_login" id="can_login" value="1" checked>
                                                </div>
                                                <div class="form-group">
                                                    <label for="new_password">New Password</label>
                                                    <input type="password" name="new_password" id="new_password">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 field-group-div">
                                                <div class="form-group">
                                                    <label for="can_app">Can use app?</label>
                                                    <input type="checkbox" name="can_app" id="can_app" value="1" checked>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
    #employee-add-form label {
        display: block;
    }
    #employee-add-form input {
        border: 1px solid #ddd;
        height: 33px;
        padding: 5px 7px;
        width: 100%;
        max-width: 300px;
    }
    #employee-add-form .form-wrapper.row h3 {
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
    jQuery(document).ready(function () {
        jQuery('#employee_submit').click(function () {
            var can_login = jQuery('#can_login:checked').length;
            if (can_login) jQuery('#can_login').val('1');
            else jQuery('#can_login').val('0');
            var can_app = jQuery('#can_app:checked').length;
            if (can_app) jQuery('#can_app').val('1');
            else jQuery('#can_app').val('0');
            var form_data = jQuery('#employee-add-form').serialize();
            console.log(form_data);

            jQuery.ajax({
                url: '/employee/add/ajax',
                type: 'post',
                data: form_data,
                // async: true,
                success: function (msg) {
                    console.log(msg);
                    window.location.href = '/manage-employee';
                }
            });
        });
    })
</script>