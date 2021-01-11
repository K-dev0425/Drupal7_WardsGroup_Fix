<fieldset class="pages_box">
  <h2 class="titleHeading"> <span class="heading"> Freight </span> <span class="headingLine"> </span> </h2>
  <div class="row">
    <div class="col-sm-3">
      <div class="wrap">
        <div class="imgCover">
          <a href="?q=create-job">
          <span class="innerCover">
          <img src="sites/all/themes/wards_custom_theme/images/NewJobWhite.png"/>
          </span>
          </a>
        </div>
        <div class="detail"> <a href="?q=create-job"> New Job </a> </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="wrap" id="new_manifest_wrap">
        <div class="imgCover">
          <span id="manifest_popup_model" >
          <span class="innerCover">
          <img src="sites/all/themes/wards_custom_theme/images/Manifest.png"/>
          </span>
          </span>
        </div>
        <div class="detail"><span id="manifest_popup_model1"> New Manifest</span></div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="wrap">
        <div class="imgCover">
          <a href="?q=manage-freight/jobs">
          <span class="innerCover">
          <img src="sites/all/themes/wards_custom_theme/images/ManageFreight.png"/>
          </span>
          </a>
        </div>
        <div class="detail"> <a href="?q=manage-freight/jobs"> Manage Freight </a> </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="wrap">
        <div class="imgCover">
          <a href="?q=scan/updates">
          <span class="innerCover">
          <img src="sites/all/themes/wards_custom_theme/images/CustomerManagement.png"/>
          </span>
          </a>
        </div>
        <div class="detail"> <a href="?q=scan/updates"> Status Update </a> </div>
      </div>
    </div>
  </div>
</fieldset>
<fieldset class="pages_box">
  <h2 class="titleHeading"> <span class="heading"> Customers </span> <span class="headingLine"> </span> </h2>
  <div class="row">
    <div class="col-sm-4">
      <div class="wrap">
        <div class="imgCover">
          <a href="?q=manage-customer">
          <span class="innerCover">
          <img src="sites/all/themes/wards_custom_theme/images/CustomerManagementold.png"/>
          </span>
          </a>
        </div>
        <div class="detail"> <a href="?q=manage-customer"> Customer Management </a> </div>
      </div>
    </div>
    <?php 
    global $user;
    if(($user->roles[3] == 'administrator' && $user->roles[2] == 'authenticated user' && $user->roles[4] == 'Manager') || ($user->roles[2] == 'authenticated user' && $user->roles[4] == 'Manager') || ($user->roles[3] == 'administrator' && $user->roles[2] == 'authenticated user' )){
    ?>
    <div class="col-sm-4">
      <div class="wrap">
        <div class="imgCover">
          <a href="?q=pricing">
          <span class="innerCover">
          <img src="sites/all/themes/wards_custom_theme/images/pricing.png"/>
          </span>
          </a>
        </div>
        <div class="detail"> <a href="?q=pricing"> Pricing </a> </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="wrap">
        <div class="imgCover">
          <a href="?q=billing">
          <span class="innerCover">
          <img src="sites/all/themes/wards_custom_theme/images/billing.png"/>
          </span>
          </a>
        </div>
        <div class="detail"> <a href="?q=billing"> Billing </a> </div>
      </div>
    </div>
    <?php
    }
    else if($user->roles[2] == 'authenticated user'&& $user->roles[3] != 'administrator' && $user->roles[4] != 'Manager'){
    }
    ?>
  </div>
</fieldset>

<!--UPDATED BY LEE-->
<?php
global $user;
if(($user->roles[3] == 'administrator' && $user->roles[2] == 'authenticated user' && $user->roles[4] == 'Manager') || ($user->roles[2] == 'authenticated user' && $user->roles[4] == 'Manager') || ($user->roles[3] == 'administrator' && $user->roles[2] == 'authenticated user' )){
?>
<fieldset class="pages_box">
    <h2 class="titleHeading"> <span class="heading"> System </span> <span class="headingLine"> </span> </h2>
    <div class="row">
        <div class="col-sm-4">
            <div class="wrap">
                <div class="imgCover">
                    <a href="?q=manage-customer">
          <span class="innerCover">
          <img src="sites/all/themes/wards_custom_theme/images/CustomerManagementold.png"/>
          </span>
                    </a>
                </div>
                <div class="detail"> <a href="?q=manage-employee"> Manage Employees </a> </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="wrap">
                <div class="imgCover">
                    <a href="?q=billing">
          <span class="innerCover">
          <img src="sites/all/themes/wards_custom_theme/images/check.png"/>
          </span>
                    </a>
                </div>
                <div class="detail"> <a href="?q=admin/structure/taxonomy/item_type">Manage Items</a></div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="wrap">
                <div class="imgCover">
                    <a href="?q=item_audit_log">
          <span class="innerCover">
          <img src="sites/all/themes/wards_custom_theme/images/RunSheet.png"/>
          </span>
                    </a>
                </div>
                <div class="detail"> <a href="?q=admin/structure/taxonomy/item_type">Item audit trail</a></div>
            </div>
        </div>
    </div>
</fieldset>
    <?php
}
?>

<!-- on click new manifest model -->
<?php
 $url=arg(0);
if($url=='dashboard'){
  global $user;
  $node_manifest = new StdClass();
  $node_manifest->uid = $user->uid;
  $node_manifest->name = $user->name;
  $node_manifest->type = 'manifest' ;
  if(empty($node_manifest->original)){
   $node_manifest->status = 0;
  }
  node_object_prepare($node_manifest);
  module_load_include('inc', 'node', 'node.pages');
  $manifest_node_form = drupal_get_form('manifest_node_form', $node_manifest);
?>
<div class='container'>
    <div class='modal fade' id='create_new_manifest_popup' role='dialog'>
      <div class='modal-dialog'>

          <div class='modal-content'>
            <div class='modal-header'>
             <button type='button' class='close' data-dismiss='modal'>&times;</button>
               <h4 class='modal-title'><strong>Create New Manifest</strong></h4>
            </div>
            <div class='modal-body'><?php print drupal_render($manifest_node_form); ?></div>
        </div>
      </div>
    </div>
</div>
<?php } ?>
