<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" href="Index.css" />
        <title>Title</title>
        <style>
 .container * {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 14px;
    color: #ffffff;
}

.container {
    text-align: center;
    width: 420px;
    margin: 20px auto 10px;
    display: block;
    border-radius: 5px;
    box-sizing: border-box;
}

.card-container {
    width: 100%;
    margin: 0 auto;
    border-radius: 6px;
    padding: 10px;
    background: rgb(2,0,60);
    text-align: left;
    box-sizing: border-box;
}

.card-container aside {
    padding-bottom: 6px;
}

.payu-card-form {
    background-color: #ffffff;
    padding: 5px;
    border-radius: 4px;
}

.card-details {
    clear: both;
    overflow: auto;
    margin-top: 10px;
}

.card-details .expiration {
    width: 50%;
    float: left;
    padding-right: 5%;
}

.card-details .cvv {
    width: 45%;
    float: left;
}

button {
    border: none;
    background: #438F29;
    padding: 8px 15px;
    margin: 10px auto;
    cursor: pointer;
}

.response-success {
    color: #438F29;
}

.response-error {
    color: #990000;
}
        </style>
    </head>
    <body>

{{-- <script type="text/javascript" src="https://secure.payu.com/javascript/sdk"></script> --}}
<script type="text/javascript" src="https://secure.snd.payu.com/javascript/sdk"></script>
<section class="container">
<div class="card-container">
<aside>Card Number</aside>
<div class="payu-card-form" id="payu-card-number"></div>

<div class="card-details clearfix">
<div class="expiration">
<aside>Valid Thru</aside>
<div class="payu-card-form" id="payu-card-date"></div>
</div>

<div class="cvv">
<aside>CVV</aside>
<div class="payu-card-form" id="payu-card-cvv"></div>
</div>
</div>
</div>
<button id="tokenizeButton">Tokenize</button>

<div id="responseTokenize"></div>
</section>

<script>
var optionsForms = {
    cardIcon: true,
    style: {
        basic: {
            fontSize: '24px'
        }
    },
    placeholder: {
        number: '',
        date: 'MM/YY',
        cvv: ''
    },
    lang: 'pl'
}

var renderError = function(element, errors) {
    element.className = 'response-error';
    var messages = [];
    errors.forEach(function(error) {
        messages.push(error.message);
    });
    element.innerText = messages.join(', ');
};

var renderSuccess = function(element, msg) {
    element.className = 'response-success';
    element.innerText = msg;
};

//initialize the SDK by providing your POS ID and create secureForms object
var payuSdkForms = PayU('436150');
var secureForms = payuSdkForms.secureForms();

//create the forms by providing type and options
var cardNumber = secureForms.add('number', optionsForms);
var cardDate = secureForms.add('date', optionsForms);
var cardCvv = secureForms.add('cvv', optionsForms);

//render the form in selected element
cardNumber.render('#payu-card-number');
cardDate.render('#payu-card-date');
cardCvv.render('#payu-card-cvv');

var tokenizeButton = document.getElementById('tokenizeButton');
var responseElement = document.getElementById('responseTokenize');

tokenizeButton.addEventListener('click', function() {
    responseElement.innerText = '';

    try {
        ////tokenize the card (communicate with PayU server)
        payuSdkForms.tokenize('MULTI').then(function(result) { // example for SINGLE type token
            result.status === 'SUCCESS'
                ? renderSuccess(responseElement, result.body.token) //pass the token to your back-end and charge it
                : renderError(responseElement, result.error.messages); //check the business error type and messages and display appropriate information to the user
        });
    } catch(e) {
        console.log(e); // technical errors
    }
});
</script>

    </body>
</html>    
    