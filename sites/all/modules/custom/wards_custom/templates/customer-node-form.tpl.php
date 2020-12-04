<div class="my_customer_edit_box">
	<div class="container">
	  <div class="top-wrapper">
     <?php if (!empty($form['title'])): ?>
       <?php print drupal_render($form['title']); ?>
     <?php endif; ?>
     <?php if (!empty($form['field_pricing_plan'])): ?>
       <?php print drupal_render($form['field_pricing_plan']); ?>
     <?php endif; ?>
     <div class="refresh-plan-wrapper">
       <?php if (!empty($form['add_plan_link'])): ?>
         <?php print drupal_render($form['add_plan_link']); ?>
       <?php endif; ?>
       <?php if (!empty($form['refresh_plan_list'])): ?>
         <?php print drupal_render($form['refresh_plan_list']); ?>
       <?php endif; ?>
    </div>
    </div>
    <div class="bottom-wrapper">
<?php if (!empty($form['group_customer'])): ?>
   <?php print drupal_render($form['group_customer']); ?>
<?php endif; ?>
<?php if (!empty($form['group_contact_details'])): ?>
   <?php print drupal_render($form['group_contact_details']); ?>
<?php endif; ?>
<?php if (!empty($form['field_primary_contact'])): ?>
   <?php print drupal_render($form['field_primary_contact']); ?>
<?php endif; ?>
<?php if (!empty($form['field_secondary_contact'])): ?>
   <?php print drupal_render($form['field_secondary_contact']); ?>
<?php endif; ?>
<?php if (!empty($form['field_other_contact'])): ?>
   <?php print drupal_render($form['field_other_contact']); ?>
<?php endif; ?>
<?php if (!empty($form['group_address'])): ?>
   <?php print drupal_render($form['group_address']); ?>
<?php endif; ?>

<?php if (!empty($form['field_primary_address'])): ?>
   <?php print drupal_render($form['field_primary_address']); ?>
<?php endif; ?>
<?php if (!empty($form['field_business_address'])): ?>
   <?php print drupal_render($form['field_business_address']); ?>
<?php endif; ?>
<?php if (!empty($form['field_residential_address'])): ?>
   <?php print drupal_render($form['field_residential_address']); ?>
<?php endif; ?>
<?php if (!empty($form['field_other_address'])): ?>
   <?php print drupal_render($form['field_other_address']); ?>
<?php endif; ?>

<?php if (!empty($form['group_account_details'])): ?>
   <?php print drupal_render($form['group_account_details']); ?>
<?php endif; ?>
<?php if (!empty($form['group_notes'])): ?>
   <?php print drupal_render($form['group_notes']); ?>
<?php endif; ?>
<?php if (!empty($form['field_notes'])): ?>
   <?php print drupal_render($form['field_notes']); ?>
<?php endif; ?>
<?php if (!empty($form['group_attachments'])): ?>
   <?php print drupal_render($form['group_attachments']); ?>
<?php endif; ?>
<?php if (!empty($form['field_attachment'])): ?>
   <?php print drupal_render($form['field_attachment']);
   var_dump('tete')?>
<?php endif; ?>

<?php if (!empty($form['recent_jobs'])): ?>
   <?php print drupal_render($form['recent_jobs']); ?>
<?php endif; ?>

<?php print drupal_render_children($form); ?>
	</div>
	</div>
</div>
<script>
   function initAutocomplete() {
       autocomplete = new google.maps.places.Autocomplete(
        (document.getElementById('edit-field-primary-address-und-0-field-address-line-1-und-0-value')),
           {types: ['geocode']});
       autocomplete.setComponentRestrictions(
            {'country': ['au']});
       autocomplete.addListener('place_changed', fillInAddress);
       autocomplete1 = new google.maps.places.Autocomplete(
        (document.getElementById('edit-field-business-address-und-0-field-address-line-1-und-0-value')),
          {types: ['geocode']});
       autocomplete1.setComponentRestrictions(
            {'country': ['au']});
       autocomplete1.addListener('place_changed', fillInAddress1);
       autocomplete2 = new google.maps.places.Autocomplete(
        (document.getElementById('edit-field-residential-address-und-0-field-address-line-1-und-0-value')),
          {types: ['geocode']});
       autocomplete2.setComponentRestrictions(
            {'country': ['au']});
       autocomplete2.addListener('place_changed', fillInAddress2);
       autocomplete3 = new google.maps.places.Autocomplete(
        (document.getElementById('edit-field-other-address-und-0-field-address-line-1-und-0-value')),
          {types: ['geocode']});
       autocomplete3.setComponentRestrictions(
            {'country': ['au']});
       autocomplete3.addListener('place_changed', fillInAddress3);
     } 
     
    function fillInAddress() {
       var place = autocomplete.getPlace();
       jQuery.each(place.address_components, function( index, value ) {
         if(value.types[0] == "locality"){
           var address1 = value.long_name;
              jQuery.each(place.address_components, function( index1, value1 ) {
                  if(value1.types[0] == "route"){
                   var address_part = value1.long_name;
                   jQuery.each(place.address_components, function( index2, value2 ) {
                       if(value2.types[0] == "street_number"){
                           var address_street = value2.long_name;
                           document.getElementById('edit-field-primary-address-und-0-field-address-line-1-und-0-value').value = address_street + " " + address_part + "";
                       }
                   });
                  }
              });
         }
          if(value.types[0] == "locality"){
           var suburb = value.long_name;
           document.getElementById('edit-field-primary-address-und-0-field-suburb-und-0-value').value = suburb;
          }
          if(value.types[0] == "postal_code"){
           var postal_code = value.long_name;
           document.getElementById('edit-field-primary-address-und-0-field-postal-code-und-0-value').value = postal_code;
          }
          if(value.types[0] == "administrative_area_level_1"){
           var state = value.long_name;
           document.getElementById('edit-field-primary-address-und-0-field-state-und-0-value').value = state;
          }
       });

    }


     function fillInAddress1() {
       var place = autocomplete1.getPlace();
       jQuery.each(place.address_components, function( index, value ) {
         if(value.types[0] == "locality"){
           var address1 = value.long_name;
              jQuery.each(place.address_components, function( index1, value1 ) {
                  if(value1.types[0] == "route"){
                   var address_part = value1.long_name;
                   jQuery.each(place.address_components, function( index2, value2 ) {
                       if(value2.types[0] == "street_number"){
                           var address_street = value2.long_name;
                           document.getElementById('edit-field-business-address-und-0-field-address-line-1-und-0-value').value = address_street + " " + address_part + "";
                       }
                   });
                  }
              });
         }
          if(value.types[0] == "locality"){
           var suburb = value.long_name;
           document.getElementById('edit-field-business-address-und-0-field-suburb-und-0-value').value = suburb;
          }
          if(value.types[0] == "postal_code"){
           var postal_code = value.long_name;
           document.getElementById('edit-field-business-address-und-0-field-postal-code-und-0-value').value = postal_code;
          }
          if(value.types[0] == "administrative_area_level_1"){
           var state = value.long_name;
           document.getElementById('edit-field-business-address-und-0-field-state-und-0-value').value = state;
          }
       });

    }
     
     function fillInAddress2() {
       var place = autocomplete2.getPlace();
       jQuery.each(place.address_components, function( index, value ) {
         if(value.types[0] == "locality"){
           var address1 = value.long_name;
              jQuery.each(place.address_components, function( index1, value1 ) {
                  if(value1.types[0] == "route"){
                   var address_part = value1.long_name;
                   jQuery.each(place.address_components, function( index2, value2 ) {
                       if(value2.types[0] == "street_number"){
                           var address_street = value2.long_name;
                           document.getElementById('edit-field-residential-address-und-0-field-address-line-1-und-0-value').value = address_street + " " + address_part + "";
                       }
                   });
                  }
              });
         }
          if(value.types[0] == "locality"){
           var suburb = value.long_name;
           document.getElementById('edit-field-residential-address-und-0-field-suburb-und-0-value').value = suburb;
          }
          if(value.types[0] == "postal_code"){
           var postal_code = value.long_name;
           document.getElementById('edit-field-residential-address-und-0-field-postal-code-und-0-value').value = postal_code;
          }
          if(value.types[0] == "administrative_area_level_1"){
           var state = value.long_name;
           document.getElementById('edit-field-residential-address-und-0-field-state-und-0-value').value = state;
          }
       });

    }
    
    function fillInAddress3() {
       var place = autocomplete3.getPlace();
       jQuery.each(place.address_components, function( index, value ) {
         if(value.types[0] == "locality"){
           var address1 = value.long_name;
              jQuery.each(place.address_components, function( index1, value1 ) {
                  if(value1.types[0] == "route"){
                   var address_part = value1.long_name;
                   jQuery.each(place.address_components, function( index2, value2 ) {
                       if(value2.types[0] == "street_number"){
                           var address_street = value2.long_name;
                           document.getElementById('edit-field-other-address-und-0-field-address-line-1-und-0-value').value = address_street + " " + address_part + "";
                       }
                   });
                  }
              });
         }
          if(value.types[0] == "locality"){
           var suburb = value.long_name;
           document.getElementById('edit-field-other-address-und-0-field-suburb-und-0-value').value = suburb;
          }
          if(value.types[0] == "postal_code"){
           var postal_code = value.long_name;
           document.getElementById('edit-field-other-address-und-0-field-postal-code-und-0-value').value = postal_code;
          }
          if(value.types[0] == "administrative_area_level_1"){
           var state = value.long_name;
           document.getElementById('edit-field-other-address-und-0-field-state-und-0-value').value = state;
          }
       });

    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9VS2sqQ9FzJp4eaWfIPcgRUNusc-23yk&libraries=places&callback=initAutocomplete" async defer></script>