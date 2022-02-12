<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require "../Extra/libraries.php" ?>

        <link rel="stylesheet" href="../../CSS/Payment.css">
        <script defer src="../../JS/FormPayment.js"></script>

        <title>Book Mania Payment</title>
    </head>
    <body>
        <div class="MainDiv">
            <div class="FormDiv FormHead dark_col display-6" style="text-align: center;">
                Payment Gateway
            </div>
            <div class="FormDiv FormBody" id="Payment">
                <form class="form" action="../Extra/_Payment.php" method="POST" id="form">
                    <div class="form__item">
                        <label for="name" class="form__label">Enter credit card number</label>
                        <label id="cctype" class="form__label dark_col"></label>
                        <input type="text" class="form__input" name="num" id="num" placeholder="0000-0000-0000-0000" data-inputmask="'mask': '9999 9999 9999 9999 9999'" required>
                        <span class="form__error">Enter a valid credit card</span>
                    </div>
                    <div class="form__item">
                        <label for="name" class="form__label">Enter the creadit card expiry date</label>
                        <div class="input-group Date" name="ed" id="ed">
                            <input type="text" class="form__input no_margin dateMM" name="edateMM" id="edateMM" placeholder="mm" required>
                            <input type="text" class="form__input no_margin dateYY" name="edateYYYY" id="edateYYYY" placeholder="yyyy" required>
                        </div>
                        <span class="form__error" id="edte">Enter a valid expiry date</span>
                    </div>
                    <div class="form__item">
                        <label for="name" class="form__label">Enter your cvv</label>
                        <input type="text" class="form__input cvv" name="cvv" id="cvv" placeholder="000" required>
                        <span class="form__error">Enter a valid cvv</span>
                    </div>
                    <div class="form__item">
                        <label for="name" class="form__label">Enter the name on the card</label>
                        <input type="text" class="form__input" name="name" id="name" placeholder="eg. Elon Musk" required>
                        <span class="form__error">Enter a valid name</span>
                    </div>
                    <div class="form__item">
                        <button class="form__btn" type="submit" id="login">Pay</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>