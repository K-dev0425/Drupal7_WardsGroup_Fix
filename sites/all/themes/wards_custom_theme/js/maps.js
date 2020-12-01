   function initAutocomplete1() {
       autocomplete = new google.maps.places.Autocomplete(
        (document.getElementById('edit-field-sender-third-party-und-0-field-sender-manual-address1-und-0-value')),
           {types: ['geocode']});
       autocomplete.setComponentRestrictions(
            {'country': ['au']});
       autocomplete.addListener('place_changed', fillInAddress);
       autocomplete1 = new google.maps.places.Autocomplete(
        (document.getElementById('edit-field-origin-und-0-field-address-line-1-und-0-value')),
          {types: ['geocode']});
       autocomplete1.setComponentRestrictions(
            {'country': ['au']});
       autocomplete1.addListener('place_changed', fillInAddress1);
       autocomplete2 = new google.maps.places.Autocomplete(
        (document.getElementById('edit-field-destination-und-0-field-address-line-1-und-0-value')),
          {types: ['geocode']});
       autocomplete2.setComponentRestrictions(
            {'country': ['au']});
       autocomplete2.addListener('place_changed', fillInAddress2);
       autocomplete3 = new google.maps.places.Autocomplete(
        (document.getElementById('edit-field-receiver-third-party-und-0-field-receiver-address-line-1-und-0-value')),
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
                           document.getElementById('edit-field-sender-third-party-und-0-field-sender-manual-address1-und-0-value').value = address_street + ", " + address_part + ", " + address1;
                       }
                   });
                  }
              });
         }
          if(value.types[0] == "country"){
           var address2 = value.long_name;
           document.getElementById('edit-field-sender-third-party-und-0-field-sender-manual-address2-und-0-value').value = address2;
          }
          if(value.types[0] == "administrative_area_level_2"){
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
                           document.getElementById('edit-field-origin-und-0-field-address-line-1-und-0-value').value = address_street + ", " + address_part + ", " + address1;
                       }
                   });
                  }
              });
         }
          if(value.types[0] == "country"){
           var address2 = value.long_name;
           document.getElementById('edit-field-origin-und-0-field-address-line-2-und-0-value').value = address2;
          }
          if(value.types[0] == "administrative_area_level_2"){
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
                           document.getElementById('edit-field-destination-und-0-field-address-line-1-und-0-value').value = address_street + ", " + address_part + ", " + address1;
                       }
                   });
                  }
              });
         }
          if(value.types[0] == "country"){
           var address2 = value.long_name;
           document.getElementById('edit-field-destination-und-0-field-address-line-2-und-0-value').value = address2;
          }
          if(value.types[0] == "administrative_area_level_2"){
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
                           document.getElementById('edit-field-receiver-third-party-und-0-field-receiver-address-line-1-und-0-value').value = address_street + ", " + address_part + ", " + address1;
                       }
                   });
                  }
              });
         }
          if(value.types[0] == "country"){
           var address2 = value.long_name;
           document.getElementById('edit-field-receiver-third-party-und-0-field-receiver-address-line-2-und-0-value').value = address2;
          }
          if(value.types[0] == "administrative_area_level_2"){
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