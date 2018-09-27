<?php

$test = 123;

echo "<div class='form_required_field {$test} '>asdasdasd</div>";

?>


<div class='form_required_field {$test} '>asdasdasd</div>
<?

$test = 123;

echo "<div class='form_required_field {$test} '>"?>123 <?"sdasd</div>";

include 'asd';

?>


<div class='form_required_field {$test} '>asdasdasd</div>
<?php

$test = 123;

echo "<div class='form_required_field {$test} '>asdasdasd</div>";

?>


<div class='form_required_field {$test} '>asdasdasd</div>


<?php
$pageContentAJAX = $PHPrender->getTemplateContent(
        $PHPrender->includeTemplatePath(
                '/admin/autoresource/divide_web_sync/tpl.DivideWebSyncPreloader.php',
                false
        )
);