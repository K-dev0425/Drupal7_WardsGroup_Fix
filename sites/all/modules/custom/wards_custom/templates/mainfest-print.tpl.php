 <?php
  $item_count=0;
  $qty=0;
  $total_weight=0;
  $total_cubic=0;
  $get_nid=$_GET['nid'];

  $manifest= node_load($get_nid);

  $dispatch_tid=$manifest->field_dispatch_branch['und'][0]['tid'];
  $dispatch_load=taxonomy_term_load($dispatch_tid);
  $dispatched_branch=$dispatch_load->name;

  $type_tid=$manifest->field_type['und'][0]['tid'];
  $type_load=taxonomy_term_load($type_tid);
  $type=$type_load->name;

  $driver_tid=$manifest->field_drivers['und'][0]['tid'];
  $driver_load=taxonomy_term_load($driver_tid);
  $driver=$driver_load->name;

  $date_time=explode(' ',$manifest->field_dispatch_date['und'][0]['value']);
  $dispatch_date=$date_time[0];
  $dispatch_time=$date_time[1];

  $trailer_tid=$manifest->field_trailer['und'][0]['tid'];
  $trailer_load=taxonomy_term_load($trailer_tid);
  $trailer=$trailer_load->name;
?>

<style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans');
</style>
<table style="width:100%;margin-bottom:10px;font-family: 'Open Sans';font-size: 12px;">
  <tr style="padding: 10px;">
    <th style="padding: 10px;font-size: 16px;font-family: 'Open Sans';text-align: left;font-weight: normal" colspan="3"> Wards Transport </th>
  </tr>
  <tr style="padding: 10px;">
    <td style="padding: 10px;">Dispatch Branch : <b><?php echo $dispatched_branch;?></b></td>
    <td style="padding: 10px;">Line haul manifest</td>
    <td style="padding: 10px 20px;text-align: right;">MANIFEST : #<b><?php echo $get_nid;?></b></td>
  </tr>
  <tr>
    <td style="padding: 10px;">Run Type : <b><?php echo $type;?></b></td>
    <td style="padding: 10px;">Dispatched Date : <b><?php echo $dispatch_date;?></b></td>
    <td style="padding: 10px 0;text-align: right;"><?php $properties = array('barcode_value' => 'M-'.$get_nid,
                                'encoding' => 'CODE128',
                                 'height' => 40,
                                  'image_format' => 'png',
                                  'bgcolor' => '#FFFFFF',
                                  'barcolor' => '#000000',
                                  'scale' => 2);
                  print theme('barcode_image', $properties); ?></td>
  </tr>
  <tr>
    <td style="padding: 10px;">Driver : <b><?php echo $driver;?></b></td>
    <td style="padding: 10px;">Trailer : <b><?php echo $trailer;?></b></td>
    <td style="padding: 10px 20px;text-align: right;">Dispatch time : <b><?php echo $dispatch_time;?></b></td>
  </tr>
</table>
<table style="width:100%;">
    <thead>
      <tr>
        <th style="background: #fff;font-family: Open Sans;font-size: 12px;font-weight: 300;border-top:1px solid #000; border-left:1px solid #000; border-bottom:1px solid #000; padding: 10px;color: #000;">Connote #</th>
        <th style="background: #fff;font-family:Open Sans;font-size: 12px;font-weight: 300;border-top:1px solid #000;border-left:1px solid #000; border-bottom:1px solid #000;;padding: 10px;color: #000;">Receiver</th>
        <th style="background:  #fff;font-family: Open Sans;font-size: 12px;font-weight: 300;border-top:1px solid #000;border-left:1px solid #000; border-bottom:1px solid #000;padding: 10px;color: #000;">Branch</th>
        <th style="background:  #fff;font-family: Open Sans;font-size: 12px;font-weight: 300;border-top:1px solid #000;border-left:1px solid #000; border-bottom:1px solid #000;padding: 10px;color: #000;">Item</th>
        <th style="background:  #fff;font-family:Open Sans;font-size: 12px;font-weight: 300;border-top:1px solid #000;border-left:1px solid #000; border-bottom:1px solid #000;padding: 10px;color: #000;">Qty</th>
        <th style="background:  #fff;font-family:Open Sans;font-size: 12px;font-weight: 300;border-top:1px solid #000;border-left:1px solid #000; border-bottom:1px solid #000;padding: 10px;color: #000;">Description</th>
        <th style="background: #fff;font-family: Open Sans;font-size: 12px;font-weight: 300;border-top:1px solid #000;border-left:1px solid #000; border-bottom:1px solid #000;padding: 10px;color: #000;">Weight</th>
        <th style="background:  #fff;font-family: Open Sans;font-size: 12px;font-weight: 300;border-top:1px solid #000;border-left:1px solid #000; border-bottom:1px solid #000;padding: 10px;color: #000;">Cubic</th>
        <th style="background:  #fff;font-family: Open Sans;font-size: 12px;font-weight: 300;border:1px solid #000;padding: 10px;color: #000;">Arrived</th>
      </tr>
    </thead>
  <?php
    foreach($manifest->field_avaiable_jobs[und] as $jid) {
        $job = node_load($jid['target_id']);

        $des_fc=$job->field_destination['und'][0]['value'];
        $des_load = field_collection_item_load($des_fc);

        $receiver_id=$des_load->field_receiver_name['und'][0]['target_id'];
        $receiver_load= node_load($receiver_id);
        $receiver_name=$receiver_load->title;

        $receiver_branch=$job->field_receiver_branch['und'][0]['tid'];
        $load_receiver_br=taxonomy_term_load($receiver_branch);
        $receiver_branch=$load_receiver_br->name;

        $assign_driver_id=$job->field_assigned_driver['und'][0]['tid'];
        $assign_driver_load=taxonomy_term_load($assign_driver_id);
        $assign_driver_name=$assign_driver_load->title;

        $conote=$job->field_connot_no['und'][0]['value'];
        $customer_id=$job->field_customer['und'][0]['target_id'];


        $plan_id=$job->field_job_type['und'][0]['tid'];
        $plan_load=taxonomy_term_load($plan_id);
        $plan=$plan_load->name;

        foreach($job->field_items['und'] as $iid) {
          $item_count+=1;
          $item_load= field_collection_item_load($iid['value']);
          $description=$item_load->field_description['und'][0]['value'];

          $weight=$item_load->field_weight['und'][0]['value'];
          $total_weight+=$weight;

           $cubic=$item_load->field_cubic['und'][0]['value'];
          $total_cubic+=$cubic;

          $item=$item_load->field_qty['und'][0]['value'];
          $qty+=$item;
          // echo "<pre>";
          // print_r($item_load);
          // die;
          $item_term_id=$item_load->field_item_type['und'][0]['tid'];
          $item_type_load=taxonomy_term_load($item_term_id);
          $item_type=$item_type_load->name;

        ?>
            <tbody><tr>
              <td style="padding: 10px;border-left:1px solid #000; border-bottom:1px solid #000; "><?php echo $conote;?></td>
              <td style="padding: 10px;border-left:1px solid #000;  border-bottom:1px solid #000;"><?php echo $receiver_name;?></td>
              <td style="padding: 10px;border-left:1px solid #000;  border-bottom:1px solid #000;"><?php echo $receiver_branch;?></td>
              <td style="padding: 10px;border-left:1px solid #000;  border-bottom:1px solid #000;"><?php echo $item_type;?></td>
              <td style="padding: 10px;border-left:1px solid #000;  border-bottom:1px solid #000;"><?php echo $item;?></td>
              <td style="padding: 10px;border-left:1px solid #000; border-bottom:1px solid #000;"><?php echo $description;?></td>
              <td style="padding: 10px;border-left:1px solid #000;  border-bottom:1px solid #000;"><?php echo $weight;?></td>
              <td style="padding: 10px;border-left:1px solid #000; border-bottom:1px solid #000;"><?php echo $cubic;?></td>
              <td style="padding: 10px;border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000;"></td>
        <?php } }?>

            </tr>
            <tr style="background-color: #fff;">
                 <td style="padding: 10px;"></td>
                <td style="padding: 10px;"></td><td></td><td></td>
                <td style="padding: 10px;">Total</td>
                <td rowspan="1" style="padding: 10px;"></td>
                <td style="padding: 10px;"></td>
                 <td style="padding: 10px;"></td>
                <td style="padding: 10px;"></td>
            </tr>
            <tr style="background-color: #fff;">
                <td style="padding: 10px;border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000;"><?php echo $item_count;?></td>
                <td style="padding: 10px;"></td><td></td><td></td>
                <td style="padding: 10px;border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000;"><?php echo $qty;?></td>
                <td rowspan="1" style="padding: 10px;"></td>
                <td style="padding: 10px;border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000;"><?php echo $total_weight;?></td>
                <td style="padding: 10px;border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000;"><?php echo $total_cubic;?></td>
                <td style="padding: 10px;"></td>
            </tr></tbody>
          </table>
