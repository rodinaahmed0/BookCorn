var stripe = Stripe('pk_test_51LBQJ7IY3KOYplWNGFWeIAOTdqERzrPK4YxmIjsQHjWwcXASh7kYL07EadonGh7x3lL9s3O9mtNPr37d2hrzJen400UY664WN5');
var elements = stripe.elements();
var cardElement = elements.create('card');
var style = {
    base: {
        color: "#32325d",
    }
    };
cardElement.mount('#card-element' , { style: style });
let displayError = document.getElementById('card-errors');
cardElement.on('change', ({error}) => {
    if (error) {
        displayError.textContent = error.message;
    } else {
        displayError.textContent = '';
    }
});

// Handle form submission
var form = document.getElementById('payment-form');
form.addEventListener('submit', async (event) => {
    event.preventDefault();
    // Disable the submit button to prevent repeated clicks
    document.getElementById('submit-payment').disabled = true;

    const { paymentMethod, error } = await stripe.createPaymentMethod(
    'card', cardElement, {
        billing_details: { name: userName , email: userEmail}
    }
    );

    if (error) {
        displayError.textContent = error.message;
        document.getElementById('submit-payment').disabled = false;
    } else {
       stripeHandler(paymentMethod)
    }
});
function stripeHandler(payment) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    // Submit the formhiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeId');
    hiddenInput.setAttribute('value', payment.id);
 
    form.appendChild(hiddenInput);
    form.submit();
}
