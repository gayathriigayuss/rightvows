<?php
//Set useful variables for paypal form
//$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
//$paypalID = 'sales@cazablaze.com'; //Business Email
$paypalURL = 'https://www.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypalID = 'ebin@rightvows.com'; //Business Email
//var_dump($_REQUEST);
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{
                width: 100%;
                max-width: 100%;
                padding: 20px;
                box-sizing: border-box;
                margin: 0;
            }
        </style>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                submitform();
            });
            function submitform() {
//                    alert('test');
                $('#paypalpayform').trigger("submit");
            }
        </script>
    </head>
    <body cz-shortcut-listen="true">
    <!--<img src="images/<?php // echo $row['image']; ?>"/>-->
        <!--Name: <?php // echo $row['name'];                   ?>
        Price: <?php // echo $row['price']; ?>  -->
<?php
if (!empty($_GET['total'])) {
    $total = $_GET['total'];
} else {
    $total = 0;
}
?>
        <img src="https://righttest.cazablaze.com/asset/img/ajax-loader.gif" style="width: 200px;top: 50%;position: absolute;left: 50%;margin-left: -100px;margin-top: -100px;" />
        <form action="<?php echo $paypalURL; ?>" id="paypalpayform" method="post" style="visibility: hidden;">
             <!--Identify your business so that you can collect the payments.--> 
            <input type="hidden" name="business" value="<?php echo $paypalID; ?>">

             <!--Specify a Buy Now button.--> 
            <input type="hidden" name="cmd" value="_xclick">

             <!--Specify details about the item that buyers will purchase.--> 
            <input type="hidden" name="item_name" value="Pro User">
            <input type="hidden" name="item_number" value="2">
            <input type="hidden" name="amount" value="<?php echo $total; ?>">
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="invoice" value="<?php echo $order_id; ?>">
            <input type="hidden" name="paymentaction" value="order">
<!--             Specify URLs -->
            <input type='hidden' name='cancel_return' value='<?php echo $cancel_url; ?>'>
            <input type='hidden' name='return' value='<?php echo $return_url; ?>'>

             <!--Display the payment button.--> 
            <input type="image" name="submit" border="0" style="width: 200px;"
                   src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
            <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
        </form>
    </body>