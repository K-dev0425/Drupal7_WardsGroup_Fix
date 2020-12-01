<?php

// job print level
    $get=$_GET['id'];
    $exp=explode('-',$get);
    $nids=explode(',',$exp[0]);

    $i_count=0;
    $p=array();
    foreach($nids as $node_load) {
        $job = node_load($node_load);
        if($job->field_sender_manual_entry['und'][0]['value'] == 1){
            $origin_fc=$job->field_sender_third_party['und'][0]['value'];
            $origin_load = field_collection_item_load($origin_fc);
            $or_name = $origin_load->field_sender_manual_name['und'][0]['value'];
            $or_add1=$origin_load->	field_sender_manual_address1['und'][0]['value'];
            $or_add2=$origin_load->field_sender_manual_address2['und'][0]['value'];
            $or_suburb=$origin_load->field_sender_suburb['und'][0]['value'];
            $or_postcode=$origin_load->field_sender_postal_code['und'][0]['value'];
            $or_state=$origin_load->field_sender_state['und'][0]['value'];
            $or_phone=$origin_load->field_sender_phone['und'][0]['value'];
        }
        else {
            $origin_fc=$job->field_origin['und'][0]['value'];
            $origin_load = field_collection_item_load($origin_fc);
            $or_name_id = $origin_load->field_sender_name['und'][0]['target_id'];
            $or_name_load=node_load($or_name_id);
            $or_name = $or_name_load->title;
            $or_add1=$origin_load->field_address_line_1['und'][0]['value'];
            $or_add2=$origin_load->field_address_line_2['und'][0]['value'];
            $or_suburb=$origin_load->field_suburb_['und'][0]['value'];
            $or_postcode=$origin_load->field_postal_code_['und'][0]['value'];
            $or_state=$origin_load->field_state['und'][0]['value'];
            $or_phone=$origin_load->field_phone['und'][0]['value'];
        }
 
         if($job->field_receiver_manual_entry['und'][0]['value'] == 1){
             $des_fc=$job->field_receiver_third_party['und'][0]['value'];
            $des_load = field_collection_item_load($des_fc);
            $des_name = $des_load->field_receiver_manual_name['und'][0]['value'];
            $des_add1=$des_load->field_receiver_address_line_1['und'][0]['value'];
            $des_add2=$des_load->field_receiver_address_line_2['und'][0]['value'];
            $des_suburb=$des_load->field_receiver_suburb['und'][0]['value'];
            $des_postcode=$des_load->field_receiver_postal_code['und'][0]['value'];
            $des_tate=$des_load->field_receiver_state['und'][0]['value'];
            $des_phone=$des_load->field_receiver_phone['und'][0]['value'];
        }
        else {
            $des_fc=$job->field_destination['und'][0]['value'];
            $des_load = field_collection_item_load($des_fc);
            $des_name_id = $des_load->field_receiver_name['und'][0]['target_id'];
            $des_name_load=node_load($des_name_id);
            $des_name = $des_name_load->title;
            $des_add1=$des_load->field_address_line_1['und'][0]['value'];
            $des_add2=$des_load->field_address_line_2['und'][0]['value'];
            $des_suburb=$des_load->field_suburb_['und'][0]['value'];
            $des_postcode=$des_load->field_postal_code_['und'][0]['value'];
            $des_tate=$des_load->field_state['und'][0]['value'];
            $des_phone=$des_load->field_phone['und'][0]['value'];
        }

        $conote=$job->field_connote_no['und'][0]['value'];
        $customer_id=$job->field_customer['und'][0]['target_id'];
        $reference=$job->field_reference['und'][0]['value'];
        $date_stamp = $job->created;
        $created_date = date('d-M-Y', $date_stamp);
        $sender_branch_id = $job->field_sender_branch['und'][0]['target_id'];
        $sender_branch_load=taxonomy_term_load($sender_branch_id);
        $sender_branch = $sender_branch_load->name;
        $receiver_branch_id = $job->field_receiver_branch['und'][0]['target_id'];
        $receiver_branch_load=taxonomy_term_load($receiver_branch_id);
        $receiver_branch = $receiver_branch_load->name;

        $plan_id= $job->field_job_type['und'][0]['target_id'];
        $plan_load=taxonomy_term_load($plan_id);
        $plan=$plan_load->name;

        foreach($job->field_items['und'] as $iid) {
          $item_count+=1;
          $item_load= field_collection_item_load($iid['value']);
          $item=$item_load->field_qty['und'][0]['value'];
          $item_term_id=$item_load->field_item_type['und'][0]['target_id'];
          $item_type_load=taxonomy_term_load($item_term_id);
          $item_type=$item_type_load->name;
          $item_qty = 0;
          $item_length = $item_load->field_length['und'][0]['value'];
          $item_width = $item_load->field_width['und'][0]['value'];
          $item_height = $item_load->field_height['und'][0]['value'];
          $item_weight = $item_load->field_weight['und'][0]['value'];

          foreach($item_load->field_item_details['und'] as $key => $value) {
          $item_details_load= field_collection_item_load($value);
          $item_no = $item_details_load->field_item_no['und'][0]['value'];

            $i_count+=1;
            $item_qty+=1;
              ?>
              <style>
              @import url('https://fonts.googleapis.com/css?family=Open+Sans');
              </style>
              <table style="width:600px;margin:0 auto;color:#333;table-layout:fixed;border-top:1px solid #000;padding-bottom:40px;">
                  <tr>
                    <td style="font-family: 'Open Sans';width:200px;font-size: 20px;padding: 2px 12px 0;font-weight:normal;text-align:center">Wards Transport</td>
                    <td style="font-family: 'Open Sans';width:200px;font-size: 10px;padding: 2px 12px 2px ;text-align:right"><?php echo $created_date;?></td>
                  </tr>
                  <tr>
                    <td style="font-family: 'Open Sans';width:200px;font-size: 10px;padding:0 12px 2px ;text-align:center">1300 492 737</td>
                    <td style="font-family: 'Open Sans';width:200px;font-size: 10px;padding:2px 12px ;text-align:right">Label: <b><?php echo $i_count;?></b> Of <b><?php echo $exp[2];?></b></td>
                  </tr>
                  <tr>
                    <th colspan="2" style="font-family: 'Open Sans';font-size: 12px;border-top:1px solid #000;border-bottom:1px solid #000;padding: 2px 0;"><b>Service : <?php echo $plan;?></b></th>
                  </tr>
                  <tr>
                    <td style="font-family: 'Open Sans';width:200px;font-size: 10px;padding: 2px 12px  ;border-left:1px solid #000;"><b>From:</b></td>
                    <td style="font-family: 'Open Sans';width:200px;font-size: 10px;padding: 2px 12px ;border-right:1px solid #000;"><b>To:</b></td>
                  </tr>
                  <tr>
                    <td style="font-family: 'Open Sans';width:200px;font-size: 10px;padding: 0 12px 2px;border-left:1px solid #000;"><?php echo $or_name;?></td>
                    <td style="font-family: 'Open Sans';width:200px;font-weight:bold;font-size: 10px;padding: 0 12px 2px ;border-right:1px solid #000;"><?php echo $des_name;?></td>
                  </tr>
                  <tr>
                    <td style="font-family: 'Open Sans';width:200px;font-size: 10px;padding: 0 12px 2px ;border-left:1px solid #000;"><?php echo $or_add1;?></td>
                    <td style="font-family: 'Open Sans';width:200px;font-weight:bold;font-size: 10px;padding: 0 12px 2px ;border-right:1px solid #000;"><?php echo $des_add1;?></td>
                  </tr>
                  <tr>
                    <td style="font-family: 'Open Sans';width:200px;font-size: 10px;padding:0 12px 2px;border-left:1px solid #000;"><?php echo $or_add2;?></td>
                    <td style="font-family: 'Open Sans';width:200px;font-weight:bold;font-size: 10px;padding:0 12px 2px;border-right:1px solid #000;"><?php echo $des_add2;?></td>
                  </tr>
                  <tr>
                    <td style="font-family: 'Open Sans';width:200px;font-size: 10px;padding:0 12px 2px ;border-left:1px solid #000;"><?php echo $or_suburb;?></td>
                    <td style="font-family: 'Open Sans';width:200px;font-size: 10px;font-weight:bold;padding:0 12px 2px ;border-right:1px solid #000;"><?php echo $des_suburb;?></td>
                  </tr>
                  <tr>
                    <td style="font-family: 'Open Sans';width:200px;font-size: 10px;padding:0 12px 2px;border-left:1px solid #000;"><?php echo $or_postcode;?></td>
                    <td style="font-family: 'Open Sans';width:200px;font-size: 10px;font-weight:bold;padding:0 12px 2px ;border-right:1px solid #000;"><?php echo $des_postcode;?></td>
                  </tr>
                  <tr>
                    <td style="font-family: 'Open Sans';width:200px;font-size: 10px;padding:0 12px 2px;border-left:1px solid #000;"><?php echo $or_state;?></td>
                    <td style="font-family: 'Open Sans';width:200px;font-size: 10px;font-weight:bold;padding:2px 12px ;border-right:1px solid #000;"><?php echo $des_tate;?></td>
                  </tr>
                  <tr>
                    <td style="font-family: 'Open Sans';width:200px;font-size: 10px;padding:0 12px 2px;border-left:1px solid #000;"><?php echo $or_phone;?></td>
                    <td style="font-family: 'Open Sans';width:200px;font-size: 10px;font-weight:bold;padding:2px 12px ;border-right:1px solid #000;"><?php echo $des_phone;?></td>
                  </tr>
                  <tr>
                    <td colspan="2" style="font-family: 'Open Sans';font-size: 7px;border-top:1px solid #000;padding: 2px 0;">Customer REF : <?php echo $reference;?></td>
                  </tr>
                  <tr>
                    <td colspan="2" style="font-family: 'Open Sans';font-size: 5px;padding: 0 0 20px; ">Instructions:</td>
                  </tr>
                  <tr>
                    <td colspan="2" style="font-family: 'Open Sans';color:#000;font-size: 15x;border-top:1px solid #000;padding:5px 0;text-align: center"><b><?php echo $des_suburb; ?></b></td>
                  </tr>
                  <tr>
                    <td colspan="2" style="font-family: 'Open Sans';font-size: 10px;padding: 2px 0;background-color:black;color:white;text-align: center"><b><?php echo $receiver_branch; ?></b><!--<span style="font-size: 13px;">(REC branch)</span>:</td>-->
                  </tr>
                  <tr>
                    <td colspan="2" style="font-family: 'Open Sans';font-size: 10px;border-top:1px solid #ddd;padding: 2px 0;text-align: center"><b> Connote # <?php echo $conote;?></b></td>
                  </tr>
                  <tr>
                    <!--Barcode -->
                    <td colspan="2" style="font-family: 'Open Sans';font-size: 10px;padding: 2px 0 2px;text-align: center">
                    <?php $properties = array('barcode_value' =>  $conote,
                               'encoding' => 'CODE128',
                                'height' => 40,
                                 'image_format' => 'png',
                                 'bgcolor' => '#FFFFFF',
                                 'barcolor' => '#000000',
                                 'scale' => 2);
                 print theme('barcode_image', $properties); ?></td>
                  </tr>
                  <tr>
                    <td style="font-family: 'Open Sans';font-size: 9px;width:200px;padding: 2px 0;border-top:1px solid #000;">ITEM: <span style="font-family: 'Open Sans';font-size:7px;"><?php echo $item_type; ?></span></td>
                    <td style="font-family: 'Open Sans';font-size: 10px;width:200px;padding: 2px 0;border-top:1px solid #000;">Item: <b><?php echo $item_qty;?></b> Of <b><?php echo $item;?></b> QTY</td>
                  </tr>
                  <tr>
                      <td></td>
                    <td style="font-family: 'Open Sans';font-size: 7px;width:200px;padding: 2px 0;">Weight: <b><?php echo $item_weight;?></b></td>
                  </tr>
                  <tr>
                      <td></td>
                    <td style="font-family: 'Open Sans';font-size: 7px;width:200px;padding: 2px 0;">Dimensions:<b><?php echo $item_length.' x '. $item_width.' x '.$item_height;?></b></td>
                  </tr>
                  <tr>
                    <!--ITEM BARCODE-->
                    <td colspan="2" style="font-family: 'Open Sans';font-size: 7px;padding: 2px 0 2px;text-align: center">
                    <?php $properties = array('barcode_value' => $item_no,
                               'encoding' => 'CODE128',
                                'height' => 40,
                                 'image_format' => 'png',
                                 'bgcolor' => '#FFFFFF',
                                 'barcolor' => '#000000',
                                 'scale' => 2);
                 print theme('barcode_image', $properties); ?></td>
                  </tr>
                  <tr>
                    <td style="font-family: 'Open Sans';font-size: 5px;text-align:center;width:200px;padding: 2px 0;border-top:3px solid #000;">Dispatch Branch : <?php echo $sender_branch;?></td>
                    <td style="font-family: 'Open Sans';font-size: 5px;text-align:center;width:200px;padding: 2px 0;border-top:3px solid #000;"><?php echo date("d-F-Y");?></td>
                  </tr>
              </table>

          <?php
           }
         }
  //    }
    }
?>
