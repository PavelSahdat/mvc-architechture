<html>
<h1>Office size: <?php
                    $data = [
                        "132123" => "5000 sqft",
                        "59921" => "10000 sqft",
                        "99120" => "2000 sqft",
                    ];
                    echo $data[$office['holdingNumber'] . ""];
                    ?></h1>
<h1>Office Name: <?php echo $office['name'] ?></h1>
<h3><?php echo $office['address'] ?></h3>

</html>

<?php
$office
?>