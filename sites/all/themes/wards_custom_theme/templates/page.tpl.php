<?php
/**
 * @file
 * Main page template.
 */
?>
<style>
    .customm-menu-padding {
        padding-top: 5px;
        padding-bottom: 5px;
    }
</style>
<div id="branding" class="clearfix">

    <!--    --><?php //dpm(get_defined_vars());?>

    <?php print $breadcrumb; ?>

    <?php print render($title_prefix); ?>

    <?php if ($title): ?>
        <h1 class="page-title"><?php print $title; ?></h1>
    <?php endif; ?>

    <?php print render($title_suffix); ?>
    <?php
    $job_id = arg(1);
    $nid = node_load($job_id);

    dpm($job_id);

    if ($job_id == 'jobs') { ?>
        <div class="col-sm-10 text-right print-tab">
            <div class="row ">
                <a class="customm-menu-padding" href="?q=dashboard"><h1>Dashbord</h1></a>
                <a href="?q=create-job"><h1>New Job</h1></a>
                <a href="?q=manage-freight/jobs"><h1>Manage Freight</h1></a>
                <a href="?q=scan/updates"><h1>Status Update</h1></a>
                <a href="?q=manage-customer"><h1>Customer Management</h1></a>
                <a href="?q=pricing"><h1>Pricing</h1></a>
                <a class="customm-menu-padding" href="?q=billing"><h1>Billing</h1></a>
                <a href="#"><h1>Manage Employees</h1></a>
                <a href="#"><h1>Manage Users</h1></a>
                <a href="#"><h1>Audit Log</h1></a>
                <a href="#"><h1>Manage Items</h1></a>


                <button type="button" class="btn btn-default" id="single_job_print_labels"> Print Labels</button>
                <!--    <a href="?q=create-job"><h1>Create New Job</h1></a>-->
                <a href="?q=job/data/print/pdf&job_id=<?php echo $job_id; ?>" target='_blank'><h1>Print</h1></a>
                <a href="?q=create-copy-job/<?php echo $job_id; ?>"><h1>Copy Job</h1></a>
            </div>
        </div>
    <?php } else if ($job_id == 'manifest') { ?>
        <div class="col-sm-10 text-right print-tab manifest-tab-box">
            <div class="row ">
                <a class="customm-menu-padding" href="?q=dashboard"><h1>Dashbord</h1></a>
                <a href="?q=create-job"><h1>New Job</h1></a>
                <a href="?q=manage-freight/jobs"><h1>Manage Freight</h1></a>
                <a href="?q=scan/updates"><h1>Status Update</h1></a>
                <a href="?q=manage-customer"><h1>Customer Management</h1></a>
                <a href="?q=pricing"><h1>Pricing</h1></a>
                <a class="customm-menu-padding" href="?q=billing"><h1>Billing</h1></a>
                <a href="#"><h1>Manage Employees</h1></a>
                <a href="#"><h1>Manage Users</h1></a>
                <a href="#"><h1>Audit Log</h1></a>
                <a href="#"><h1>Manage Items</h1></a>

                <button type="button" class="btn btn-default" id="single_manifest_print_labels"> Print Labels</button>
                <button type="button" class="btn btn-default" id="single_Print_fest"> Print Manifest</button>
            </div>
        </div>
    <?php } else if (arg(0) == "manage-freight" && arg(1) == "jobs") { ?>
        <div class="col-sm-10 text-right print-tab manifest-tab-box">
            <div class="row ">
                <a class="customm-menu-padding" href="?q=dashboard"><h1>Dashbord</h1></a>
                <a href="?q=create-job"><h1>New Job</h1></a>
                <a href="?q=manage-freight/jobs"><h1>Manage Freight</h1></a>
                <a href="?q=scan/updates"><h1>Status Update</h1></a>
                <a href="?q=manage-customer"><h1>Customer Management</h1></a>
                <a href="?q=pricing"><h1>Pricing</h1></a>
                <a class="customm-menu-padding" href="?q=billing"><h1>Billing</h1></a>
                <a href="#"><h1>Manage Employees</h1></a>
                <a href="#"><h1>Manage Users</h1></a>
                <a href="#"><h1>Audit Log</h1></a>
                <a href="#"><h1>Manage Items</h1></a>

                <button type="button" class="btn btn-info btn-lg btn-lg-reciever" data-toggle="modal"
                        data-target="#manage-view-job-modal">Show Pickups
                </button>
            </div>
        </div>
    <?php } else if ($nid->type == 'pricing') { ?>
        <div class="col-sm-10 text-right print-tab manifest-tab-box">
            <div class="row ">
                <a class="customm-menu-padding" href="?q=dashboard"><h1>Dashbord</h1></a>
                <a href="?q=create-job"><h1>New Job</h1></a>
                <a href="?q=manage-freight/jobs"><h1>Manage Freight</h1></a>
                <a href="?q=scan/updates"><h1>Status Update</h1></a>
                <a href="?q=manage-customer"><h1>Customer Management</h1></a>
                <a href="?q=pricing"><h1>Pricing</h1></a>
                <a class="customm-menu-padding" href="?q=billing"><h1>Billing</h1></a>
                <a href="#"><h1>Manage Employees</h1></a>
                <a href="#"><h1>Manage Users</h1></a>
                <a href="#"><h1>Audit Log</h1></a>
                <a href="#"><h1>Manage Items</h1></a>

                <a href="?q=create-copy-pricing/<?php echo $job_id; ?>"><h1>Copy Pricing</h1></a>
            </div>
        </div>
    <?php } else if ($nid->type == 'customer') { ?>
        <div class="col-sm-10 text-right print-tab manifest-tab-box">
            <div class="row ">
                <a class="customm-menu-padding" href="?q=dashboard"><h1>Dashbord</h1></a>
                <a href="?q=create-job"><h1>New Job</h1></a>
                <a href="?q=manage-freight/jobs"><h1>Manage Freight</h1></a>
                <a href="?q=scan/updates"><h1>Status Update</h1></a>
                <a href="?q=manage-customer"><h1>Customer Management</h1></a>
                <a href="?q=pricing"><h1>Pricing</h1></a>
                <a class="customm-menu-padding" href="?q=billing"><h1>Billing</h1></a>
                <a href="#"><h1>Manage Employees</h1></a>
                <a href="#"><h1>Manage Users</h1></a>
                <a href="#"><h1>Audit Log</h1></a>
                <a href="#"><h1>Manage Items</h1></a>

                <a href="?q=create-copy-customer/<?php echo $job_id; ?>"><h1>Copy Customer</h1></a>
            </div>
        </div>
    <?php } else { ?>
        <div class="col-sm-10 text-right print-tab manifest-tab-box">
            <div class="row ">
                <a class="customm-menu-padding" href="?q=dashboard"><h1>Dashbord</h1></a>
                <a href="?q=create-job"><h1>New Job</h1></a>
                <a href="?q=manage-freight/jobs"><h1>Manage Freight</h1></a>
                <a href="?q=scan/updates"><h1>Status Update</h1></a>
                <a href="?q=manage-customer"><h1>Customer Management</h1></a>
                <a href="?q=pricing"><h1>Pricing</h1></a>
                <a class="customm-menu-padding" href="?q=billing"><h1>Billing</h1></a>
                <a href="#"><h1>Manage Employees</h1></a>
                <a href="#"><h1>Manage Users</h1></a>
                <a href="#"><h1>Audit Log</h1></a>
                <a href="#"><h1>Manage Items</h1></a>
            </div>
        </div>
    <?php } ?>
</div>
<div id="navigation">
    <?php if ($primary_local_tasks): ?>
        <?php // print render($primary_local_tasks); ?>
    <?php endif; ?>

    <?php if ($secondary_local_tasks): ?>
        <div class="tabs-secondary clearfix">
            <ul class="tabs secondary"><?php print render($secondary_local_tasks); ?></ul>
        </div>
    <?php endif; ?>

</div>

<div id="page">
    <div id="" class="container-fluid">
        <div class="row">
            <div id="content" class="clearfix">
                <div class="element-invisible"><a id="main-content"></a></div>

                <?php if ($messages): ?>
                    <div id="console" class="clearfix"><?php print $messages; ?></div>
                <?php endif; ?>

                <?php if ($page['help']): ?>
                    <div id="help">
                        <?php print render($page['help']); ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($page['content_before'])): ?>
                    <div id="content-before">
                        <?php print render($page['content_before']); ?>
                    </div>
                <?php endif; ?>

                <?php if ($action_links): ?>
                    <ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>

                <div id="content-wrapper">

                    <?php if (isset($page['sidebar_left'])): ?>
                        <div id="sidebar-left">
                            <?php print render($page['sidebar_left']); ?>
                        </div>
                    <?php endif; ?>

                    <div id="main-content">

                        <?php if (arg(0) == 'node' && is_numeric(arg(1)) && arg(2) == 'edit' && isset($_GET['locked']) && $_GET['locked'] == 'true') {
                            $url = arg(0);
                            $url1 = arg(1);
                            $nid = node_load($url1);
                            $url_final = url($_GET['q']);
                            if ($nid->type == "pricing" || $nid->type == "manifest" || $nid->type == "customer") {
                                global $user;
                                if ($user->roles[2] == 'authenticated user' && $user->roles[3] != 'administrator' && $user->roles[4] != 'Manager') {
                                    echo '<div class="locked-message"><div class="padding-lr-40">Screen you are viewing is locked.</div></div>';
                                } else if (($user->roles[3] == 'administrator' && $user->roles[2] == 'authenticated user' && $user->roles[4] == 'Manager') || ($user->roles[2] == 'authenticated user' && $user->roles[4] == 'Manager') || ($user->roles[2] == 'authenticated user' && $user->roles[4] == 'Manager') || ($user->roles[3] == 'administrator' && $user->roles[2] == 'authenticated user')) {
                                    echo '<div class="locked-message"><div class="padding-lr-40">Screen you are viewing is locked, kindly press <a href="' . $url_final . '">Edit </a>to continue</div></div>';
                                }
                            }
                            if ($nid->type == "job") {
                                global $user;
                                if ($user->roles[2] == 'authenticated user' && $user->roles[3] != 'administrator') {
                                    if ($user->roles[2] == 'authenticated user' && $user->roles[3] != 'administrator' && $nid->field_job_status['und'][0]['target_id'] == 239) {
                                        echo '<div class="locked-message"><div class="padding-lr-40">Screen you are viewing is locked because status is Complete.</div></div>';
                                    } else if ($user->roles[2] == 'authenticated user' && $user->roles[3] != 'administrator' && $user->roles[4] != 'Manager') {
                                        echo '<div class="locked-message"><div class="padding-lr-40">Screen you are viewing is locked.</div></div>';
                                    }
                                } else if (($user->roles[3] == 'administrator' && $user->roles[2] == 'authenticated user' && $user->roles[4] == 'Manager') || ($user->roles[2] == 'authenticated user' && $user->roles[4] == 'Manager') || ($user->roles[2] == 'authenticated user' && $user->roles[4] == 'Manager') || ($user->roles[3] == 'administrator' && $user->roles[2] == 'authenticated user')) {
                                    echo '<div class="locked-message"><div class="padding-lr-40">Screen you are viewing is locked, kindly press <a href="' . $url_final . '">Edit </a>to continue</div></div>';
                                }
                            }
                        }
                        ?>
                        <div class="form-outer-class">
                            <?php print render($page['content']); ?>
                        </div>
                    </div>

                    <?php if (isset($page['sidebar_right'])): ?>
                        <div id="sidebar-right">
                            <?php print render($page['sidebar_right']); ?>
                        </div>
                    <?php endif; ?>

                </div>

                <?php if (isset($page['content_after'])): ?>
                    <div id="content-after">
                        <?php print render($page['content_after']); ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <div id="footer">
        <?php print $feed_icons; ?>
    </div>

</div>
<div class='container'>
    <div class='modal fade' id='manifest_print_labels_model' role='dialog'>
        <div class='modal-dialog'>

            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h4 class='modal-title'><strong>Print Labels</strong></h4>
                </div>
                <div class='modal-body'></div>
                <div class='modal-footer clearfix'>
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
