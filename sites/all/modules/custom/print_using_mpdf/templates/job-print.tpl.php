<?php
ob_start();
// job print pdf
    $job_id=$_GET['job_id'];
    $job = node_load($job_id);
    $created=$job->created;
    $created_date=date('d-F-Y',$created);

    $connote_no=$job->field_connote_no[LANGUAGE_NONE][0]['value'];
    $job_no=$job->field_job_no[LANGUAGE_NONE][0]['value'];

    $customer_id = $job->field_customer['und'][0]['target_id'];
    $customer_load= node_load($customer_id);
    $customer = $customer_load->title;
    $customer_contact_fc1 =$customer_load->field_primary_contact['und'][0]['value'];
    $customer_contact_load1 = field_collection_item_load($customer_contact_fc1);
    $customer_phone = $customer_contact_load1->field_mobile['und'][0]['value'];
    $customer_contact_fc =$customer_load->field_primary_address['und'][0]['value'];
    $customer_contact_load = field_collection_item_load($customer_contact_fc);
    $customer_add1 = $customer_contact_load->field_address_line_1['und'][0]['value'];
    $customer_add2 = $customer_contact_load->field_address_line_2['und'][0]['value'];
    $customer_sub = $customer_contact_load->field_suburb_['und'][0]['value'];
    $customer_pcode = $customer_contact_load->field_postal_code_['und'][0]['value'];
    $customer_state = $customer_contact_load->field_state['und'][0]['value'];

    $sender_branch_id = $job->field_sender_branch['und'][0]['target_id'];
    $sender_branch_load=taxonomy_term_load($sender_branch_id);
    $sender_branch = $sender_branch_load->name;
    $receiver_branch_id = $job->field_receiver_branch['und'][0]['target_id'];
    $receiver_branch_load=taxonomy_term_load($receiver_branch_id);
    $receiver_branch = $receiver_branch_load->name;

    if($job->field_sender_manual_entry['und'][0]['value'] == 1){
            $origin_fc =$job->field_sender_third_party['und'][0]['value'];
            $origin_load = field_collection_item_load($origin_fc);
            $or_name = $origin_load->field_sender_manual_name['und'][0]['value'];
            $or_add1=$origin_load-> field_sender_manual_address1['und'][0]['value'];
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

	$font_family = "'Arial'";
 ?>

<table style="table-layout:fixed;width:100%; font-family: <?php echo $font_family; ?>;">
<tr>
   <th style="text-align:left;font-size:10px;line-height:2;padding:10px;font-weight:normal;" rowspan="5">
   <img src="data:image/png;base64,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" height="70">
   <br/><br/>
   A.B.N. 97 105 025 189<br/>
   75 Duke St South, Roma, QLD, 4455<br/>

   www.wardstransport.com.au<br/>
PH : <span style="color:#0070c0">1300 4 </span> <span style="color:#17365d;">Wards <span style="font-size:7px;">(1300 492 737)</span></span><br/>
   </th>
  </tr>
 <tr>
   <th style="text-align:left;font-size:12px;padding:10px;font-weight:bold;"></th>
   <th style="text-align:left;font-size:12px;padding:10px;font-weight:bold;" colspan="2"><?php echo $created_date; ?></th>
  <th style="text-align:center;font-size:12px;padding:10px;font-weight:bold;">Consignment Note <?php echo $connote_no;?></th>
 </tr>
 <tr>
   <td style="text-align:left;font-size:12px;padding:40px 10px;font-weight:normal;"></td>
   <td style="text-align:left;font-size:12px;padding:40px 10px;font-weight:normal;" colspan="2"></td>
   <td style="text-align:left;font-size:12px;padding:10px;font-weight:normal;"><?php $properties = array('barcode_value' => $connote_no,
                               'encoding' => 'CODE128',
                                'height' => 40,
                                 'image_format' => 'png',
                                 'bgcolor' => '#FFFFFF',
                                 'barcolor' => '#000000',
                                 'img_height' => 100,
                                 'scale' => 10);
                 print theme('barcode_image', $properties); ?>
   </td>
 </tr>
   <tr>

   <td style="font-size: 10px;padding: 9px;" width="150px;">Job ID : <b><?php echo $job_id;?></b></td>
   <td style="font-size: 10px;padding: 9px;" width="150px;">Service Type : <b><?php
     $job_id = $_GET['job_id'];
     $job = node_load($job_id);
     if(isset($job->field_job_type[LANGUAGE_NONE][0]['target_id'])){
        $service_type_tid = $job->field_job_type[LANGUAGE_NONE][0]['target_id'];
        $service_type_load = taxonomy_term_load($service_type_tid);
        $service_type = $service_type_load->name;
        echo $service_type;
     }
      ?></b></td>
   <td style="font-size: 10px;padding: 9px;" width="150px;">Service level:</td>
   <td style="font-size: 10px;padding: 9px;" width="150px;">Customer Reference : <?php
      $job_id = $_GET['job_id'];
      $job = node_load($job_id);
      if(isset($job->field_reference[LANGUAGE_NONE][0]['value'])){
         $reference = $job->field_reference[LANGUAGE_NONE][0]['value'];
         echo $reference;
      }
      ?></td>
 </tr>
 <tr>
  <td style="font-size: 9px;padding: 9px;"></td>
  <td style="font-size: 9px;padding: 9px;"></td>
  <td style="font-size: 9px;padding: 9px;"></td>
  <td style="font-size: 9px;padding: 9px;"></td>
 </tr>

</table>


<table style="table-layout:fixed;width:100%;font-family: <?php echo $font_family; ?>; color: #333;margin-bottom:20px;">
 <tr>
   <th style="background-color:#dbe5f1;font-weight:bold;font-size:11px;text-align:center;padding:10px;border: 1px solid #000;margin-bottom:5px;" colspan="3">SENDER/CONSIGNER</th>
       <th style="background-color:#fff;font-weight:bold;font-size:11px;text-align:center;padding:10px;margin-bottom:5px;" ></th>
   <th style="background-color:#dbe5f1;font-weight:bold;font-size:11px;text-align:center;padding:10px;border: 1px solid #000;margin-bottom:5px;" colspan="3">RECEIVER/CONSIGNEE</th>
         <th style="background-color:#fff;font-weight:bold;font-size:11px;text-align:center;padding:10px;margin-bottom:5px;" ></th>
   <th style="background-color:#dbe5f1;font-weight:bold;font-size:11px;text-align:center;padding:10px;border: 1px solid #000;margin-bottom:5px;" colspan="3">CUSTOMER</th>
         <th style="background-color:#fff;font-weight:bold;font-size:11px;text-align:center;padding:10px;margin-bottom:5px;" ></th>
   <th style="background-color:#dbe5f1;font-weight:bold;font-size:11px;text-align:center;padding:10px;border: 1px solid #000;margin-bottom:5px;" colspan="4">SPECIAL INSTRUCTIONS</th>
 </tr>

   <tr>
   <td style="border-left: 1px solid #000;border-right: 1px solid #000;font-weight:bold;font-size:11px;text-align:center;padding:10px 10px 0;margin-bottom:5px;" colspan="3">
   	<h2 style="font-weight:bold;font-size:11px;padding:0; margin:0;font-weight:bold;"> <?php echo $or_name; ?></h2>

   	</td>
   <td colspan="1"  ></td>
     <td style="border-left: 1px solid #000;border-right: 1px solid #000;font-weight:bold;font-size:11px;text-align:center;padding:10px 10px 0;;margin-bottom:5px;" colspan="3">
   <h2 style="font-weight:bold;font-size:11px;padding:0; margin:0;font-weight:bold;"> <?php echo $des_name; ?></h2>

     <td colspan="1"  ></td>
   <td style="border-left: 1px solid #000;border-right: 1px solid #000;font-weight:bold;font-size:11px;text-align:center;padding:10px 10px 0;;margin-bottom:5px;" colspan="3">

    <h2 style="font-weight:bold;font-size:11px;padding:0; margin:0;font-weight:bold;"> <?php echo $customer; ?></h2>

       </td>
   <td colspan="1"  ></td>
   <td style="border-left: 1px solid #000;border-right: 1px solid #000;font-weight:bold;font-size:11px;text-align:center;padding:10px 10px 0;margin-bottom:5px;" colspan="10"></td>
 </tr>

 <tr>
   <td style="border-left: 1px solid #000;border-right: 1px solid #000;font-weight:normal;font-size:9px;text-align:center;padding:0 10px;margin-bottom:5px;" colspan="3">
      <?php
      	$addresses = array();
        $addresses[] = $or_add1;
        if(!empty($or_add2)){
           $addresses[] = $or_add2;
        }
        $addresses = array_merge($addresses, array($or_suburb, $or_state, $or_postcode, $or_phone));
        echo implode(", ", array_filter($addresses));
      ?>
   </td>
   <td colspan="1"></td>
   <td style="border-left: 1px solid #000;border-right: 1px solid #000;font-weight:normal;font-size:9px;text-align:center;padding:0 10px;margin-bottom:5px;" colspan="3">
        <?php echo $des_add1.', '.$des_suburb.', '.$des_tate.', '.$des_postcode. (!empty($des_phone) ? ', '.$des_phone : ''); ?>
   </td>
   <td colspan="1"></td>
   <td style="border-left: 1px solid #000;border-right: 1px solid #000;font-weight:normal;font-size:9px;text-align:center;padding:0 10px;margin-bottom:5px;" colspan="3">
        <?php echo $customer_add1.', ' .$customer_sub.', '.$customer_state.', '.$customer_pcode. (!empty($customer_phone) ? ', '.$customer_phone : ''); ?>
   </td>
   <td colspan="1"></td>
   <td style="border-left: 1px solid #000;border-right: 1px solid #000;font-weight:normal;font-size:9px;text-align:center;padding:0 10px;margin-bottom:5px;" colspan="4"></td>
 </tr>


  <tr>
   <td style="border-left: 1px solid #000;border-right: 1px solid #000;border-bottom: 1px solid #000;font-weight:bold;font-size:7px;text-align:left;padding:10px;margin-bottom:5px;" colspan="3"  width="300px";></td>
   <td colspan="1" width="20px"; ></td>
     <td style="border-left: 1px solid #000;border-right: 1px solid #000;border-bottom: 1px solid #000;font-weight:bold;font-size:7px;text-align:left;padding:10px;margin-bottom:5px;" colspan="3"  width="300px";></td>
      <td colspan="1"  width="20px";></td>
   <td style="border-left: 1px solid #000;border-right: 1px solid #000;border-bottom: 1px solid #000;font-weight:bold;font-size:7px;text-align:left;padding:10px;margin-bottom:5px;" colspan="3" width="300px";></td>
     <td colspan="1"  width="20px"; ></td>
   <td style="border-left: 1px solid #000;border-right: 1px solid #000;border-bottom: 1px solid #000;font-weight:bold;font-size:7px;text-align:left;padding:10px;margin-bottom:5px;" colspan="10" width="300px";></td>
 </tr>

 </table>

 <?php

   $show_dangerous_goods_section = false;

   foreach($job->field_items[LANGUAGE_NONE] as $iid) {
   	  $item_id = field_collection_item_load($iid['value']);
      $fc_dg_details = $item_id->field_dg_details['und'][0]['value'];
      $fc_dg_id = field_collection_item_load($fc_dg_details);

      $dg_name = $fc_dg_id->field_dg_name['und'][0]['value'];
      $dg_un_no = $fc_dg_id->field_dg_un_no['und'][0]['value'];
      $dg_packaging_group = $fc_dg_id->field_dg_packaging_group['und'][0]['value'];
      $dg_class_id = $fc_dg_id->field_dg_class['und'][0]['target_id'];
      $dg_type_load = taxonomy_term_load($dg_class_id);
      $dg_class = $dg_type_load->name;

      if (!empty($dg_name) || !empty($dg_class) || !empty($dg_un_no) || !empty($dg_packaging_group)) {
      	 $show_dangerous_goods_section = true;
      	 break;
      }
   }

 ?>

 <table style="table-layout:fixed;width:100%;font-family: <?php echo $font_family; ?>; color: #333;border:1px solid #000;border-left: 0px solid #000;border-bottom: 0px solid #000;border-right: 0px solid #000;">

  <tr style="margin-bottom:10px;">
    <td rowspan="2" style="background-color:#fff;border-left:1px solid #000; text-align:center;font-size:9px;padding:10px 5px;font-weight:bold">SENDER REFERENCE</td>

    <td rowspan="2" style="background-color:#fff;border-left:1px solid #000;text-align:center;font-size:9px;padding:10px 5px;font-weight:bold;width:50px;">QTY</td>
    <td rowspan="2" style="background-color:#fff;border-left:1px solid #000;text-align:center;font-size:9px;padding:10px 5px;font-weight:bold">ITEM TYPE</td>
    <td rowspan="2" style="background-color:#fff;border-left:1px solid #000;text-align:center;font-size:9px;padding:10px 5px;font-weight:bold">DESCRIPTION</td>
    <td style="background-color:#fff;text-align:center;border-left:1px solid #000;border-bottom:1px solid #000;text-align:center;font-size:9px;padding:2px 5px 0px;font-weight:bold" colspan="3">DIMENSIONS (CM)</td>
    <td rowspan="2" style="background-color:#fff;text-align:center;border-left:1px solid #000;font-size:9px;padding:10px 5px;font-weight:bold">WEIGHT (Kg)</td>
    <td rowspan="2" style="background-color:#fff;text-align:center;border-left:1px solid #000;font-size:9px;padding:10px 5px;font-weight:bold">M3</td>
    <td rowspan="2"  style="background-color:#fff;text-align:center;border-left:1px solid #000;<?php echo !$show_dangerous_goods_section ? 'border-right:1px solid #000;' : ''; ?>font-size:9px;padding:10px 5px;font-weight:bold">PLT SPC</td>
    <?php if ($show_dangerous_goods_section) : ?>
    <td style="background-color:#fff;border-left:1px solid #000;text-align:center;font-size:9px;padding:2px 5px 0px;border-bottom:1px solid #000;border-right: 1px solid #000;font-weight:bold;" colspan="4">DANGEROUS GOODS</td>
    <?php endif; ?>
  </tr>

  <tr>
    <td style="background-color:#fff;border-left:1px solid #000;text-align:center;font-size:9px;padding:2px;font-weight:bold">L</td>
    <td style="background-color:#fff;border-left:1px solid #000;text-align:center;font-size:9px;padding:2px;font-weight:bold">W</td>
    <td style="background-color:#fff;border-left:1px solid #000;text-align:center;font-size:9px;padding:2px;font-weight:bold" >H</td>
    <?php if ($show_dangerous_goods_section) : ?>
    <td style="background-color:#fff;border-left:1px solid #000;border-top:1px solid #ddd;text-align:center;font-size:9px;padding:2px;width:50px;font-weight:bold"  >SHIPPING NAME</td>
    <td style="background-color:#fff;width:50px;border-left:1px solid #000;border-top:1px solid #ddd;text-align:center;font-size:9px;padding:2px;font-weight:bold" >CLASS</td>
    <td style="background-color:#fff;width:50px;border-left:1px solid #000;border-top:1px solid #ddd;text-align:center;font-size:9px;padding:2px;font-weight:bold" >UN#</td>
    <td style="background-color:#fff;width:50px;border-left:1px solid #000;border-top:1px solid #ddd;border-right:1px solid #000;text-align:center;font-size:9px;padding:2px;font-weight:bold" >PKG GRP</td>
    <?php endif; ?>
 </tr>
 <?php
   $total_length = 0;
   $total_width = 0;
   $total_height = 0;
   $total_weigth = 0;
   $total_quantity = 0;
   $total_m3 = 0;
   $total_plt_spc = 0;
   $count=0;

   foreach($job->field_items[LANGUAGE_NONE] as $iid) {
     $item_id = field_collection_item_load($iid['value']);
     $qty = $item_id->field_qty[LANGUAGE_NONE][0]['value'];
     $length = $item_id->field_length[LANGUAGE_NONE][0]['value'] ;
     $width = $item_id->field_width[LANGUAGE_NONE][0]['value'];
     $height = $item_id->field_height[LANGUAGE_NONE][0]['value'];
     $weight = $item_id->field_weight[LANGUAGE_NONE][0]['value'];
     $total_length += $length;
     $total_width += $width;
     $total_height += $height;
     $total_quantity += $qty;
     $total_weigth += $weight;
     $item_term_id = $item_id->field_item_type['und'][0]['target_id'];
     $item_type_load = taxonomy_term_load($item_term_id);
     $item_type = $item_type_load->name;
     $item_cubic = $item_id->field_cubic['und'][0]['value'];
     $total_m3 += $item_cubic;
     $plt = isset($item_id->field_plt_spc[LANGUAGE_NONE]) ? $item_id->field_plt_spc[LANGUAGE_NONE][0]['value'] : '';
     $total_plt_spc += ($plt != '') ? $plt : 0;
     $fc_dg_details = $item_id->field_dg_details['und'][0]['value'];
     $fc_dg_id = field_collection_item_load($fc_dg_details);
     $dg_name = $fc_dg_id->field_dg_name['und'][0]['value'];
     $dg_un_no = $fc_dg_id->field_dg_un_no['und'][0]['value'];
     $dg_packaging_group = $fc_dg_id->field_dg_packaging_group['und'][0]['value'];
     $dg_class_id = $fc_dg_id->field_dg_class['und'][0]['target_id'];
     $dg_type_load = taxonomy_term_load($dg_class_id);
     $dg_class = $dg_type_load->name;
    //   echo "<pre>";
    //   print_r($fc_dg_id);
    //   die;

 ?>

   <tr>
   <td style="background-color:#fff;border-left:1px solid #999;border-top:1px solid #999; text-align:center;font-size:9px;padding:2px; "><?php
    if(isset($item_id->field_reference[LANGUAGE_NONE])){
       $reference = $item_id->field_reference[LANGUAGE_NONE][0]['value'];
       echo $reference;
    }
    ?></td>
   <td style="background-color:#fff;border-left:1px solid #999;border-top:1px solid #999;border-left:1px solid #999;text-align:center;font-size:9px;padding:2px;"><?php echo $qty;?></td>
      <td style="background-color:#fff;border-top:1px solid #999;border-left:1px solid #999;text-align:center;font-size:9px;padding:2px;"><?php echo $item_type;?></td>
   <td style="background-color:#fff;border-top:1px solid #999;border-left:1px solid #999;text-align:center;font-size:9px;padding:2px;"><?php
   if(isset($item_id->field_description[LANGUAGE_NONE])){
      $description = $item_id->field_description[LANGUAGE_NONE][0]['value'];
      echo $description;
   }
   ?></td>
   <td style="background-color:#fff;width:50px;border-left:1px solid #999;border-top:1px solid #999;border-left:1px solid #999;text-align:center;font-size:9px;padding:2px;" colspan="1"><?php echo $length;?> </td>
   <td style="background-color:#fff;width:50px;border-top:1px solid #999;border-left:1px solid #999;text-align:center;font-size:9px;padding:2px;"><?php echo $width;?></td>
   <td style="background-color:#fff;width:50px;border-top:1px solid #999;border-left:1px solid #999;text-align:center;font-size:9px;padding:2px;"><?php echo $height;?></td>
   <td style="background-color:#fff;width:50px;border-top:1px solid #999;border-left:1px solid #999;text-align:center;font-size:9px;padding:2px;"><?php echo $weight;?></td>
   <td style="background-color:#fff;width:50px;border-top:1px solid #999;border-left:1px solid #999;text-align:center;font-size:9px;padding:2px;" colspan="1"><?php echo $item_cubic; ?></td>
   <td style="background-color:#fff;width:50px;border-top:1px solid #999;<?php echo !$show_dangerous_goods_section ? 'border-right:1px solid #999;' : ''; ?>border-left:1px solid #999;text-align:center;font-size:9px;padding:2px;" colspan="1"><?php echo $plt; ?> </td>
   <?php if ($show_dangerous_goods_section) : ?>
   <td style="background-color:#fff;border-top:1px solid #999;border-left:1px solid #999;text-align:center;font-size:9px;padding:2px;" colspan="1"><?php echo $dg_name;?></td>
   <td style="background-color:#fff;border-top:1px solid #999;border-left:1px solid #999;text-align:center;font-size:9px;padding:2px;" ><?php echo $dg_class;?></td>
   <td style="background-color:#fff;border-top:1px solid #999;border-left:1px solid #999;text-align:center;font-size:9px;padding:2px;" ><?php echo $dg_un_no;?></td>
   <td style="background-color:#fff;border-top:1px solid #999;border-right:1px solid #999;border-left:1px solid #999;text-align:center;font-size:9px;padding:2px;" ><?php echo $dg_packaging_group;?></td>
   <?php endif; ?>
 </tr>


 <?php $count++; } ?>

  <tr>
   <td style="background-color:#fff;border-top:1px solid #999; text-align:left;font-size:5px;padding:5px; "></td>
   <td style="background-color:#fff;border-top:1px solid #999;text-align:left;font-size:5px;padding:5px;"></td>
   <td style="background-color:#fff;border-top:1px solid #999;text-align:left;font-size:5px;padding:5px;"></td>
   <td style="background-color:#fff;border-top:1px solid #999;text-align:left;font-size:5px;padding:5px;" colspan="1"> </td>
   <td style="background-color:#fff;border-top:1px solid #999;text-align:left;font-size:5px;padding:5px;"></td>
   <td style="background-color:#fff;border-top:1px solid #999;text-align:left;font-size:5px;padding:5px;"></td>
   <td style="background-color:#fff;border-top:1px solid #999;text-align:left;font-size:5px;padding:5px;"></td>
   <td style="background-color:#fff;border-top:1px solid #999;text-align:left;font-size:5px;padding:5px;" colspan="1"></td>
   <td style="background-color:#fff;border-top:1px solid #999;text-align:left;font-size:5px;padding:5px;" colspan="1"></td>
   <td style="background-color:#fff;border-top:1px solid #999;text-align:left;font-size:5px;padding:5px;" colspan="1"></td>
   <?php if ($show_dangerous_goods_section) : ?>
   <td style="background-color:#fff;border-top:1px solid #999;text-align:left;font-size:5px;padding:5px;" ></td>
   <td style="background-color:#fff;border-top:1px solid #999;text-align:left;font-size:5px;padding:5px;" ></td>
   <td style="background-color:#fff;border-top:1px solid #999;text-align:left;font-size:5px;padding:5px;" ></td>
   <td style="background-color:#fff;border-top:1px solid #999;text-align:left;font-size:5px;padding:5px;" ></td>
   <?php endif; ?>
  </tr>
  <tr>
     <td style="background-color:#fff;border-left:1px solid #999; text-align:center;border-top:1px solid #999;border-bottom:1px solid #999;font-size:11px;padding:2px;font-weight:bold;background-color:#dbe5f1; "><b>Totals</b></td>
     <td style="background-color:#fff;text-align:center;border-top:1px solid #999;border-left:1px solid #999;border-bottom:1px solid #999;font-size:11px;padding:2px;font-weight:bold;background-color:#dbe5f1;"><?php echo $total_quantity; ?></td>
     <td style="background-color:#fff;text-align:center;border-left:1px solid #999;font-size:11px;padding:2px;font-weight:bold;"></td>
     <td style="background-color:#fff;text-align:center;font-size:11px;padding:2px;font-weight:bold;"></td>
     <td style="background-color:#fff;text-align:center;border-top:1px solid #999;border-left:1px solid #999;border-bottom:1px solid #999;font-size:11px;padding:2px;font-weight:bold;background-color:#dbe5f1;"><?php echo $total_length;?></td>
     <td style="background-color:#fff;text-align:center;border-top:1px solid #999;border-left:1px solid #999;border-bottom:1px solid #999;font-size:11px;padding:2px;font-weight:bold;background-color:#dbe5f1;"><?php echo $total_width;?></td>
     <td style="background-color:#fff;text-align:center;border-top:1px solid #999;border-left:1px solid #999;border-bottom:1px solid #999;font-size:11px;padding:2px;font-weight:bold;background-color:#dbe5f1;"><?php echo $total_height;?></td>
     <td style="background-color:#fff;text-align:center;border-top:1px solid #999;border-left:1px solid #999;border-bottom:1px solid #999;font-size:11px;padding:2px;font-weight:bold;background-color:#dbe5f1;"><?php echo $total_weigth;?></td>
     <td style="background-color:#fff;text-align:center;border-top:1px solid #999;border-left:1px solid #999;border-bottom:1px solid #999;font-size:11px;padding:2px;font-weight:bold;background-color:#dbe5f1;"><?php echo $total_m3;?></td>
     <td style="background-color:#fff;text-align:center;border-top:1px solid #999;border-left:1px solid #999;border-bottom:1px solid #999;<?php echo !$show_dangerous_goods_section ? 'border-right:1px solid #999;' : ''; ?>font-size:11px;padding:2px;font-weight:bold;background-color:#dbe5f1;"><?php echo $total_plt_spc;?></td>
     <?php if ($show_dangerous_goods_section) : ?>
     <td style="background-color:#fff;text-align:center;border-left:1px solid #999;font-size:11px;padding:2px;font-weight:bold;"></td>
     <td style="background-color:#fff;text-align:center;font-size:11px;padding:2px;font-weight:bold;"></td>
     <td style="background-color:#fff;text-align:center;font-size:11px;padding:2px;font-weight:bold;"></td>
     <td style="background-color:#fff;text-align:center;font-size:11px;padding:2px;font-weight:bold;"></td>
     <?php endif; ?>
  </tr>

 </table>



<br/>



<!--<table style="table-layout:fixed;width:100%;margin-bottom:10px">-->
<!-- <tr>-->

<!--   <th style="background-color:#000;float:center;font-size:14px;width: 100%;font-weight:normal;color:#fff;padding:5px">Driver to complete<th>-->

<!-- </tr>-->
<!-- </table>-->


<!--<table style="table-layout:fixed;width:500px;margin:5px 50px ;border-bottom:1px solid #000;">-->
<!--<tr>-->
<!--  <th style="text-align:left;font-size:5px;padding:2px;font-weight:normal;"></th>-->
<!--   <th colspan="2" style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;">Pallets In</th>-->
<!--      <th colspan="2" style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;">Pallets Out</th>-->

<!--   <th style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;width:40px;padding:2px;font-weight:normal;"></th>-->
<!--   <th style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;width:40px;padding:2px;font-weight:normal;"></th>-->
<!--   <th style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;width:40px;text-align:left;font-size:5px;padding:2px;font-weight:normal;"></th>-->
<!-- </tr>-->
<!-- <tr>-->
<!--  <td style="text-align:left;font-size:10px;padding:2px;font-weight:normal;"></td>-->
<!--   <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;">Exchange</td>-->
<!--   <td style="border-top:1px solid #000;border-left:1px solid #000;;text-align:left;font-size:5px;padding:2px;font-weight:normal;">Transfer</td>-->
<!--     <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;">Exchange</td>-->
<!--   <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;">Transfer</td>-->
<!--   <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;"></td>-->
<!--   <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;"></td>-->
<!--   <td style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;"></td>-->

<!-- </tr>-->

<!--   <tr>-->
<!--     <td  style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;">Loscam</td>-->
<!--      <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;"></td>-->
<!--   <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;"></td>-->
<!--    <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;"></td>-->
<!--   <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;"></td>-->
<!--    <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;"></td>-->
<!--   <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;"></td>-->
<!--   <td style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;"></td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--     <td  style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;">Chep</td>-->
<!--      <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;"></td>-->
<!--   <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;"></td>-->
<!--    <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;"></td>-->
<!--   <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;"></td>-->
<!--    <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;"></td>-->
<!--   <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;"></td>-->
<!--      <td style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;"></td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--     <td  style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;">Transfer DKT #</td>-->
<!--      <td colspan="2" style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;"></td>-->
<!--    <td colspan="2" style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;"></td>-->
<!--   <td width:200px; style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;"></td>-->
<!--   <td  width:200px; style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;"></td>-->
<!--     <td  width:200px; style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;text-align:left;font-size:5px;padding:2px;font-weight:normal;"></td>-->
<!--    </tr>-->
<!--    </table>-->

 <table style="table-layout:fixed;width:100%;font-family: <?php echo $font_family; ?>;margin:10px 0px;border:1px solid #000;">
    <tr>
     <td colspan="2"  width="300px"; style="width:200px;border-right:1px solid #000;text-align:left;font-size:9px;padding:2px;font-weight:normal;">Senders Signature</td>
     <td colspan="2"  width="300px"; style="width:200px;border-right:1px solid #000;text-align:left;font-size:9px;padding:2px;font-weight:normal;">Pickup Driver Signature</td>
     <td colspan="2"  width="300px"; style="width:200px;border-right:1px solid #000;text-align:left;font-size:9px;padding:2px;font-weight:normal;">Receivers signature</td>
     <td colspan="2"  width="300px"; style="width:200px;text-align:left;font-size:9px;padding:2px;font-weight:normal;">Delivery Driver Signature</td>
    </tr>

     <tr>
     <td colspan="2"  width="300px"; style="width:25%;border-top:1px solid #000;border-right:1px solid #000;text-align:left;font-size:9px;padding:2px;font-weight:normal;"><b>T&C</b> - By signing this consignment note, you acknowledge that you have read, understood and agreed to the conditions of carriage.</td>
     <td colspan="2" style="width:25%;border-top:1px solid #000;border-right:1px solid #000;text-align:left;font-size:9px;padding:2px;font-weight:normal;">FLEET #</td>
     <td colspan="2"  width="300px"; style="width:25%;border-top:1px solid #000;border-right:1px solid #000;text-align:center;font-size:9px;padding:2px;font-weight:normal;">I/We hereby agree that these goods were received in total and in good condition.</td>
     <td colspan="2" style="width:25%;border-top:1px solid #000;text-align:left;font-size:9px;padding:2px;font-weight:normal;">FLEET #</td>
    </tr>

     <tr>
     <td rowspan="2" style="border-top:1px solid #000;border-right:1px solid #000;width:100px;text-align:left;font-size:9px;padding:2px;font-weight:normal;">Signature</td>
     <td colspan="1" style="border-top:1px solid #000;border-right:1px solid #000;width:100px;text-align:left;font-size:9px;padding:10px 5px;font-weight:normal;">Name</td>
       <td rowspan="2" style="border-top:1px solid #000;border-right:1px solid #000;width:100px;text-align:left;font-size:9px;padding:2px;font-weight:normal;">Signature</td>
     <td colspan="1" style="border-top:1px solid #000;border-right:1px solid #000;width:100px;text-align:left;font-size:9px;padding:10px 5px;font-weight:normal;">Name</td>
       <td rowspan="2" style="border-top:1px solid #000;border-right:1px solid #000;width:100px;text-align:left;font-size:9px;padding:2px;font-weight:normal;">Signature</td>
     <td colspan="1" style="border-top:1px solid #000;border-right:1px solid #000;width:100px;text-align:left;font-size:9px;padding:10px 5px;font-weight:normal;">Name</td>
       <td rowspan="2" style="border-top:1px solid #000;border-right:1px solid #000;width:100px;text-align:left;font-size:9px;padding:2px;font-weight:normal;">Signature</td>
     <td colspan="1" style="border-top:1px solid #000;width:100px;text-align:left;font-size:9px;padding:10px 5px;font-weight:normal;">Name</td>
    </tr>

    <tr>
     <td colspan="1" style="border-top:1px solid #000;border-right:1px solid #000;text-align:left;font-size:9px;padding:10px 5px;;font-weight:normal;">Date</td>
     <td colspan="1" style="border-top:1px solid #000;border-right:1px solid #000;text-align:left;font-size:9px;padding:10px 5px;;font-weight:normal;">Date</td>
     <td colspan="1" style="border-top:1px solid #000;border-right:1px solid #000;text-align:left;font-size:9px;padding:10px 5px;font-weight:normal;">Date</td>
     <td colspan="1" style="border-top:1px solid #000;text-align:left;font-size:9px;padding:10px 5px;font-weight:normal;">Date</td>>
    </tr>
</table>

<table style="table-layout:fixed;width:70%;font-family: <?php echo $font_family; ?>;margin:10px 0px;">
    <tr>
     <td colspan="8" style="border-bottom: 1px solid #000; margin-bottom: 10px;">Pallet Control</td>
    </tr>
    <tr>
     <td colspan="8">&nbsp;</td>
    </tr>
     <tr>
     <td style="width: 50px; text-align: right;padding-right:5px;">In Chep</td>
     <td style="width: 100px;border: 1px solid #000; text-align: right;"><strong><?php echo $job->field_in_chep['und'][0]['value']; ?></strong></td>
     <td style="width: 50px; padding-left: 10px;padding-right:5px;text-align: right;">Out Chep</td>
     <td style="width: 100px;border: 1px solid #000; text-align: right;"><strong><?php echo $job->field_out_chep['und'][0]['value']; ?></strong></td>
     <td style="width: 70px; padding-left: 10px;padding-right:5px;text-align: right;">In Loscam</td>
     <td style="width: 100px;border: 1px solid #000; text-align: right;"><strong><?php echo $job->field_in_loscam['und'][0]['value']; ?></strong></td>
     <td style="width: 70px; padding-left: 10px;padding-right:5px;text-align: right;">Out Loscam</td>
     <td style="width: 100px;border: 1px solid #000; text-align: right;"><strong><?php echo $job->field_out_loscam['und'][0]['value']; ?></strong></td>
    </tr>

</table>

<p style="border-top:1px solid #ddd;text-align:center;font-family: <?php echo $font_family; ?>;font-size:7px;padding:5px 10px;font-weight:normal;">You should take out your own insurance cover over the goods. If you are operating a business; the goods are at your sole risk and our services are priced on this basis; and we will not accept liability for any loss of or damage to the goods, or any other losses you suffer, regardless of the cause</p>
<p style="text-align:center;font-family: <?php echo $font_family; ?>;font-size:7px;font-weight:normal;">Wards Transport is not a common carrier, all transport is done under our company Terms and Conditions of Carriage. Which is available on request or at www.wardstransport.com.au/legal/conditions</p>
<h3 style="text-align:center;font-family: <?php echo $font_family; ?>;">Wards Transport PTY LTD</h3>

<?php
	$output = ob_get_clean();
	echo $output;
