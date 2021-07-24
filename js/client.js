document.addEventListener('DOMContentLoaded', async() => {



    // A reference to Stripe.js initialized with your real test publishable API key.
    var stripe = Stripe('pk_test_51JDQeGK8ulhDI3CCxWW1qordzjsq7sLgjVPegoAp7Y6tfnXIdscCh3HljQeR8gHxYtn8gKgwd1aAXPkXCRxM8dl300w1HlYgPJ');
    
    var elements = stripe.elements();
    
    var style = {
      base: {
        color: "#32325d",
        fontFamily: 'Arial, sans-serif',
        fontSmoothing: "antialiased",
        fontSize: "16px",
        "::placeholder": {
          color: "#32325d"
        },
      },
      invalid: {
        fontFamily: 'Arial, sans-serif',
        color: "#fa755a",
        iconColor: "#fa755a"
      }
    };

    var card = elements.create("card", { style: style });
    // Stripe injects an iframe into the DOM
    card.mount("#card-element");

    card.on("change", function (event) {
      // Disable the Pay button if there are no card details in the Element
      document.querySelector("button").disabled = event.empty;
      document.querySelector("#card-error").textContent = event.error ? event.error.message : "";
    });
    
    });