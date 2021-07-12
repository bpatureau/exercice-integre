<?php
    function myPrint_r($value) {
        if (MODE === 'dev') {
            echo '<h2>Debug</h2>';
            echo '<pre class="debug">';
                print_r($value);
            echo '</pre>';
        }
    }
?>