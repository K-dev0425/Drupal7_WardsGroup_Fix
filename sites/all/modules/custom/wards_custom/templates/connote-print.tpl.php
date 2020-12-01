
 <?php
  $job_id=$_GET['job_id'];
  $job = node_load($job_id);
  $created=$job->created;
  $created_date=date('d-F-Y',$created);

  $connote_no=$job->field_connot_no['und'][0]['value'];
  $job_no=$job->field_job_no['und'][0]['value'];

  $service_type_tid=$job->field_type['und'][0]['tid'];
  $service_type_load=taxonomy_term_load($service_type_tid);
  $service_type=$service_type_load->name;

  $reference=$job->field_reference['und'][0]['value'];


  ?>

<style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans');
</style>

<?php
// Barcode function start here

////Define Function
/*function bars128($text) {
  global $char128asc,$char128wid;
  $char128asc=' !"#$%&\'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^_`abcdefghijklmnopqrstuvwxyz{|}~';
$char128wid = array(
	'212222','222122','222221','121223','121322','131222','122213','122312','132212','221213', // 0-9
	'221312','231212','112232','122132','122231','113222','123122','123221','223211','221132', // 10-19
	'221231','213212','223112','312131','311222','321122','321221','312212','322112','322211', // 20-29
	'212123','212321','232121','111323','131123','131321','112313','132113','132311','211313', // 30-39
	'231113','231311','112133','112331','132131','113123','113321','133121','313121','211331', // 40-49
	'231131','213113','213311','213131','311123','311321','331121','312113','312311','332111', // 50-59
	'314111','221411','431111','111224','111422','121124','121421','141122','141221','112214', // 60-69
	'112412','122114','122411','142112','142211','241211','221114','413111','241112','134111', // 70-79
	'111242','121142','121241','114212','124112','124211','411212','421112','421211','212141', // 80-89
	'214121','412121','111143','111341','131141','114113','114311','411113','411311','113141', // 90-99
	'114131','311141','411131','211412','211214','211232','23311120'   );
  $w = $char128wid[$sum = 104];							// START symbol
  $onChar=1;
  for($x=0;$x<strlen($text);$x++)								// GO THRU TEXT GET LETTERS
    if (!( ($pos = strpos($char128asc,$text[$x])) === false )){	// SKIP NOT FOUND CHARS
	  $w.= $char128wid[$pos];
	  $sum += $onChar++ * $pos;
	}
  $w.= $char128wid[ $sum % 103 ].$char128wid[106];  		//Check Code, then END
	 					 						//Part 2, Write rows
  $html="<table id='mydiv' cellpadding=0 cellspacing=0><tr>";
  for($x=0;$x<strlen($w);$x+=2){					// code 128 widths: black border, then white space
    $b = $w[$x];
    $wd = $w[$x+1];
	$html .= "<td style='border-left:".$b."px solid #000;height:60px;width:".$wd."px;'></td>";
  }
  $html .=	"</tr><tr><td  colspan=".strlen($w)." align=center><font family=arial size=2><b>$text</b></font></td></tr></table>";
  return $html;
}


// Barcode function end here
*/
?>




<table style="table-layout:fixed;width:100%">
<tr>
    <th style="text-align:left;font-size:12px;line-height:2;font-family: 'Open Sans';padding:10px;font-weight:normal;" rowspan="5">
    <b style="text-align:left;font-size:16px;font-family: 'Open Sans';padding:10px;font-weight:bold;">WARD'S Translate</b><br/><br/>
    ABN 97 105 o25 189<br/>
    98 Wyndham Street Roma ,445-
P.o box 54<br/>

<a href="http://www.wardstransport.com.au">www.wardstransport.com.au</a><br/>
PH : <span style="color:#0070c0">1300 4 </span> <span style="color:#17365d;">Wards <span style="font-size:7px;">(1300 492 737)</spna></span><br/>
    </th>
   </tr>
  <tr>
    <th style="text-align:left;font-size:12px;font-family: 'Open Sans';padding:10px;font-weight:bold;">WARD'S Translate</th>
    <th style="text-align:left;font-size:12px;padding:10px;font-weight:bold;" colspan="2">Consimgnet Note <?php echo $connote_no;?></th>
   <th style="text-align:left;font-size:12px;padding:10px;font-weight:bold;">Original Data Entry</th>
  </tr>
  <tr>
    <td style="text-align:left;font-size:12px;font-family: 'Open Sans';padding:40px 10px;font-weight:normal;">ABN 97 105 o25 189</td>
    <td style="text-align:left;font-size:12px;font-family: 'Open Sans';padding:40px 10px;font-weight:normal;" colspan="2">07-July-2017</td>
    <td style="text-align:left;font-size:12px;font-family: 'Open Sans';padding:10px;font-weight:normal;"><?php $properties = array('barcode_value' => $connote_no,
                                'encoding' => 'CODE128',
                                 'height' => 40,
                                  'image_format' => 'png',
                                  'bgcolor' => '#FFFFFF',
                                  'barcolor' => '#000000',
                                  'scale' => 2);
                  print theme('barcode_image', $properties); ?>
    <!--<script type="text/javascript" src="http://freight.auxesisdevelopment.com/sites/all/themes/adminimal_theme/js/html2canvas.js"></script>
    <script type="text/javascript">
        html2canvas(document.getElementById('mydiv'), {
             onrendered: function(canvas) {
             var imgData = canvas.toDataURL('image/png');
             console.log(imgData);
             document.cookie = "imgUrl='"+imgData+"'";
             var x = document.cookie;
             console.log(x);
            // document.getElementById("bimg").setAttribute("src", imgData);

            }
        });
        document.write("<img src=' " + imgData + " '>");
    </script> -->
    </td>
  </tr>
    <tr>

    <td style="font-family: 'Open Sans';font-size: 12px;border:1px solid #000;padding: 9px;">Job ID : <b><?php echo $job_id;?></b></td>
    <td style="font-family: 'Open Sans';font-size: 12px;border:1px solid #000;padding: 9px;">Service Type : <b><?php echo $service_type;?></b></td>
    <td style="font-family: 'Open Sans';font-size: 12px;border:1px solid #000;padding: 9px;">Service level:</td>
    <td style="font-family: 'Open Sans';font-size: 12px;border:1px solid #000;padding: 9px;">Customer Reference : <?php echo $reference;?></td>
  </tr>
  <tr>
   <td style="font-family: 'Open Sans';font-size: 9px;padding: 9px;"></td>
   <td style="font-family: 'Open Sans';font-size: 9px;padding: 9px;"></td>
   <td style="font-family: 'Open Sans';font-size: 9px;padding: 9px;"></td>
   <td style="font-family: 'Open Sans';font-size: 9px;padding: 9px;"></td>
  </tr>
   <!-- <tr>
    <td style="text-align:left;font-size:9px;padding:10px;font-family: 'Open Sans';font-weight:normal;" colspan="3">98 Wyndham Street Roma ,445-
P.o box 54</td>
  </tr>

    <tr>
  <td style="text-align:left;font-size:9px;padding:10px;font-weight:normal;font-family: 'Open Sans';" colspan="3"><a href="http://www.wardstransport.com.au">www.wardstransport.com.au</a></td>
  </tr>-->

</table>

<!--<table style="width:100%;margin-bottom:10px;margin-top:10px; color: #333;">
  <tr>
    <th style="font-family: 'Open Sans';padding-left: 9px;text-align:left;" >PH : <span style="color:#0070c0">1300 4 </span> <span style="color:#17365d;">Wards <span style="font-size:7px;">(1300 492 737)</spna></span></th>
    <td style="font-family: 'Open Sans';font-size: 9px;border-top:1px solid #ddd;padding-top: 9px;">Job ID : <b><?php echo $job_id;?></b></td>
    <td style="font-family: 'Open Sans';font-size: 9px;border-top:1px solid #ddd;padding-top: 9px;">Service Type : <b><?php echo $service_type;?></b></td>
    <td style="font-family: 'Open Sans';font-size: 9px;border-top:1px solid #ddd;padding-top: 9px;">Service level:</td>
    <td style="font-family: 'Open Sans';font-size: 9px;border-top:1px solid #ddd;padding-top: 9px;">Customer Reference : <?php echo $reference;?></td>
  </tr>

</table>-->
<br/>
<table style="table-layout:fixed;width:100% color: #333;margin-bottom:20px;border-bottom: 1px solid #000;">
  <tr>
    <!-- <th style="background-color:#dbe5f1;font-family: 'Open Sans';font-weight:bold;font-size:14px;text-align:center;padding:10px;border: 1px solid #000;margin-bottom:10px;" colspan="3">SENDER/CONSIGNER</th>
        <th width:50px; style="background-color:#fff;font-family: 'Open Sans';font-weight:bold;font-size:14px;text-align:center;padding:10px;margin-bottom:10px;" ></th> -->
    <th style="background-color:#dbe5f1;font-family: 'Open Sans';font-weight:bold;font-size:14px;text-align:center;padding:10px;border: 1px solid #000;margin-bottom:10px;" colspan="3">CONSIGNER</th>
          <th width:50px; style="background-color:#fff;font-family: 'Open Sans';font-weight:bold;font-size:14px;text-align:center;padding:10px;margin-bottom:10px;" ></th>
    <th style="background-color:#dbe5f1;font-family: 'Open Sans';font-weight:bold;font-size:14px;text-align:center;padding:10px;border: 1px solid #000;margin-bottom:10px;" colspan="3">CUSTOMER</th>
          <th width:50px; style="background-color:#fff;font-family: 'Open Sans';font-weight:bold;font-size:14px;text-align:center;padding:10px;margin-bottom:10px;" ></th>
    <th style="background-color:#dbe5f1;font-family: 'Open Sans';font-weight:bold;font-size:14px;text-align:center;padding:10px;border: 1px solid #000;margin-bottom:10px;" colspan="4">Special instructions</th>
  </tr>

    <tr>
    <td style="border-left: 1px solid #000;border-right: 1px solid #000;font-family: 'Open Sans';font-weight:bold;font-size:11px;text-align:left;padding:10px;margin-bottom:10px;" colspan="3"></td>
    <td width:50px;  ></td>
      <td style="border-left: 1px solid #000;border-right: 1px solid #000;font-family: 'Open Sans';font-weight:bold;font-size:11px;text-align:left;padding:10px;margin-bottom:10px;" colspan="3"></td>
        <td width:50px;  ></td>
    <td style="border-left: 1px solid #000;border-right: 1px solid #000;font-family: 'Open Sans';font-weight:bold;font-size:11px;text-align:left;padding:10px;margin-bottom:10px;" colspan="3"></td>
      <td width:50px;  ></td>
    <td style="border-left: 1px solid #000;border-right: 1px solid #000;font-family: 'Open Sans';font-weight:bold;font-size:11px;text-align:left;padding:10px;margin-bottom:10px;" colspan="4"></td>
  </tr>

     <tr>
    <td style="border-left: 1px solid #000;border-right: 1px solid #000;font-family: 'Open Sans';font-weight:bold;font-size:11px;text-align:left;padding:10px;margin-bottom:10px;" colspan="3"></td>
    <td width:50px;  ></td>
      <td style="border-left: 1px solid #000;border-right: 1px solid #000;font-family: 'Open Sans';font-weight:bold;font-size:11px;text-align:left;padding:10px;margin-bottom:10px;" colspan="3"></td>
        <td width:50px;  ></td>
    <td style="border-left: 1px solid #000;border-right: 1px solid #000;font-family: 'Open Sans';font-weight:bold;font-size:11px;text-align:left;padding:10px;margin-bottom:10px;" colspan="3"></td>
      <td width:50px;  ></td>
    <td style="border-left: 1px solid #000;border-right: 1px solid #000;font-family: 'Open Sans';font-weight:bold;font-size:11px;text-align:left;padding:10px;margin-bottom:10px;" colspan="4"></td>
  </tr>


   <tr>
    <td style="border-left: 1px solid #000;border-right: 1px solid #000;font-family: 'Open Sans';font-weight:bold;font-size:11px;text-align:left;padding:10px;margin-bottom:10px;" colspan="3"></td>
    <td width:50px;  ></td>
      <td style="border-left: 1px solid #000;border-right: 1px solid #000;font-family: 'Open Sans';font-weight:bold;font-size:11px;text-align:left;padding:10px;margin-bottom:10px;" colspan="3"></td>
        <td width:50px;  ></td>
    <td style="border-left: 1px solid #000;border-right: 1px solid #000;font-family: 'Open Sans';font-weight:bold;font-size:11px;text-align:left;padding:10px;margin-bottom:10px;" colspan="3"></td>
      <td width:50px;  ></td>
    <td style="border-left: 1px solid #000;border-right: 1px solid #000;font-family: 'Open Sans';font-weight:bold;font-size:11px;text-align:left;padding:10px;margin-bottom:10px;" colspan="4"></td>
  </tr>

  </table>
<table style="table-layout:fixed;width:100% color: #333;border:1px solid #000;border-bottom: 0px solid #000;border-right: 0px solid #000;">

   <tr style="margin-bottom:10px;">
    <td style="background-color:#fff;border-bottom:1px solid #000; text-align:left;font-size:14px;padding:10px;;">Sender Reference</td>
    <td style="background-color:#fff;border-left:1px solid #000;border-bottom:1px solid #000;text-align:left;font-size:14px;padding:10px;">QTY</td>
    <td style="background-color:#fff;border-left:1px solid #000;border-bottom:1px solid #000;text-align:left;font-size:14px;padding:10px;">Descriptions</td>
    <td style="background-color:#fff;border-left:1px solid #000;border-bottom:1px solid #000;text-align:center;font-size:14px;padding:10px;" colspan="3">Dimensions (CM)</td>
    <td style="background-color:#fff;border-left:1px solid #000;border-bottom:1px solid #000;text-align:left;font-size:14px;padding:10px;">Weight (Kg)</td>
    <td style="background-color:#fff;border-left:1px solid #000;border-bottom:1px solid #000;text-align:left;font-size:14px;padding:10px;;">M3</td>
    <td style="background-color:#fff;border-left:1px solid #000;border-bottom:1px solid #000;text-align:left;font-size:14px;padding:10px;">PLT SPC</td>
    <td style="background-color:#fff;border-left:1px solid #000;text-align:center;font-size:14px;padding:10px;border-bottom:1px solid #000;border-right: 1px solid #000;" colspan="4">Dangerous Goods    </td>
  </tr>
   <tr>
    <td style="background-color:#fff; text-align:left;font-size:14px;padding:10px; "></td>
    <td style="background-color:#fff;border-left:1px solid #000;text-align:left;font-size:14px;padding:10px;"></td>
    <td style="background-color:#fff;border-left:1px solid #000;text-align:left;font-size:14px;padding:10px;"></td>
    <td style="background-color:#fff;border-left:1px solid #000;text-align:left;font-size:14px;padding:10px;" >L</td>
	<td style="background-color:#fff;border-left:1px solid #000;text-align:left;font-size:14px;padding:10px;" >W</td>
	<td style="background-color:#fff;border-left:1px solid #000;text-align:left;font-size:14px;padding:10px;" >H</td>
    <td style="background-color:#fff;border-left:1px solid #000;text-align:left;font-size:14px;padding:10px;"></td>
    <td style="background-color:#fff;border-left:1px solid #000;text-align:left;font-size:14px;padding:10px;"></td>
    <td style="background-color:#fff;border-left:1px solid #000;text-align:left;font-size:14px;padding:10px;"></td>
    <td style="background-color:#fff;border-left:1px solid #000;border-top:1px solid #ddd;text-align:left;font-size:14px;padding:10px;" >Shipping Name</td>
	<td style="background-color:#fff;border-left:1px solid #000;text-align:left;font-size:14px;padding:10px;" >Class</td>
	<td style="background-color:#fff;border-left:1px solid #000;text-align:left;font-size:14px;padding:10px;" >UN#</td>
	<td style="background-color:#fff;border-left:1px solid #000;border-right:1px solid #000;text-align:left;font-size:14px;padding:10px;" >PKG GRP</td>
	<?php
    $total_length=0;
    $total_width=0;
    $total_height=0;
    foreach($job->field_item_list['und'] as $iid){
      $item_id=field_collection_item_load($iid['value']);
      $qty=$item_id->field_qty['und'][0]['value'];
      $description=$item_id->field_description['und'][0]['value'];
      $length=$item_id->field_length['und'][0]['value'] ;
      $width=$item_id->field_width['und'][0]['value'];
      $height=$item_id->field_height['und'][0]['value'];
      $weight=$item_id->field_weight['und'][0]['value'];
      $plt=$item_id->field_plt_spc['und'][0]['value'];
      $total_length+=$length;
      $total_width+= $width;
      $total_height+=$height;

  ?>
  </tr>
    <tr>
    <td style="background-color:#fff;border-top:1px solid #000; text-align:left;font-size:14px;padding:10px; "><?php echo $reference;?></td>
    <td style="background-color:#fff;border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:14px;padding:10px;"><?php echo $qty;?></td>
    <td style="background-color:#fff;border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:14px;padding:10px;"><?php echo $description;?></td>
    <td style="background-color:#fff;border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:14px;padding:10px;" colspan="1"><?php echo $length;?> </td>
    <td style="background-color:#fff;border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:14px;padding:10px;"><?php echo $width;?></td>
    <td style="background-color:#fff;border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:14px;padding:10px;"><?php echo $height;?></td>
    <td style="background-color:#fff;border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:14px;padding:10px;"><?php echo $weight;?></td>
    <td style="background-color:#fff;border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:14px;padding:10px;" colspan="1"></td>
    <td style="background-color:#fff;border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:14px;padding:10px;" colspan="1"><?php echo $plt;?> </td>
    <td style="background-color:#fff;border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:14px;padding:10px;" colspan="1"></td>
    <td style="background-color:#fff;border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:14px;padding:10px;" ></td>
    <td style="background-color:#fff;border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:14px;padding:10px;" ></td>
    <td style="background-color:#fff;border-top:1px solid #000;border-right:1px solid #000;border-left:1px solid #000;text-align:left;font-size:14px;padding:10px;" ></td>
  </tr>
  <?php } ?>

    <tr>
      <td style="background-color:#fff; text-align:left;border-top:1px solid #000;font-size:14px;padding:10px; "></td>
      <td style="background-color:#fff;text-align:left;border-top:1px solid #000;border-left:1px solid #000;font-size:14px;padding:10px;"></td>
      <td style="background-color:#fff;;text-align:left;border-top:1px solid #000;border-left:1px solid #000;font-size:14px;padding:10px;"></td>
      <td style="background-color:#fff;border-top:1px solid #000;text-align:left;border-left:1px solid #000;font-size:14px;padding:10px;" ><?php echo $total_length;?></td>
	    <td style="background-color:#fff;border-top:1px solid #000;text-align:left;border-left:1px solid #000;font-size:14px;padding:10px;" ><?php echo $total_width;?></td>
	    <td style="background-color:#fff;border-top:1px solid #000;text-align:left;border-left:1px solid #000;font-size:14px;padding:10px;" ><?php echo $total_height;?></td>
      <td style="background-color:#fff;text-align:left;border-top:1px solid #000;border-left:1px solid #000;font-size:14px;padding:10px;"></td>
      <td style="background-color:#fff;text-align:left;border-top:1px solid #000;border-left:1px solid #000;font-size:14px;padding:10px;"></td>
      <td style="background-color:#fff;text-align:left;border-top:1px solid #000;border-left:1px solid #000;font-size:14px;padding:10px;"></td>
      <td style="background-color:#fff;border-top:1px solid #000;text-align:left;border-left:1px solid #000;font-size:14px;padding:10px;" >2</td>
	    <td style="background-color:#fff;border-top:1px solid #000;text-align:left;border-left:1px solid #000;font-size:14px;padding:10px;" >2</td>
	    <td style="background-color:#fff;border-top:1px solid #000;text-align:left;border-left:1px solid #000;font-size:14px;padding:10px;" >2</td>
	    <td style="background-color:#fff;border-top:1px solid #000;border-right:1px solid #000;text-align:left;border-left:1px solid #000;font-size:14px;padding:10px;" >2</td>
  </tr>

<!-- this fortotal -->
      <tr>
      <td style="background-color:#fff; text-align:left;border-top:1px solid #000;border-bottom:1px solid #000;font-size:14px;padding:10px; "><b>Total</b></td>
      <td style="background-color:#fff;text-align:left;border-top:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000;font-size:14px;padding:10px;"></td>
      <td style="background-color:#fff;;text-align:left;border-top:1px solid #000;border-left:1px solid #000;font-size:14px;padding:10px;"></td>
      <td style="background-color:#fff;border-top:1px solid #000;text-align:left;font-size:14px;padding:10px;" ></td>
      <td style="background-color:#fff;border-top:1px solid #000;text-align:left;font-size:14px;padding:10px;" ></td>
      <td style="background-color:#fff;border-top:1px solid #000;text-align:left;font-size:14px;padding:10px;" ></td>
      <td style="background-color:#fff;text-align:left;border-top:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000;font-size:14px;padding:10px;"></td>
      <td style="background-color:#fff;text-align:left;border-top:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000;font-size:14px;padding:10px;"></td>
      <td style="background-color:#fff;text-align:left;border-top:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000;font-size:14px;padding:10px;"></td>
      <td style="background-color:#fff;border-top:1px solid #000;text-align:left;border-left:1px solid #000;font-size:14px;padding:10px;" ></td>
      <td style="background-color:#fff;border-top:1px solid #000;text-align:left;font-size:14px;padding:10px;" ></td>
      <td style="background-color:#fff;border-top:1px solid #000;text-align:left;font-size:14px;padding:10px;" ></td>
      <td style="background-color:#fff;border-top:1px solid #000;text-align:left;font-size:14px;padding:10px;" ></td>
  </tr>
  </table>



<br/>



<table style="table-layout:fixed;width:100%;margin-bottom:20px">
  <tr>
  <th width="80px"></th>
    <th style="background-color:#000;float:center;font-size:18px;width: 100%;font-weight:normal;color:#fff;padding:20px">Driver to complete<th>
   <th width="80px"></th>
  </tr>
  </table>


<table style="table-layout:fixed;width:500px;margin:10px 50px;border-bottom:1px solid #000;">

    <th colspan="2" style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Pallets In</th>
       <th colspan="2" style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Pallets Out</th>
         <th style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;"></th>
    <th style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;"></th>
        <th style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;"></th>
  </tr>
  <tr>
   <td style="text-align:left;font-size:9px;padding:10px;font-weight:normal;"></td>
    <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Exchange</td>
    <td style="border-top:1px solid #000;border-left:1px solid #000;;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Transfer</td>
      <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Exchange</td>
    <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Transfer</td>
    <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;"></td>
    <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:9px;padding:10px;font-weight:normal;"></td>
    <td style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;text-align:left;font-size:9px;padding:10px;font-weight:normal;"></td>

  </tr>

  	<tr>
    	<td  style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Loscam</td>
       <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;"></td>
    <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;"></td>
     <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;"></td>
    <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;"></td>
     <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;"></td>
    <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;"></td>
    <td style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;"></td>
     </tr>
     <tr>
   		<td  style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Chep</td>
       <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;"></td>
    <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;"></td>
     <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;"></td>
    <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;"></td>
     <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;"></td>
    <td style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;"></td>
       <td style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;"></td>
     </tr>
     <tr>
     	<td  style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Transfer DKT #</td>
       <td colspan="2" style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;"></td>
     <td colspan="2" style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;"></td>
    <td width:200px; style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;"></td>
    <td  width:200px; style="border-top:1px solid #000;border-left:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;"></td>
      <td  width:200px; style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;"></td>
     </tr>
     </table>

  <table style="table-layout:fixed;width:100%;margin:30px 0px;border:1px solid #000;">
     <tr>
     	<td colspan="2" style="width:25%;border-right:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Senders Signature</td>
     	<td colspan="2" style="width:25%;border-right:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Pickup Driver Signature</td>
     	<td colspan="2" style="width:25%;border-right:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Receivers signature</td>
     	<td colspan="2" style="width:25%;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Delivery Driver Signature</td>
     </tr>

      <tr>
     	<td colspan="2" style="width:25%;border-top:1px solid #000;border-right:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Terms And Condition Here</td>
     	<td colspan="2" style="width:25%;border-top:1px solid #000;border-right:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">FLEET #</td>
     	<td colspan="2" style="width:25%;border-top:1px solid #000;border-right:1px solid #000;text-align:center;font-size:12px;padding:10px;font-weight:normal;">We hereby agree that these goods were <br/>received in total and in good condition</td>
     	<td colspan="2" style="width:25%;border-top:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">FLEET #</td>
     </tr>

      <tr>
     	<td rowspan="2" style="border-top:1px solid #000;border-right:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Signature</td>
     	<td colspan="1" style="border-top:1px solid #000;border-right:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Name</td>
     		<td rowspan="2" style="border-top:1px solid #000;border-right:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Signature</td>
     	<td colspan="1" style="border-top:1px solid #000;border-right:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Name</td>
     		<td rowspan="2" style="border-top:1px solid #000;border-right:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Signature</td>
     	<td colspan="1" style="border-top:1px solid #000;border-right:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Name</td>
     		<td rowspan="2" style="border-top:1px solid #000;border-right:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Signature</td>
     	<td colspan="1" style="border-top:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Name</td>>
     </tr>
   <tr>

      <td colspan="1" style="border-top:1px solid #000;border-right:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Date</td>

      <td colspan="1" style="border-top:1px solid #000;border-right:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Date</td>

      <td colspan="1" style="border-top:1px solid #000;border-right:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Date</td>

      <td colspan="1" style="border-top:1px solid #000;text-align:left;font-size:12px;padding:10px;font-weight:normal;">Date</td>>
     </tr>





</table>
<p style="border-top:1px solid #ddd;text-align:center;font-size:12px;padding:10px;font-weight:normal;">Words transport is not a common carrier,all transport is done under our company terms and conditions of carriage.which is available online or on request </p>
