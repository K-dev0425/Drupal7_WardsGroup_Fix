<?php

$node1 = node_load($row1->nid);
$node2 = node_load($row2->nid);
$row1_value = '';$row2_value = '';
$sort_by_term = $view->exposed_raw_input['sort_by'];
if ($sort_by_term == 'title') {
    $row1_value = $node1 -> title;
    $row2_value = $node2 -> title;
}
else if ($sort_by_term == 'php') {
    if (count($node1->field_pricing_plan) > 0) {
        $plan_id = $node1->field_pricing_plan['und'][0]['target_id'];
        $plan1 = node_load($plan_id);
        $row1_value = $plan1->title;
    } else {
        $row1_value = 'No Plan';
    }
    if (count($node2->field_pricing_plan) > 0) {
        $plan_id = $node2->field_pricing_plan['und'][0]['target_id'];
        $plan2 = node_load($plan_id);
        $row2_value = $plan2->title;
    } else {
        $row2_value = 'No Plan';
    }
}
else if ($sort_by_term == 'php_1') {
    if(isset($node1->field_account_details['und'][0]['value'])){
        $entity_id = $node1->field_account_details['und'][0]['value'];
        $entity_payment_term = field_collection_item_load($entity_id);
        $payment_term = taxonomy_term_load($entity_payment_term->field_payment_terms['und'][0]['tid']);
        $row1_value = $payment_term->name;
    }
    if(isset($node2->field_account_details['und'][0]['value'])){
        $entity_id = $node2->field_account_details['und'][0]['value'];
        $entity_payment_term = field_collection_item_load($entity_id);
        $payment_term = taxonomy_term_load($entity_payment_term->field_payment_terms['und'][0]['tid']);
        $row2_value = $payment_term->name;
    }
}
else if ($sort_by_term == 'php_2') {
    if(isset($node1->field_primary_address['und'][0]['value'])){
        $entity_id=$node1->field_primary_address['und'][0]['value'];
        $entity_suburb=field_collection_item_load($entity_id);
        $row1_value = $entity_suburb->field_suburb_['und'][0]['value'];
    }
    if(isset($node2->field_primary_address['und'][0]['value'])){
        $entity_id=$node2->field_primary_address['und'][0]['value'];
        $entity_suburb=field_collection_item_load($entity_id);
        $row2_value = $entity_suburb->field_suburb_['und'][0]['value'];
    }
}

$sort_order = $view->exposed_raw_input['sort_order'];
if ($sort_order == 'ASC') {
    return strncasecmp($row1_value, $row2_value, 7);
} else {
    return strncasecmp($row2_value, $row1_value, 7);
}
