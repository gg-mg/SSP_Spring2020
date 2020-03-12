<?php 
    //set default value of variables for initial page load
   
    if (!isset($years)) { $years = '5'; } 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="../../CSS/main2.css"/>
</head>

<body>
    <main>
    <h1>Future Value Calculator</h1>
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php } // end if ?>
    <form action="../../PHP/Functions/display_results1.php" method="post">

        <div id="data">
            <label>Investment Amount:</label>
            <select name="investment">
            <?php for ($invValue = 10000; $invValue <= 50000; $invValue += 5000) : ?>
                <option value="<?php echo $invValue; ?>" >
                    <?php echo $invValue; ?>
                </option>
            <?php endfor; ?>
            </select><br>

            <label>Yearly Interest Rate:</label>
            <select name="interest_rate">
            <?php for ($intValue = 4; $intValue <= 12; $intValue += .5) : ?>
                <option value="<?php echo $intValue; ?>" ><?php echo $intValue; ?>
                </option>
            <?php endfor; ?>
            </select><br>

            <label>Number of Years:</label>
            <input type="text" name="years"
                   value="<?php echo $years; ?>"/><br>
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate"/><br>
        </div>

    </form>
    </main>
</body>
</html>