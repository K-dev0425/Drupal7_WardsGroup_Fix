<?php

$log_db = db_query('SELECT * FROM {item_type_history} ORDER BY timestamp DESC')->fetchAll();
//print_r($log_db);

?>

<div class="tab-pane" id="audit_trail_tab">
    <fieldset class="field-group-htab form-wrapper horizontal-tabs-pane">
        <div class="fieldset-wrapper">
            <h3>Item Audit Log</h3>
            <div id="log_section">
                <?php
                foreach ($log_db as $log) {
                    if ($log->deleted == 1) $status = 'deleted';
                    else $status = 'added';
                    $uid = $log->uid;
                    $user = user_load($uid);
                    $username = $user -> name;
                    $message = 'User '. $username . ' '. $status .' '. $log->name .' on '. $log->timestamp;
                    echo $message . '</br>';
                }
                ?>
            </div>
        </div>
    </fieldset>
</div>