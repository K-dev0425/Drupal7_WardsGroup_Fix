<div class="changes-warning warning">* Changes made in this page will not be saved until the form is submitted.</div>
<div class="newJobCover">
  <div class="row">
<!--    <div class="padding-lr-40 print-tab">
   <?php
     $job_id = arg(1);
   ?>
	<div class="col-sm-10 text-right">
    <a href="?q=dashboard"><h1>Dashbord</h1></a>
    <button type="button" class="btn btn-default" id="single_job_print_labels"> Print Labels</button>
    <a href="?q=create-job"><h1>Create New Job</h1></a>
	  <a href="?q=job/data/print/pdf&job_id=<?php echo $job_id;?>"><h1>Print</h1></a>
    <a href="?q=create-copy-job/<?php echo $job_id;?>"><h1>Copy Job</h1></a>
  </div>
    </div>
  </div> -->
  <div class="row ">
    <div class="padding-lr-40 pg-title">
      <div class="col-md-2">
        <?php if (!empty($form['title'])): ?>
        <?php print drupal_render($form['title']); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!--row end -->
  <div class="row">

    <div class="padding-lr-40 top_bar_box">
		<div class="col-sm-12"></div>
      <div class="col-md-2 grey-bg">
        <?php if (!empty($form['field_job_no'])): ?>
        <?php print drupal_render($form['field_job_no']); ?>
        <?php endif; ?>
      </div>
      <div class="col-md-2 grey-bg">
        <?php if (!empty($form['field_connote_no'])): ?>
        <?php print drupal_render($form['field_connote_no']); ?>
        <?php endif; ?>
      </div>
      <div class="col-md-2 gery_on_value">
        <?php if (!empty($form['field_manual_connote_no_'])): ?>
        <?php print drupal_render($form['field_manual_connote_no_']); ?>
        <?php endif; ?>
      </div>
      <div class="col-md-2">
        <?php if (!empty($form['field_quote_no'])): ?>
        <?php print drupal_render($form['field_quote_no']); ?>
        <?php endif; ?>
      </div>
      <div class="col-md-2">
        <?php if (!empty($form['field_job_type'])): ?>
        <?php print drupal_render($form['field_job_type']); ?>
        <?php endif; ?>
      </div>
      <div class="col-md-2">
        <?php if (!empty($form['field_assigned_driver'])): ?>
        <?php print drupal_render($form['field_assigned_driver']); ?>
        <?php endif; ?>
      </div>
      <div class="col-md-2">
        <?php if (!empty($form['field_job_status'])): ?>
        <?php print drupal_render($form['field_job_status']); ?>
        <?php endif; ?>
      </div>
      <div class="col-md-2">
        <?php if (!empty($form['field_current_branch'])): ?>
        <?php print drupal_render($form['field_current_branch']); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <!--row end -->
  <div class="row">
    <div class="padding-lr-40 flex-box">
      <div class="col-md-3 right-side-border ">
		<h3 class="page-sub-heading">Customer</h3>

        <div class="left_job_section">
          <div class="customerField clearfix">
            <legend style="margin-bottom:10px;"><span class="fieldset-legend" >Customer</span></legend>
            <?php if (!empty($form['field_customer'])): ?>
              <?php print drupal_render($form['field_customer']); ?>
            <?php endif; ?>
            <div class="ladd_customer_but">If customer doesn't exist, <a href="?q=/node/add/customer" target="_blank">Add Customer</a></div>
            <?php if (!empty($form['refresh_customer_list'])): ?>
            <?php print drupal_render($form['refresh_customer_list']); ?>
            <?php endif; ?>
            <?php if (!empty($form['field_make_sender'])): ?>
            <?php print drupal_render($form['field_make_sender']); ?>
            <?php endif; ?>
            <div class="cusWrap clearfix">
              <?php if (!empty($form['field_reference'])): ?>
              <?php print drupal_render($form['field_reference']); ?>
              <?php endif; ?>
              <?php if (!empty($form['field_invoice_no'])): ?>
              <?php print drupal_render($form['field_invoice_no']); ?>
              <?php endif; ?>
              <div class="invoice_refresh"><input type="button" value="Refresh"></div>
            </div>
          </div>
          <div class="attachmentField clearfix">
            <?php if (!empty($form['field_attachments'])): ?>
            <?php print drupal_render($form['field_attachments']); ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="row">

    <div class="padding-lr-10">

    <?php $arg1= arg(1);

      $view_result =views_get_view_result('job_status','block_1', $arg1);

       if(!empty($view_result)) { ?>

    <h3 class="presentation_heading">
      Tracking
    </h3>


      <?php print views_embed_view('job_status','block_1', $arg1); ?>

<?php } ?>


 </div>
  </div>
      </div>
      <div class="col-md-9">
		<h3 class="page-sub-heading">SENDER</h3>

        <div class="right_job_section">
          <div class="sender_detail">
            <div class="row">
              <div class="col-md-5">
                <div class="senderDetail">
                  <?php if (!empty($form['field_sender_manual_entry'])): ?>
                  <?php print drupal_render($form['field_sender_manual_entry']); ?>
                  <?php endif; ?>
                  <?php if (!empty($form['field_sender_third_party'])): ?>
                  <?php print drupal_render($form['field_sender_third_party']); ?>
                  <?php endif; ?>
                  <?php if (!empty($form['field_origin'])): ?>
                  <?php print drupal_render($form['field_origin']); ?>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-lg-7 col-sm-7 col-xs-12 col-md-7">
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="senderBranch">
                      <?php if (!empty($form['field_sender_branch'])): ?>
                      <?php print drupal_render($form['field_sender_branch']); ?>
                      <?php endif; ?>
                      <?php if (!empty($form['field_delivery_status'])): ?>
                      <?php print drupal_render($form['field_delivery_status']); ?>
                      <?php endif; ?>
                      <div class="ready-wrapper">
                      <?php if (!empty($form['field_ready'])): ?>
                      <?php print drupal_render($form['field_ready']); ?>
                      <?php endif; ?>
                      <?php if (!empty($form['field_ready_time'])): ?>
                      <?php print drupal_render($form['field_ready_time']); ?>
                      <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="collectionCharge">
                      <?php if (!empty($form['field_collection_charge'])): ?>
                      <?php print drupal_render($form['field_collection_charge']); ?>
                      <?php endif; ?>
                      <?php if (!empty($form['field_charge_collector_name'])): ?>
                      <?php print drupal_render($form['field_charge_collector_name']); ?>
                      <?php endif; ?>
                      <?php if (!empty($form['field_cost'])): ?>
                      <?php print drupal_render($form['field_cost']); ?>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="pickupNotes col-xs-12">
                      <?php if (!empty($form['field_pickup_notes'])): ?>
                      <?php print drupal_render($form['field_pickup_notes']); ?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="recevier_detail">
		  <h3 class="page-sub-heading">RECEIVER</h3>
            <div class="row">
              <div class="col-md-5">


                <div class="receiverDetail">
                  <?php if (!empty($form['field_receiver_manual_entry'])): ?>
                  <?php print drupal_render($form['field_receiver_manual_entry']); ?>
                  <?php endif; ?>
                  <?php if (!empty($form['field_receiver_third_party'])): ?>
                  <?php print drupal_render($form['field_receiver_third_party']); ?>
                  <?php endif; ?>
                  <?php if (!empty($form['field_destination'])): ?>
                  <?php print drupal_render($form['field_destination']); ?>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-lg-7 col-sm-7 col-xs-12 col-md-7">
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="receiverBranch">
                      <?php if (!empty($form['field_receiver_branch'])): ?>
                      <?php print drupal_render($form['field_receiver_branch']); ?>
                      <?php endif; ?>
                      <?php if (!empty($form['field_collect_at_branch'])): ?>
                      <?php print drupal_render($form['field_collect_at_branch']); ?>
                      <?php endif; ?>
                    </div>
                    <!--1-->

                    <div class="receiverBranch">
                      <?php if (!empty($form['field_receiver_branch'])): ?>
                      <?php print drupal_render($form['field_receiver_branch']); ?>
                      <?php endif; ?>
                      <?php if (!empty($form['field_collect_at_branch'])): ?>
                      <?php print drupal_render($form['field_collect_at_branch']); ?>
                      <?php endif; ?>
                    </div>
                    <!--2-->
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="onforwarderCover">
                      <?php if (!empty($form['field_onforwarder'])): ?>
                      <?php print drupal_render($form['field_onforwarder']); ?>
                      <?php endif; ?>
                      <?php if (!empty($form['field_forwarder_list'])): ?>
                      <?php print drupal_render($form['field_forwarder_list']); ?>
                      <?php endif; ?>
                      <?php if (!empty($form['field_onforwarder_reference'])): ?>
                      <?php print drupal_render($form['field_onforwarder_reference']); ?>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="deliveryNotes col-xs-12">
                      <?php if (!empty($form['field_delivery_notes'])): ?>
                      <?php print drupal_render($form['field_delivery_notes']); ?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--row end -->
  <div class="row">
    <div class="padding-lr-40">
      <div class="calculate-button col-sm-12">
          <?php if (!empty($form['refresh_calculate'])): ?>
            <?php print drupal_render($form['refresh_calculate']); ?>
          <?php endif; ?>
      </div>
      <div class="col-sm-12">
        <div class="table-responsive">
          <?php if (!empty($form['field_items'])): ?>
          <?php print drupal_render($form['field_items']); ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-sm-12">
            <div class="table-calculate">
        <div class="table-responsive">
          <?php if (!empty($form['total_breakup_markup'])): ?>
          <?php print drupal_render($form['total_breakup_markup']); ?>
          <?php endif; ?>
            </div>

        </div>
      </div>
      <div class="col-md-4 load_restraints">
        <?php if (!empty($form['field_load_restraints'])): ?>
        <?php print drupal_render($form['field_load_restraints']); ?>
        <?php endif; ?>
      </div>

	  <div class="col-md-4 receiver_Branch_box">
			<h3 class="page-in-chep-heading">Pallet Control</h3>
		  <div class="receiverBranch">
			<?php if (!empty($form['field_in_chep'])): ?>
			<?php print drupal_render($form['field_in_chep']); ?>
			<?php endif; ?>
			<?php if (!empty($form['field_in_loscam'])): ?>
			<?php print drupal_render($form['field_in_loscam']); ?>
			<?php endif; ?>
		  </div>
		  <div class="receiverBranch">
			<?php if (!empty($form['field_out_chep'])): ?>
			<?php print drupal_render($form['field_out_chep']); ?>
			<?php endif; ?>
			<?php if (!empty($form['field_out_loscam'])): ?>
			<?php print drupal_render($form['field_out_loscam']); ?>
			<?php endif; ?>
		  </div>
		</div>
      <div class="col-md-4 all_cost">
      	<h3 class="page-in-chep-heading">Total Price</h3>
        <?php if (!empty($form['field_total_price'])): ?>
        <?php print drupal_render($form['field_total_price']); ?>
        <?php endif; ?>
         <?php if (!empty($form['field_handling_fee'])): ?>
        <?php print drupal_render($form['field_handling_fee']); ?>
        <?php endif; ?>

        <?php if (!empty($form['field_hand_unload_fee'])): ?>
        <?php print drupal_render($form['field_hand_unload_fee']); ?>
        <?php endif; ?>


        <?php if (!empty($form['field_include_pickup_fee'])): ?>
        <?php print drupal_render($form['field_include_pickup_fee']); ?>
        <?php endif; ?>

         <?php if (!empty($form['field_include_delivery_fee'])): ?>
        <?php print drupal_render($form['field_include_delivery_fee']); ?>
        <?php endif; ?>



      </div>

    </div>
  </div>
  <!--row end -->
  <!-- <table class="calculation-price-display">
   <tr class=""><td>Frieght Cost</td><td></td></tr>
   <tr class=""><td>Pichup Fee</td><td></td></tr>
   <tr class=""><td>Delivery Fee</td><td></td></tr>
   <tr class=""><td>Fuel</td><td></td></tr>
   <tr class=""><td>Handing Fee</td><td></td></tr>
   <tr class=""><td>Hand Unload Fee</td><td></td></tr>
   <tr class=""><td>Third Party Charge</td><td></td></tr>
   <tr class=""><td>Grand Total</td><td></td></tr>
   <tr class=""><td>DG charge</td><td></td></tr>
   <tr class=""><td>Express Fee</td><td></td></tr>
 </table> -->

  <!--row end -->
  <div class="row">
    <div class="padding-lr-40">
          <div class="row hidden-xs hidden-xs"> <?php if (!empty($form['field_manual_change_to_price'])): ?>
        <?php print drupal_render($form['field_manual_change_to_price']); ?>
        <?php endif; ?>

     <?php print drupal_render_children($form); ?></div>
  </div>


</div>
</div>

<div class="modal-ajax"></div>
<script type="text/javascript" language="javascript">
      var submitted = false;
      window.onbeforeunload = function() {
        if(jQuery('.changes-warning').attr('style') && !submitted){
          var Ans = confirm("Are you sure you want change page!");
          if(Ans==true)
              return true;
          else
              return false
        }
      };
     jQuery(".form-actions #edit-submit").click(function() {
       submitted = true;
     });
     jQuery(".form-actions #edit-save-close-button").click(function() {
       submitted = true;
     });
     jQuery(".form-actions #edit-save-new-button").click(function() {
       submitted = true;
     });
</script>
<script>
   function initAutocomplete1() {
       autocomplete11 = new google.maps.places.Autocomplete(
        (document.getElementById('edit-field-sender-third-party-und-0-field-sender-manual-address1-und-0-value')),
           {types: ['geocode']});
       autocomplete11.setComponentRestrictions(
            {'country': ['au']});
       autocomplete11.addListener('place_changed', fillInAddress11);
       autocomplete12 = new google.maps.places.Autocomplete(
        (document.getElementById('edit-field-origin-und-0-field-address-line-1-und-0-value')),
          {types: ['geocode']});
       autocomplete12.setComponentRestrictions(
            {'country': ['au']});
       autocomplete12.addListener('place_changed', fillInAddress12);
       autocomplete13 = new google.maps.places.Autocomplete(
        (document.getElementById('edit-field-destination-und-0-field-address-line-1-und-0-value')),
          {types: ['geocode']});
       autocomplete13.setComponentRestrictions(
            {'country': ['au']});
       autocomplete13.addListener('place_changed', fillInAddress13);
       autocomplete14 = new google.maps.places.Autocomplete(
        (document.getElementById('edit-field-receiver-third-party-und-0-field-receiver-address-line-1-und-0-value')),
          {types: ['geocode']});
       autocomplete14.setComponentRestrictions(
            {'country': ['au']});
       autocomplete14.addListener('place_changed', fillInAddress14);
       jQuery('#edit-field-origin-und-0-field-address-line-1-und-0-value').attr('autocomplete', 'something-new');
     }
   jQuery('#edit-field-origin-und-0-field-address-line-1-und-0-value').attr('autocomplete', 'something-new');
    function fillInAddress11() {
       var place = autocomplete11.getPlace();
     //  console.log(place);
       jQuery.each(place.address_components, function( index, value ) {
         if(value.types[0] == "locality"){
           var address1 = value.long_name;
              jQuery.each(place.address_components, function( index1, value1 ) {
                  if(value1.types[0] == "route"){
                   var address_part = value1.long_name;
                   jQuery.each(place.address_components, function( index2, value2 ) {
                       if(value2.types[0] == "street_number"){
                           var address_street = value2.long_name;
                           document.getElementById('edit-field-sender-third-party-und-0-field-sender-manual-address1-und-0-value').value = address_street + " " + address_part + "";
                       }
                   });
                  }
              });
         }
          if(value.types[0] == "locality"){
           var suburb = value.long_name;
           document.getElementById('edit-field-sender-third-party-und-0-field-sender-suburb-und-0-value').value = suburb;
          }
          if(value.types[0] == "postal_code"){
           var postal_code = value.long_name;
           document.getElementById('edit-field-sender-third-party-und-0-field-sender-postal-code-und-0-value').value = postal_code;
          }
          if(value.types[0] == "administrative_area_level_1"){
           var state = value.long_name;
           document.getElementById('edit-field-sender-third-party-und-0-field-sender-state-und-0-value').value = state;
          }
       });

    }


     function fillInAddress12() {
       var place = autocomplete12.getPlace();
       jQuery.each(place.address_components, function( index, value ) {
         if(value.types[0] == "locality"){
           var address1 = value.long_name;
              jQuery.each(place.address_components, function( index1, value1 ) {
                  if(value1.types[0] == "route"){
                   var address_part = value1.long_name;
                   jQuery.each(place.address_components, function( index2, value2 ) {
                       if(value2.types[0] == "street_number"){
                           var address_street = value2.long_name;
                           document.getElementById('edit-field-origin-und-0-field-address-line-1-und-0-value').value = address_street + " " + address_part + "";
                       }
                   });
                  }
              });
         }
          if(value.types[0] == "locality"){
           var suburb = value.long_name;
           document.getElementById('edit-field-origin-und-0-field-suburb-und-0-value').value = suburb;
          }
          if(value.types[0] == "postal_code"){
           var postal_code = value.long_name;
           document.getElementById('edit-field-origin-und-0-field-postal-code-und-0-value').value = postal_code;
          }
          if(value.types[0] == "administrative_area_level_1"){
           var state = value.long_name;
           document.getElementById('edit-field-origin-und-0-field-state-und-0-value').value = state;
          }
       });

    }

     function fillInAddress13() {
       var place = autocomplete13.getPlace();
       jQuery.each(place.address_components, function( index, value ) {
         if(value.types[0] == "locality"){
           var address1 = value.long_name;
              jQuery.each(place.address_components, function( index1, value1 ) {
                  if(value1.types[0] == "route"){
                   var address_part = value1.long_name;
                   jQuery.each(place.address_components, function( index2, value2 ) {
                       if(value2.types[0] == "street_number"){
                           var address_street = value2.long_name;
                           document.getElementById('edit-field-destination-und-0-field-address-line-1-und-0-value').value = address_street + " " + address_part + "";
                       }
                   });
                  }
              });
         }
          if(value.types[0] == "locality"){
           var suburb = value.long_name;
           document.getElementById('edit-field-destination-und-0-field-suburb-und-0-value').value = suburb;
          }
          if(value.types[0] == "postal_code"){
           var postal_code = value.long_name;
           document.getElementById('edit-field-destination-und-0-field-postal-code-und-0-value').value = postal_code;
          }
          if(value.types[0] == "administrative_area_level_1"){
           var state = value.long_name;
           document.getElementById('edit-field-destination-und-0-field-state-und-0-value').value = state;
          }
       });

    }

    function fillInAddress14() {
       var place = autocomplete14.getPlace();
       jQuery.each(place.address_components, function( index, value ) {
         if(value.types[0] == "locality"){
           var address1 = value.long_name;
              jQuery.each(place.address_components, function( index1, value1 ) {
                  if(value1.types[0] == "route"){
                   var address_part = value1.long_name;
                   jQuery.each(place.address_components, function( index2, value2 ) {
                       if(value2.types[0] == "street_number"){
                           var address_street = value2.long_name;
                           document.getElementById('edit-field-receiver-third-party-und-0-field-receiver-address-line-1-und-0-value').value = address_street + " " + address_part + "";
                       }
                   });
                  }
              });
         }
          if(value.types[0] == "locality"){
           var suburb = value.long_name;
           document.getElementById('edit-field-receiver-third-party-und-0-field-receiver-suburb-und-0-value').value = suburb;
          }
          if(value.types[0] == "postal_code"){
           var postal_code = value.long_name;
           document.getElementById('edit-field-receiver-third-party-und-0-field-receiver-postal-code-und-0-value').value = postal_code;
          }
          if(value.types[0] == "administrative_area_level_1"){
           var state = value.long_name;
           document.getElementById('edit-field-receiver-third-party-und-0-field-receiver-state-und-0-value').value = state;
          }
       });

    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9VS2sqQ9FzJp4eaWfIPcgRUNusc-23yk&libraries=places&callback=initAutocomplete1" async defer></script>
<script>
   jQuery(document).ready(function(){
     setTimeout(function(){
       jQuery('#edit-field-origin-und-0-field-address-line-1-und-0-value').attr('autocomplete', 'something-new');
       jQuery('#edit-field-sender-third-party-und-0-field-sender-manual-address1-und-0-value').attr('autocomplete', 'something-new');
       jQuery('#edit-field-destination-und-0-field-address-line-1-und-0-value').attr('autocomplete', 'something-new');
       jQuery('#edit-field-receiver-third-party-und-0-field-receiver-address-line-1-und-0-value').attr('autocomplete', 'something-new');
     }, 3000);
});
</script>
