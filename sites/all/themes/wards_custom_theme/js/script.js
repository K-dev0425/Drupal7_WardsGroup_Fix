(function($, Drupal) {
	Drupal.ajax.prototype.commands.afterAjaxCustomerAdd = function(ajax, response, status) {
     jQuery('#edit-refresh-customer-list').mousedown();
     jQuery('#customerAdd').modal('hide');
	};

	Drupal.behaviors.updateqty = {
    attach: function(context, settings) {
    	if (jQuery('.page-node-edit.node-type-job').length) {
        jQuery('body').removeClass('price-refreshed');
      }

      jQuery(document).on('hide.bs.modal', function (e) {
      	  if(!jQuery('body').hasClass('price-refreshed')) {
          jQuery('.form-item-field-items-und-0-field-item-type-und select').trigger('change');
          jQuery('body').addClass('price-refreshed');
        }
      });

			jQuery('.update-all-price-button').click(function() {
      	  var prcntg = jQuery('.update-all-price-value').val();
      	  if(jQuery.isNumeric(prcntg)){
      	 

					var pickup_fee = jQuery('.field-name-field-pickup-fee input').val();
					if(pickup_fee != ""){
					  if(jQuery.isNumeric(pickup_fee)){
                         var pickup_update = parseFloat(pickup_fee) + (parseFloat(pickup_fee) * parseFloat(prcntg) / 100);
					     jQuery('.field-name-field-pickup-fee input').val(parseFloat(pickup_update).toFixed(2));
				      }
				      else {
      	                alert("Fill Pickup Fee Value only Number");
      	              }
					}

					var delivery_fee = jQuery('.field-name-field-delivery-fee input').val();
					if(delivery_fee != ""){
					   if(jQuery.isNumeric(delivery_fee)){
				         var delivery_update = parseFloat(delivery_fee) + (parseFloat(delivery_fee) * parseFloat(prcntg) / 100);
					     jQuery('.field-name-field-delivery-fee input').val(parseFloat(delivery_update).toFixed(2));
				       }
				       else {
      	                alert("Fill Delivery Fee Value only Number");
      	              }
					}

					var con_fee = jQuery('.field-name-field-con-fee input').val();
					if(con_fee != ""){
					   if(jQuery.isNumeric(con_fee)){
				           var con_update = parseFloat(con_fee) + (parseFloat(con_fee) * parseFloat(prcntg) / 100);
				  	       jQuery('.field-name-field-con-fee input').val(parseFloat(con_update).toFixed(2));
				     } 
				     else {
      	                alert("Fill Con Fee Value only Number");
      	              }
					}

					var fuel_levy_fee = jQuery('.field-name-field-fuel-levy input').val();
					if(fuel_levy_fee != ""){
					  if(jQuery.isNumeric(fuel_levy_fee)){
				       var fuel_levy_update = parseFloat(fuel_levy_fee) + (parseFloat(fuel_levy_fee) * parseFloat(prcntg) / 100);
					   jQuery('.field-name-field-fuel-levy input').val(parseFloat(fuel_levy_update).toFixed(2));
			      	  }
			      	  else {
      	                alert("Fill Fuel Levy Fee Value only Number");
      	              }
					}

					var futile_pickup_fee = jQuery('.field-name-field-futile-pickup-fee input').val();
					if(futile_pickup_fee != ""){
					  if(jQuery.isNumeric(futile_pickup_fee)){
				       var futile_pickup_update = parseFloat(futile_pickup_fee) + (parseFloat(futile_pickup_fee) * parseFloat(prcntg) / 100);
					   jQuery('.field-name-field-futile-pickup-fee input').val(parseFloat(futile_pickup_update).toFixed(2));
				      }
				      else {
      	                alert("Fill Futile Pickup Fee Value only Number");
      	              }
					}

					var discount = jQuery('.field-name-field-discount input').val();
					if(discount != ""){
					  if(jQuery.isNumeric(discount)){
				       var discount_update = parseFloat(discount) + (parseFloat(discount) * parseFloat(prcntg) / 100);
					   jQuery('.field-name-field-discount input').val(parseFloat(discount_update).toFixed(2));
				      }
				      else {
      	                alert("Fill Discount Value only Number");
      	              }
					}


					jQuery('.field-name-field-cost input').each(function() {
		        	 if (!jQuery(this).parents('.field-to-range').length && !jQuery(this).parents('.update-all-price-wrap').length) {
		        	   var val = jQuery(this).val();
		             if(jQuery.isNumeric(val)) {
		                 var new_val = parseFloat(val) + (parseFloat(val) * parseFloat(prcntg) / 100);
		                 jQuery(this).val(parseFloat(new_val).toFixed(2));
		             }
		             else {
      	                alert("Fill Cost Value only Number");
                 	  }
		        	 }
		        });
      	  }
      	  else {
      	           alert("Fill Update % Value only Number");
      	  }

				  jQuery('.update-all-price-value').val('');
      });

    }
  };
}(jQuery, Drupal));


(function($, Drupal)
{
  var ajaxInitialized;

  function init()
  {
    if(Drupal.ajax && !ajaxInitialized)
    {
      Drupal.ajax.prototype.beforeSend = function (xmlhttprequest, options) {
      	this.progress.message = null;
  // For forms without file inputs, the jQuery Form plugin serializes the form
  // values, and then calls jQuery's $.ajax() function, which invokes this
  // handler. In this circumstance, options.extraData is never used. For forms
  // with file inputs, the jQuery Form plugin uses the browser's normal form
  // submission mechanism, but captures the response in a hidden IFRAME. In this
  // circumstance, it calls this handler first, and then appends hidden fields
  // to the form to submit the values in options.extraData. There is no simple
  // way to know which submission mechanism will be used, so we add to extraData
  // regardless, and allow it to be ignored in the former case.
  if (this.form) {
    options.extraData = options.extraData || {};

    // Let the server know when the IFRAME submission mechanism is used. The
    // server can use this information to wrap the JSON response in a TEXTAREA,
    // as per http://jquery.malsup.com/form/#file-upload.
    options.extraData.ajax_iframe_upload = '1';

    // The triggering element is about to be disabled (see below), but if it
    // contains a value (e.g., a checkbox, textfield, select, etc.), ensure that
    // value is included in the submission. As per above, submissions that use
    // $.ajax() are already serialized prior to the element being disabled, so
    // this is only needed for IFRAME submissions.
    var v = $.fieldValue(this.element);
    if (v !== null) {
      options.extraData[this.element.name] = Drupal.checkPlain(v);
    }
  }

  // Disable the element that received the change to prevent user interface
  // interaction while the Ajax request is in progress. ajax.ajaxing prevents
  // the element from triggering a new request, but does not prevent the user
  // from changing its value.
  $(this.element).addClass('progress-disabled').attr('disabled', true);

  // Insert progressbar or throbber.
  if (this.progress.type == 'bar') {
    var progressBar = new Drupal.progressBar('ajax-progress-' + this.element.id, eval(this.progress.update_callback), this.progress.method, eval(this.progress.error_callback));
    if (this.progress.message) {
      progressBar.setProgress(-1, this.progress.message);
    }
    if (this.progress.url) {
      progressBar.startMonitoring(this.progress.url, this.progress.interval || 1500);
    }
    this.progress.element = $(progressBar.element).addClass('ajax-progress ajax-progress-bar');
    this.progress.object = progressBar;
    $(this.element).after(this.progress.element);
  }
  else if (this.progress.type == 'throbber') {
    this.progress.element = $('<div class="ajax-progress ajax-progress-throbber"><div class="throbber">&nbsp;</div></div>');
    if (this.progress.message) {
      $('.throbber', this.progress.element).after('<div class="message">' + this.progress.message + '</div>');
    }
    $(this.element).after(this.progress.element);
  }
};
    }
  }

  Drupal.behaviors.ajaxOverride = {
    attach:function()
    {
      init();
    }
  };
}(jQuery, Drupal));
