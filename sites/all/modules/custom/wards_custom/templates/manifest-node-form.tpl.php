<div class="newJobCover newformCover">
  <!-- <div class="row">
    <div class="padding-lr-40 print-tab">
        <div class="col-md-12">
        <?php if (!empty($form['field_print_single_manifest'])): ?>
        <?php print drupal_render($form['field_print_single_manifest']); ?>
        <?php endif; ?>
      </div>

    </div> -->
  </div>
    <?php if (!empty($title)): ?>
  <div class="row ">
    <div class="padding-lr-40">
      <div class="col-md-2">

        <?php print drupal_render($title); ?>

      </div>
    </div>
  </div>
   <?php endif; ?>
  <!--row end -->
    <?php
      if(drupal_is_front_page()) {
        $alt_class = 'col-md-6';
      }
      else {
        $alt_class = 'col-md-2';
      }
    ?>

    <div class="padding-lr-40 newformCover-manifest">
       <div class="row">
    <div class="col-sm-12"></div>
     <div class="<?php print $alt_class; ?>">
        <?php if (!empty($form['field_drivers'])): ?>
        <?php print drupal_render($form['field_drivers']); ?>
        <?php endif; ?>
      </div>
      <div class="<?php print $alt_class; ?>">
        <?php if (!empty($form['field_manifest_type'])): ?>
        <?php print drupal_render($form['field_manifest_type']); ?>
        <?php endif; ?>
      </div>
      <div class="<?php print $alt_class; ?>">
      <?php if (!empty($form['field_dispatch_branch'])): ?>
        <?php print drupal_render($form['field_dispatch_branch']); ?>
        <?php endif; ?>
      </div>
      <div class="<?php print $alt_class; ?>">
        <?php if (!empty($form['field_trailer'])): ?>
        <?php print drupal_render($form['field_trailer']); ?>
        <?php endif; ?>
      </div>
      <div class="<?php print $alt_class; ?>">
        <?php if (!empty($form['field_receiving'])): ?>
        <?php print drupal_render($form['field_receiving']); ?>
        <?php endif; ?>
      </div>
      <div class="<?php print $alt_class; ?>">
        <?php if (!empty($form['field_dispatch_date'])): ?>
        <?php print drupal_render($form['field_dispatch_date']); ?>
        <?php endif; ?>
      </div>
      </div>
    </div>
  </div>
  <div class="row">
        <div class="padding-lr-40">
  <div class= "col-sm-12 manifest-jobs-add-widget">
   <h3>Available Jobs: </h3>
       <div class="col-sm-6 manifest-ideal-left">
   <?php if (!empty($form['branch_select'])): ?>
        <?php print drupal_render($form['branch_select']); ?>
   <?php endif; ?>
    </div>
       <div class="manifest-ideal col-sm-6">
   <?php echo "Manifest [".$form['#node']->nid."]"; ?>
 </div>
  <?php if (!empty($form['main_container'])): ?>
  <?php print drupal_render($form['main_container']); ?>
  <?php endif; ?>
 <?php if (!empty($form['field_avaiable_jobs'])): ?>
   <?php print drupal_render($form['field_avaiable_jobs']); ?>
  <?php endif; ?>
   <?php $url1= arg(2);
         if($url1 == 'edit'){ ?>

 <?php } ?>
 </div>

      </div>
  </div>
  <!--row end -->
 <div class="padding-lr-40">
<?php print drupal_render_children($form); ?>
  </div>
