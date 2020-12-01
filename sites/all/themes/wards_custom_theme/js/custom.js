Drupal.behaviors.jobFormEnhancements = {
  attach: function (context, settings) {

    jQuery('.node-job-form').submit(function() {
        jQuery('.field-name-field-current-branch select').removeAttr('disabled');
    });

    jQuery('.invoice_refresh input').click(function(){
      jQuery('.form-item-field-invoice-no-und-0-value').toggleClass('form-disabled');
          jQuery('.invoice_refresh').toggleClass('invoice_refresh_unlock');
      var classname = jQuery('.form-item-field-invoice-no-und-0-value').attr('class');
      check = classname.split(" ");
      if(check[3]){
        jQuery('.field-name-field-invoice-no input').attr("disabled", true);
      }
      else{
       jQuery('.field-name-field-invoice-no input').attr("disabled", false);
      }
    });

    jQuery('.page-billing #edit-field-job-status-target-id-239').click(function(){
    if(jQuery('.page-billing #edit-field-job-status-target-id-239').is(':checked')){
      jQuery('.page-billing #edit-field-job-status-target-id-41').prop('checked', false);
    }
    else{
      jQuery('.page-billing #edit-field-job-status-target-id-41').prop('checked', true);
    }
    });

    jQuery( "#job-node-form-wrapper input" ).keypress(function() {
      jQuery('.changes-warning').show();
    });

    jQuery( "#job-node-form-wrapper input[type='checkbox']" ).keypress(function() {
      jQuery('.changes-warning').show();
    });

    jQuery( "#job-node-form-wrapper textarea" ).keypress(function() {
      jQuery('.changes-warning').show();
    });

    jQuery( "#job-node-form-wrapper select" ).change(function() {
      jQuery('.changes-warning').show();
    });

    jQuery('.senderDetail .field-name-field-sender-manual-entry input[type="checkbox"]').click(function() {
         if (jQuery(this).is(':checked')) {
            jQuery('.field-name-field-origin').hide();
            jQuery('.field-name-field-sender-third-party').show();
            jQuery('.field-name-field-make-sender input[value="Make Sender"]').attr("disabled", true);
         }
         else {
             jQuery('.field-name-field-origin').show();
            jQuery('.field-name-field-sender-third-party').hide();
            jQuery('.field-name-field-make-sender input[value="Make Sender"]').attr("disabled", false);
         }
    });


    jQuery('.recevier_detail .field-name-field-receiver-manual-entry input[type="checkbox"]').click(function() {
         if (jQuery(this).is(':checked')) {
             jQuery('.field-name-field-destination').hide();
            jQuery('.field-name-field-receiver-third-party').show();
            jQuery('.field-name-field-make-sender input[value="Make Receiver"]').attr("disabled", true);
         }
         else {
            jQuery('.field-name-field-receiver-third-party').hide();
            jQuery('.field-name-field-destination').show();
            jQuery('.field-name-field-make-sender input[value="Make Receiver"]').attr("disabled", false);
         }

     });

    jQuery(".field-name-field-cubic input").prop("readonly", true);
    jQuery(".field-name-field-cubic input").addClass("reference-grey");
    jQuery(".field-name-field-length input,.field-name-field-width input,.field-name-field-height input").change( function() {
        jQuery('#job-node-form-wrapper table tbody tr').each(function() {
            var length=jQuery(this).find('.field-name-field-length input').val();
            var width=jQuery(this).find('.field-name-field-width input').val();
            var height=jQuery(this).find('.field-name-field-height input').val();
            $caln=(length*width*height) / 1000000;
            jQuery(this).find('.field-name-field-cubic input').val($caln);
        });
    });

    /* Total Weight */
    jQuery(".field-name-field-total-weight-kg- input").prop("readonly", true);
    jQuery(".field-name-field-total-weight-kg- input").addClass("reference-grey");
    jQuery(".field-name-field-qty input,.field-name-field-weight input").change( function() {
        jQuery('#job-node-form-wrapper table tbody tr').each(function() {
            var quantity=jQuery(this).find('.field-name-field-qty input').val();
            var weight=jQuery(this).find('.field-name-field-weight input').val();
            $totalWeight=(quantity*weight);
            jQuery(this).find('.field-name-field-total-weight-kg- input').val($totalWeight);
        });
    });


      jQuery(".field-name-field-weight input").tooltipster({});
      jQuery(".field-name-field-total-weight-kg- input").once().mouseenter(function(){
       var weight = jQuery(this).val();
       if(weight != ""){
       var cost = jQuery(this).parents('tr.draggable').find(".field-name-field-weight div").text();
       var cost_hover = parseInt(cost.replace(/[^0-9\.]/g, ''), 10);
       jQuery('.field-name-field-weight input').tooltipster('content', cost_hover);
       jQuery('.field-name-field-weight input').tooltipster({
         trigger: 'custom',
         triggerOpen: {
             mouseenter: true,
             touchstart: true
         },
         triggerClose: {
             mouseleave: true,
             originClick: true,
             touchleave: true
         }
      });
       }
       else{
           jQuery('.field-name-field-weight input').tooltipster('content', 'Please Fill Customer, Sender, Reciever, Item type Field');
           jQuery('.field-name-field-weight input').tooltipster({
             trigger: 'custom',
             triggerOpen: {
                 mouseenter: true,
                 touchstart: true
             },
             triggerClose: {
                 mouseleave: true,
                 originClick: true,
                 touchleave: true
             }
          });
         }
     });

     jQuery(".field-name-field-plt-spc input").tooltipster({});
     jQuery(".field-name-field-plt-spc input").once().mouseenter(function(){
      var pl_spc = jQuery(this).val();
      if(pl_spc != ""){
      var cost = jQuery(this).parents('tr.draggable').find(".field-name-field-plt-spc div").text();
      var cost_hover = parseInt(cost.replace(/[^0-9\.]/g, ''), 10);
      jQuery('.field-name-field-plt-spc input').tooltipster('content', cost_hover);
      jQuery('.field-name-field-plt-spc input').tooltipster({
        trigger: 'custom',
        triggerOpen: {
            mouseenter: true,
            touchstart: true
        },
        triggerClose: {
            mouseleave: true,
            originClick: true,
            touchleave: true
        }
     });
      }
      else{
          jQuery('.field-name-field-plt-spc input').tooltipster('content', 'Please Fill Customer, Sender, Reciever, Item type Field');
          jQuery('.field-name-field-plt-spc input').tooltipster({
            trigger: 'custom',
            triggerOpen: {
                mouseenter: true,
                touchstart: true
            },
            triggerClose: {
                mouseleave: true,
                originClick: true,
                touchleave: true
            }
         });
        }
    });

    jQuery(document).ready(function(){
        jQuery(".address_copy_to_business").click(function(){

            var address1=jQuery('#edit-field-primary-address-und-0-field-address-line-1-und-0-value').val();
            var address2=jQuery('#edit-field-primary-address-und-0-field-address-line-2-und-0-value').val();
            var suburb=jQuery('#edit-field-primary-address-und-0-field-suburb-und-0-value').val();
            var postalcode=jQuery('#edit-field-primary-address-und-0-field-postal-code-und-0-value').val();
            var state=jQuery('#edit-field-primary-address-und-0-field-state-und-0-value').val();
            var closing=jQuery('#edit-field-primary-address-und-0-field-closing-und-0-value').val();

            jQuery("#edit-field-business-address-und-0-field-address-line-1-und-0-value").val(address1);
            jQuery("#edit-field-business-address-und-0-field-address-line-2-und-0-value").val(address2);
            jQuery("#edit-field-business-address-und-0-field-suburb-und-0-value").val(suburb);
            jQuery("#edit-field-business-address-und-0-field-postal-code-und-0-value").val(postalcode);
            jQuery("#edit-field-business-address-und-0-field-state-und-0-value").val(state);
            jQuery("#edit-field-business-address-und-0-field-closing-und-0-value").val(closing);
});
        });

        jQuery(document).ready(function(){
            jQuery(".address_copy_to_residential").click(function(){

                var address1=jQuery('#edit-field-primary-address-und-0-field-address-line-1-und-0-value').val();
                var address2=jQuery('#edit-field-primary-address-und-0-field-address-line-2-und-0-value').val();
                var suburb=jQuery('#edit-field-primary-address-und-0-field-suburb-und-0-value').val();
                var postalcode=jQuery('#edit-field-primary-address-und-0-field-postal-code-und-0-value').val();
                var state=jQuery('#edit-field-primary-address-und-0-field-state-und-0-value').val();
                var closing=jQuery('#edit-field-primary-address-und-0-field-closing-und-0-value').val();

                jQuery("#edit-field-residential-address-und-0-field-address-line-1-und-0-value").val(address1);
                jQuery("#edit-field-residential-address-und-0-field-address-line-2-und-0-value").val(address2);
                jQuery("#edit-field-residential-address-und-0-field-suburb-und-0-value").val(suburb);
                jQuery("#edit-field-residential-address-und-0-field-postal-code-und-0-value").val(postalcode);
                jQuery("#edit-field-residential-address-und-0-field-state-und-0-value").val(state);
                jQuery("#edit-field-residential-address-und-0-field-closing-und-0-value").val(closing);

            });
        });

        //primary address copy to other...in customer content type
    jQuery(document).ready(function(){
      jQuery(".address_copy_to_other").once().click(function(){

          var address1=jQuery('#edit-field-primary-address-und-0-field-address-line-1-und-0-value').val();
          var address2=jQuery('#edit-field-primary-address-und-0-field-address-line-2-und-0-value').val();
          var suburb=jQuery('#edit-field-primary-address-und-0-field-suburb-und-0-value').val();
          var postalcode=jQuery('#edit-field-primary-address-und-0-field-postal-code-und-0-value').val();
          var state=jQuery('#edit-field-primary-address-und-0-field-state-und-0-value').val();
          var closing=jQuery('#edit-field-primary-address-und-0-field-closing-und-0-value').val();

          jQuery("#edit-field-other-address-und-0-field-address-line-1-und-0-value").val(address1);
          jQuery("#edit-field-other-address-und-0-field-address-line-2-und-0-value").val(address2);
          jQuery("#edit-field-other-address-und-0-field-suburb-und-0-value").val(suburb);
          jQuery("#edit-field-other-address-und-0-field-postal-code-und-0-value").val(postalcode);
          jQuery("#edit-field-other-address-und-0-field-state-und-0-value").val(state);
          jQuery("#edit-field-other-address-und-0-field-closing-und-0-value").val(closing);

      });
    });

    // jQuery("#edit-field-primary-address-und-0-field-suburb-und").once().click(function() {
    //   var suburb_id = jQuery("#edit-field-primary-address-und-0-field-suburb-und").val();
    //                   jQuery.ajax({
    //                       type: 'POST',
    //                       url: Drupal.settings.basePath + '?q=suburb/ajax',
    //                       dataType: 'json',
    //                       success: function (data) {
    //                         jQuery("#edit-field-primary-address-und-0-field-postal-code-und-0-value").val(data.postel_code);
    //                       },
    //                       data: {
    //                           'suburb_id': suburb_id
    //                       }
    //                   });
    // });

    // jQuery("#edit-field-business-address-und-0-field-suburb-und").once().change(function() {
    //   var suburb_id = jQuery("#edit-field-business-address-und-0-field-suburb-und").val();
    //                   jQuery.ajax({
    //                       type: 'POST',
    //                       url: Drupal.settings.basePath + '?q=suburb/ajax',
    //                       dataType: 'json',
    //                       success: function (data) {
    //                         jQuery("#edit-field-business-address-und-0-field-postal-code-und-0-value").val(data.postel_code);
    //                       },
    //                       data: {
    //                           'suburb_id': suburb_id
    //                       }
    //                   });
    // });

    // jQuery("#edit-field-residential-address-und-0-field-suburb-und").once().change(function() {
    //   var suburb_id = jQuery("#edit-field-residential-address-und-0-field-suburb-und").val();
    //                   jQuery.ajax({
    //                       type: 'POST',
    //                       url: Drupal.settings.basePath + '?q=suburb/ajax',
    //                       dataType: 'json',
    //                       success: function (data) {
    //                         jQuery("#edit-field-residential-address-und-0-field-postal-code-und-0-value").val(data.postel_code);
    //                       },
    //                       data: {
    //                           'suburb_id': suburb_id
    //                       }
    //                   });
    // });

    // jQuery("#edit-field-other-address-und-0-field-suburb-und").once().change(function() {
    //   var suburb_id = jQuery("#edit-field-other-address-und-0-field-suburb-und").val();
    //                   jQuery.ajax({
    //                       type: 'POST',
    //                       url: Drupal.settings.basePath + '?q=suburb/ajax',
    //                       dataType: 'json',
    //                       success: function (data) {
    //                         jQuery("#edit-field-other-address-und-0-field-postal-code-und-0-value").val(data.postel_code);
    //                       },
    //                       data: {
    //                           'suburb_id': suburb_id
    //                       }
    //                   });
    // });

    jQuery("#make_sender").once().click(function(){
      var customer_id = jQuery(".field-name-field-customer  select option:selected").val();
                      jQuery.ajax({
                          type: 'POST',
                          url: Drupal.settings.basePath + '?q=customer/details/ajax_a',
                          dataType: 'json',
                          success: function (data) {
                            jQuery(".sender_detail .field-name-field-sender-name select").val(data.customer_id);
                            jQuery('.sender_detail  .field-name-field-sender-name select').trigger('change');
                            jQuery(".sender_detail  .field-name-field-address-line-1 input").val(data.address1);
                            jQuery(".sender_detail  .field-name-field-address-line-2 input").val(data.address2);
                            jQuery(".sender_detail  .field-name-field-suburb- input").val(data.suburb);
                            jQuery(".sender_detail  .field-name-field-postal-code- input").val(data.postel_code);
                            jQuery('.sender_detail  .field-name-field-state input').val(data.state);
                            jQuery(".sender_detail  .field-name-field-closing input").val(data.time);
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
                    url: Drupal.settings.basePath + '?q=customer/details/ajax_a',
                    dataType: 'json',
                    success: function (data) {
                      jQuery(".recevier_detail .field-name-field-receiver-name  select").val(data.customer_id);
                      jQuery(".recevier_detail .field-name-field-receiver-name  select").trigger('change');
                      jQuery(".recevier_detail .field-name-field-address-line-1 input").val(data.address1);
                      jQuery(".recevier_detail .field-name-field-address-line-2 input").val(data.address2);
                      jQuery(".recevier_detail .field-name-field-suburb- input").val(data.suburb);
                      jQuery(".recevier_detail .field-name-field-postal-code- input").val(data.postel_code);
                      jQuery(".recevier_detail .field-name-field-state input").val(data.state);
                      jQuery(".recevier_detail .field-name-field-closing input").val(data.time);
                      jQuery(".recevier_detail .field-name-field-contact-name input").val(data.contact_name);
                      jQuery(".recevier_detail .field-name-field-phone input").val(data.mobile);
                    },
                    data: {
                        'customer_id': customer_id
                    }
                });
     });

     jQuery(".sender_detail .field-name-field-sender-name select").once().change(function() {
       var customer_id = jQuery(".sender_detail .field-name-field-sender-name select").val();
                jQuery.ajax({
                type: 'POST',
                url: Drupal.settings.basePath + '?q=customer/details/ajax_a',
                dataType: 'json',
                success: function (data) {
                    jQuery(".sender_detail  .field-name-field-address-line-1 input").val(data.address1);
                    jQuery(".sender_detail  .field-name-field-address-line-2 input").val(data.address2);
                    jQuery(".sender_detail  .field-name-field-suburb- input").val(data.suburb);
                    jQuery(".sender_detail  .field-name-field-postal-code- input").val(data.postel_code);
                    jQuery('.sender_detail  .field-name-field-state input').val(data.state);
                    jQuery(".sender_detail  .field-name-field-closing input").val(data.time);
                    jQuery(".sender_detail  .field-name-field-contact-name input").val(data.contact_name);
                    jQuery(".sender_detail  .field-name-field-phone input").val(data.mobile);
                },
                data: {
                    'customer_id': customer_id
                }
            });
    });

    jQuery(".recevier_detail .field-name-field-receiver-name  select").once().change(function() {
      var customer_id = jQuery(".recevier_detail .field-name-field-receiver-name  select").val();
                jQuery.ajax({
                    type: 'POST',
                    url: Drupal.settings.basePath + '?q=customer/details/ajax_a',
                    dataType: 'json',
                    success: function (data) {
                          jQuery(".recevier_detail .field-name-field-address-line-1 input").val(data.address1);
                          jQuery(".recevier_detail .field-name-field-address-line-2 input").val(data.address2);
                          jQuery(".recevier_detail .field-name-field-suburb- input").val(data.suburb);
                          jQuery(".recevier_detail .field-name-field-postal-code- input").val(data.postel_code);
                          jQuery(".recevier_detail .field-name-field-state input").val(data.state);
                          jQuery(".recevier_detail .field-name-field-closing input").val(data.time);
                          jQuery(".recevier_detail .field-name-field-contact-name input").val(data.contact_name);
                          jQuery(".recevier_detail .field-name-field-phone input").val(data.mobile);
                    },
                    data: {
                        'customer_id': customer_id
                    }
                });
    });

//   jQuery('.sender_detail  .field-name-field-suburb- select').once().click(function() {
//       var suburb_id = jQuery('.sender_detail  .field-name-field-suburb- select').val();
//                       jQuery.ajax({
//                           type: 'POST',
//                           url: Drupal.settings.basePath + '?q=suburb/ajax',
//                           dataType: 'json',
//                           success: function (data) {
//                             jQuery(".sender_detail  .field-name-field-postal-code- input").val(data.postel_code);
//                           },
//                           data: {
//                               'suburb_id': suburb_id
//                           }
//                       });
//     });

//     jQuery(".recevier_detail .field-name-field-suburb- select").once().click(function() {
//       var suburb_id = jQuery(".recevier_detail .field-name-field-suburb- select").val();
//                       jQuery.ajax({
//                           type: 'POST',
//                           url: Drupal.settings.basePath + '?q=suburb/ajax',
//                           dataType: 'json',
//                           success: function (data) {
//                             jQuery(".recevier_detail .field-name-field-postal-code- input").val(data.postel_code);
//                           },
//                           data: {
//                               'suburb_id': suburb_id
//                           }
//                       });
//     });


    jQuery("#manage-view-job").click(function() {
    var sender_value = jQuery('#manage-view-job').val();
    var status = 44;
    jQuery('#edit-field-sender-branch-target-id').val(sender_value);
    jQuery("#edit-field-sender-branch-target-id").trigger('change');
    jQuery('#edit-field-job-status-target-id').val(status);
    jQuery('#edit-field-job-status-target-id').trigger('change');
    jQuery('#manage-view-job-modal .modal-header .close').click();
    });

    jQuery('#edit-field-sender-branch-target-id').change(function() {
      if(jQuery('#manage-view-job').val() == ''){
       jQuery( "#edit-submit-freight-management-job" ).click();
     }
    });

    jQuery("#edit-outstand").click(function() {
        if (jQuery(this).is(':checked')) {
            jQuery('#edit-field-job-status-target-id-1-42').attr('checked', true);
            jQuery('#edit-field-job-status-target-id-1-43').attr('checked', true);
            jQuery('#edit-field-job-status-target-id-1-44').attr('checked', true);
            jQuery('#edit-field-job-status-target-id-1-55').attr('checked', true);
            jQuery('#edit-field-job-status-target-id-1-95').attr('checked', true);
            jQuery('#edit-field-job-status-target-id-1-96').attr('checked', true);
            jQuery('#edit-field-job-status-target-id-1-97').attr('checked', true);
            jQuery('#edit-field-job-status-target-id-1-98').attr('checked', true);
            jQuery( "#edit-submit-freight-management-job" ).click();
        } else {
            jQuery("#edit-outstand").attr('checked', false);
            jQuery('#edit-field-job-status-target-id-1-42').attr('checked', false);
            jQuery('#edit-field-job-status-target-id-1-43').attr('checked', false);
            jQuery('#edit-field-job-status-target-id-1-44').attr('checked', false);
            jQuery('#edit-field-job-status-target-id-1-55').attr('checked', false);
            jQuery('#edit-field-job-status-target-id-1-95').attr('checked', false);
            jQuery('#edit-field-job-status-target-id-1-96').attr('checked', false);
            jQuery('#edit-field-job-status-target-id-1-97').attr('checked', false);
            jQuery('#edit-field-job-status-target-id-1-98').attr('checked', false);
            jQuery( "#edit-submit-freight-management-job" ).click();
        }
    });

    jQuery(".field-name-field-dg input").click(function() {
         if (jQuery(this).is(':checked')) {
             jQuery(this).parents('fieldset').find('.group-dg-details').show();
             jQuery(this).parents('.field-dg-details').find('button').addClass('button-checked');
         } else {
              jQuery(this).parents('fieldset').find('.group-dg-details').hide();
              jQuery(this).parents('.field-dg-details').find('button').removeClass('button-checked');
         }
     });

     jQuery(".field-name-field-dg input").each(function() {
         if (jQuery(this).is(':checked')) {
             jQuery(this).parents('fieldset').find('.group-dg-details').show();
             jQuery(this).parents('.field-dg-details').find('button').addClass('button-checked');
         } else {
              jQuery(this).parents('fieldset').find('.group-dg-details').hide();
              jQuery(this).parents('.field-dg-details').find('button').removeClass('button-checked');
         }
     });
     /*jQuery(".modal").on("show.bs.modal", function() {
        var modal_id = jQuery(this).attr('id');
        var modal_checked = jQuery('#'+modal_id+' input[type=checkbox]').prop('checked');
         if(modal_checked == true){
         jQuery('.group-dg-details').show();
         jQuery(this).parents('.field-dg-details').find('button').addClass('button-checked');
        }  else {
          jQuery('.group-dg-details').hide();
          jQuery(this).parents('.field-dg-details').find('button').removeClass('button-checked');
          }
     });*/

     jQuery(document).ready(function(){
  //    jQuery('#edit-field-include-delivery-fee-und').prop('checked', true);
      // jQuery('#edit-field-include-pickup-fee-und').prop('checked', false);

       // if(jQuery('.field-name-field-delivery-status input').is(':checked')){
       //    jQuery("#recieved_in_click_value").addClass('active');
       //    jQuery("#pickup_click_value").removeClass('active');
       //    jQuery("#edit-field-include-pickup-fee-und").val(0);
       //    jQuery('#edit-field-include-delivery-fee-und').prop('checked', true);
       //    jQuery('#edit-field-include-pickup-fee-und').prop('checked', false);
       // } else{
       //    jQuery("#pickup_click_value").addClass('active');
       //    jQuery("#recieved_in_click_value").removeClass('active');
       //    jQuery("#edit-field-include-pickup-fee-und").val(1);
       //    jQuery('#edit-field-include-pickup-fee-und').prop('checked', true);
       // }
       jQuery("#pickup_click_value").click(function() {
         jQuery('.field-name-field-delivery-status input').prop('checked', false);
         jQuery("#pickup_click_value").addClass('active');
         jQuery("#recieved_in_click_value").removeClass('active');
         jQuery("#edit-field-include-pickup-fee-und").val(1);
         jQuery('#edit-field-include-pickup-fee-und').prop('checked', true);
         var send_branch = jQuery('.field-name-field-sender-branch select').val();
         jQuery('.field-name-field-current-branch select').val(send_branch);
         jQuery('.field-name-field-current-branch select').trigger('change');
         jQuery('.field-name-field-job-status select').val(44);
         jQuery('.field-name-field-job-status select').trigger('change');
       });
       jQuery("#recieved_in_click_value").click(function() {
         jQuery('.field-name-field-delivery-status input').prop('checked', true);
         jQuery("#recieved_in_click_value").addClass('active');
         jQuery("#pickup_click_value").removeClass('active');
         jQuery("#edit-field-include-pickup-fee-und").val(0);
         jQuery('#edit-field-include-pickup-fee-und').prop('checked', false);
         var send_branch = jQuery('.field-name-field-sender-branch select').val();
         jQuery('.field-name-field-current-branch select').val(send_branch);
         jQuery('.field-name-field-current-branch select').trigger('change');
         jQuery('.field-name-field-job-status select').val(42);
         jQuery('.field-name-field-job-status select').trigger('change');
       });
     });

        jQuery(document).ready(function(){
        if (jQuery('.field-name-field-onforwarder input[type=radio]:checked').val() == 0)
         {
          jQuery('.field-name-field-forwarder-list select').attr("disabled", true);
          jQuery('.field-name-field-onforwarder-reference input').attr("disabled", true);
          jQuery('.field-name-field-onforwarder-reference input').addClass('reference-grey');

         }
        jQuery('.field-name-field-onforwarder input[type=radio]').click(function(){
         if (jQuery(this).val() == 0)
         {
          jQuery('.field-name-field-forwarder-list select').attr("disabled", true);
          jQuery('.field-name-field-onforwarder-reference input').attr("disabled", true);
          jQuery('.field-name-field-onforwarder-reference input').addClass('reference-grey');
         }
        });
        jQuery('.field-name-field-onforwarder input[type=radio]').click(function(){
         if (jQuery(this).val() == 1)
         {
          jQuery('.field-name-field-forwarder-list select').attr("disabled", false);
          jQuery('.field-name-field-onforwarder-reference input').attr("disabled", false);
          jQuery('.field-name-field-onforwarder-reference input').removeClass('reference-grey');
         }
        });
        });

    //model onclick of manifest
  jQuery(document).ready(function(){
      jQuery("#manifest_popup_model,#manifest_popup_model1").click (function (){
          jQuery('#create_new_manifest_popup').modal('show');
          jQuery('.page-dashboard div').removeClass("vertical-tabs clearfix");
          jQuery('.page-dashboard div').find(".form-item.multiselect").hide();
          jQuery('.page-dashboard').find(".vertical-tabs-list").hide();
          jQuery('.page-dashboard').find(".menu-link-form.form-wrapper.vertical-tabs-pane").hide();
          jQuery('.page-dashboard').find("#edit-preview").hide();
      });

        jQuery("#single_job_print_labels").click (function (){
        var url = window.location.search.substring(1);
        var array=url.split('/');
        var node_id=array[1];
       // alert(array[1]);
        if(node_id !=""){
            jQuery.ajax({
                type: 'POST',
                url: Drupal.settings.basePath + '?q=jobs/data/print/ajax',
                dataType: 'json',
                success: function (data) {
                    jQuery("#manifest_print_labels_model .modal-body").html("<center><h4><b>"
                        +data.select_job+"&nbsp;Selected Job</b></h4><br>containing<br><h4><b>"
                        +data.total_jobs+"&nbsp;Job and"
                        +data.total_items+"&nbsp;Items </b></h4><br><span style='color:red'><b>This will result in a total of ("
                        +data.total_qty+")labels printed!</b></span><br><a target='_blank' href='?q=job/labels/print/pdf&id="+data.nids+"-"+data.total_items+"-"+data.total_qty+"'><button class='btn' id='print_for_runsheet'>Print</button></a></center>");
                    Drupal.attachBehaviors("#manifest_print_labels_model .modal-body");
                    jQuery('#manifest_print_labels_model').modal('show');
                },
                data: {
                    'nid_string': node_id
                }
            });
        }
    });

    jQuery("#single_manifest_print_labels").click (function (){
        var url = window.location.search.substring(1);
        var array=url.split('/');
        var node_id=array[1];
        if(node_id!=""){
            jQuery.ajax({
                type: 'POST',
                url: Drupal.settings.basePath + '?q=manifest/data/print/ajax',
                dataType: 'json',
                success: function (data) {
                    jQuery("#manifest_print_labels_model .modal-body").html("<center><h4><b>"
                        +data.select_manifest+"&nbsp;Selected Manifest</b></h4><br>containing<br><h4><b>"
                        +data.total_jobs+"&nbsp;Jobs and"
                        +data.total_items+"&nbsp;Items </b></h4><br><span style='color:red'><b>This will result in a total of ("
                        +data.total_qty+")labels printed!</b></span><br><a target='_blank' href='?q=manifest/labels/print/pdf&id="+data.nids+"-"+data.total_items+"-"+data.total_qty+"'><button class='btn' id='print_for_manifest'>Print</button></a></center>");
                    Drupal.attachBehaviors("#manifest_print_labels_model .modal-body");
                    jQuery('#manifest_print_labels_model').modal('show');
                },
                data: {
                    'nid_string': node_id
                }
            });
        }
    });

    jQuery(document).ready(function(){
        jQuery("#single_Print_fest").click (function (){
            var url = window.location.search.substring(1);
            var array=url.split('/');
            var node_id=array[1];
         //   window.location.href = '?q=fest/data/print/pdf&nid='+node_id;
          //  window.location.target = '_blank';

            window.open('?q=fest/data/print/pdf&nid='+node_id);

         });
    });

    $body = jQuery("body");
    jQuery(document).on({
      ajaxStart: function() { $body.addClass("loading");    },
      ajaxStop: function() { $body.removeClass("loading"); }
    });

  });

  }
};


jQuery(document).ready(function(){
    jQuery("#last_week_dates_fill").click(function(){
    var beforeOneWeek = new Date(new Date().getTime() - 60 * 60 * 24 * 7 * 1000)
      , day = beforeOneWeek.getDay()
      , diffToMonday = beforeOneWeek.getDate() - day + (day === 0 ? -6 : 1)
      , lastMonday = new Date(beforeOneWeek.setDate(diffToMonday))
      , lastSunday = new Date(beforeOneWeek.setDate(diffToMonday + 5));

       var month = lastSunday.getMonth()+1;
       var day = lastSunday.getDate();
       var output_sat = (day<10 ? '0' : '') + day + '/' +  (month<10 ? '0' : '') + month + '/' + lastSunday.getFullYear() ;
       var month1 = lastMonday.getMonth()+1;
       var day1 = lastMonday.getDate();
       var output_sun = (day1<10 ? '0' : '') + day1 + '/' + (month1<10 ? '0' : '') + month1 + '/' + lastMonday.getFullYear() ;
            //alert(output_sat);
        jQuery("#edit-changed-min").val(output_sun);
        jQuery("#edit-changed-max").val(output_sat);
        jQuery( "#edit-submit-billing" ).trigger( "click" );
    });
});

jQuery(document).ready(function(){
 jQuery('.form-item-outstand input').click();
});

jQuery(document).ready(function(){
     if (jQuery('.senderDetail .field-name-field-sender-manual-entry input[type="checkbox"]').is(':checked')) {
        jQuery('.field-name-field-origin').hide();
        jQuery('.field-name-field-sender-third-party').show();
        jQuery('.field-name-field-make-sender input[value="Make Sender"]').attr("disabled", true);
     }
     else {
         jQuery('.field-name-field-origin').show();
        jQuery('.field-name-field-sender-third-party').hide();
        jQuery('.field-name-field-make-sender input[value="Make Sender"]').attr("disabled", false);
     }
});

jQuery(document).ready(function(){
    if (jQuery('.recevier_detail .field-name-field-receiver-manual-entry input[type="checkbox"]').is(':checked')) {
            jQuery('.field-name-field-destination').hide();
            jQuery('.field-name-field-receiver-third-party').show();
            jQuery('.field-name-field-make-sender input[value="Make Receiver"]').attr("disabled", true);
    }
    else {
        jQuery('.field-name-field-receiver-third-party').hide();
        jQuery('.field-name-field-destination').show();
        jQuery('.field-name-field-make-sender input[value="Make Receiver"]').attr("disabled", false);
    }

});

jQuery(document).ready(function(){
  jQuery('.node-job-form').submit(function() {
      jQuery('.field-name-field-current-branch select').removeAttr('disabled');
  });
});
