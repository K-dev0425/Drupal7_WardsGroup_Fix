Drupal.behaviors.jobFormEnhancements = {
  attach: function (context, settings) {
    jQuery("#make_sender").once().click(function(){
      var customer_id = jQuery(".field-name-field-customer  select option:selected").val();
                      jQuery.ajax({
                          type: 'POST',
                          url: Drupal.settings.basePath + 'customer/details/ajax',
                          dataType: 'json',
                          success: function (data) {
                              jQuery(".sender_detail .field-name-field-sender-name select").val(data.customer_id);
                              jQuery('.sender_detail  .field-name-field-sender-name select').trigger('change');
                              jQuery(".sender_detail  .field-name-field-address-line-1 input").val(data.address1);
                              jQuery(".sender_detail  .field-name-field-address-line-2 input").val(data.address2);
                              jQuery(".sender_detail  .field-name-field-suburb input").val(data.suburb);
                              jQuery(".sender_detail  .field-name-field-postal-code input").val(data.postel_code);
                              jQuery('.sender_detail  .field-name-field-state select').val(data.state);
                              jQuery('.sender_detail  .field-name-field-state select').change();
                              jQuery(".sender_detail  .field-name-field-closing input").val(data.closing);
                              jQuery(".sender_detail  .field-name-field-contact-name input").val(data.contact_name);
                              jQuery(".sender_detail  .field-name-field-phone input").val(data.mobile);
                          },
                          data: {
                              'customer_id': customer_id
                          }
                      });
    });

    jQuery("#make_receiver").once().click(function(){
        var customer_id = jQuery(".field-name-field-customer  select option:selected").val();
                jQuery.ajax({
                    type: 'POST',
                    url: Drupal.settings.basePath + 'customer/details/ajax',
                    dataType: 'json',
                    success: function (data) {
                      jQuery(".recevier_detail .field-name-field-receiver-name  select").val(data.customer_id).attr("selected","selected");
                      jQuery(".recevier_detail .field-name-field-receiver-name  select").trigger('change');
                      jQuery(".recevier_detail .field-name-field-address-line-1 input").val(data.address1);
                      jQuery(".recevier_detail .field-name-field-address-line-2 input").val(data.address2);
                      jQuery(".recevier_detail .field-name-field-suburb input").val(data.suburb);
                      jQuery(".recevier_detail .field-name-field-postal-code input").val(data.postel_code);
                      jQuery(".recevier_detail #origin-state-list select").val(data.state);
                      jQuery(".recevier_detail #origin-state-list select").trigger('change');
                      jQuery(".recevier_detail .field-name-field-closing input").val(data.closing);
                      jQuery(".recevier_detail .field-name-field-contact-name input").val(data.contact_name);
                      jQuery(".recevier_detail .field-name-field-phone input").val(data.mobile);
                    },
                    data: {
                        'customer_id': customer_id
                    }
                });
     });

     jQuery( ".sender_detail .field-name-field-sender-name select option:selected" ).once().change(function() {
       var customer_id = jQuery(".sender_detail .field-name-field-sender-name select option:selected").val();

       alert(customer_id);
                jQuery.ajax({
                type: 'POST',
                url: Drupal.settings.basePath + 'customer/details/ajax',
                dataType: 'json',
                success: function (data) {
                    jQuery(".sender_detail .field-name-field-sender-name select option:selected").val(data.customer_id).attr("selected","selected");
                    jQuery(".sender_detail  .field-name-field-address-line-1 input").val(data.address1);
                    jQuery(".sender_detail  .field-name-field-address-line-2 input").val(data.address2);
                    jQuery(".sender_detail  .field-name-field-suburb input").val(data.suburb);
                    jQuery(".sender_detail  .field-name-field-postal-code input").val(data.postel_code);
                    jQuery(".sender_detail  #origin-state-list select option:selected").val(data.state);
                    jQuery(".sender_detail  .field-name-field-closing input").val(data.closing);
                    jQuery(".sender_detail  .field-name-field-contact-name input").val(data.contact_name);
                    jQuery(".sender_detail  .field-name-field-phone input").val(data.mobile);
                },
                data: {
                    'customer_id': customer_id
                }
            });
    });
    //
    // jQuery( ".field-name-field-receiver-name  select option:selected" ).once().change(function() {
    //   var customer_id = jQuery(".field-name-field-receiver-name  select option:selected").val();
    //             jQuery.ajax({
    //                 type: 'POST',
    //                 url: Drupal.settings.basePath + 'customer/details/ajax',
    //                 dataType: 'json',
    //                 success: function (data) {
    //                         jQuery(".field-name-field-receiver-name  select option:selected").val(data.customer_id).attr("selected","selected");
    //                         jQuery(".field-name-field-address-line-1 input").val(data.address1);
    //                         jQuery(".field-name-field-address-line-2 input").val(data.address2);
    //                         jQuery(".field-name-field-suburb input").val(data.suburb);
    //                         jQuery(".field-name-field-postal-code input").val(data.postel_code);
    //                         jQuery("#origin-state-list select option:selected").val(data.state);
    //                         jQuery(".field-name-field-closing input").val(data.closing);
    //                         jQuery(".field-name-field-contact-name input").val(data.contact_name);
    //                         jQuery(".field-name-field-phone input").val(data.mobile);
    //                 },
    //                 data: {
    //                     'customer_id': customer_id
    //                 }
    //             });
    // });
    jQuery(document).ready(function(){
        if(jQuery('#edit-field-delivery-status-und').is(':checked')){
                   jQuery("#recieved_in_click_value").addClass('active');
                } else{
                    jQuery("#pickup_click_value").addClass('active');
                }
        jQuery("#pickup_click_value").click(function() {
          jQuery('#edit-field-delivery-status-und').prop('checked', false);
          jQuery("#pickup_click_value").addClass('active');
          jQuery("#recieved_in_click_value").removeClass('active');
        });
        jQuery("#recieved_in_click_value").click(function() {
          jQuery('#edit-field-delivery-status-und').prop('checked', true);
          jQuery("#recieved_in_click_value").addClass('active');
          jQuery("#pickup_click_value").removeClass('active');
        });
    });

  }
};
