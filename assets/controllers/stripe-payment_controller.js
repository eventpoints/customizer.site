import {Controller} from "@hotwired/stimulus";
import {loadStripe} from "@stripe/stripe-js";
import axios from "axios";

export default class extends Controller {
    static targets = ["amount", "interval", "paymentForm", "paymentElement", "paymentMessage", "submit", "spinner", "buttonText", "dpmCheckerLink"];
    static values = {
        jwtToken: String,
        publicKey: String,
        paymentDetailsPath: String,
        csrfToken: String,
        returnPath: String
    }

    async connect() {
        this.isLoading = false;
        this.stripe = await loadStripe(this.publicKeyValue);
        this.elements = null;
        await this.initializePayment();
    }

    async initializePayment() {
        axios.defaults.headers = {
            "Content-Type": "application/json",
            "X-CSRF-Token": this.csrfTokenValue
        };

        try {
            const response = await axios.post(this.paymentDetailsPathValue, {
                token: this.jwtTokenValue
            });

            if (response.status !== 200) {
                this.showMessage("Failed to initialize payment. Please try again.");
                return;
            }

            // Access the returned object properties
            const {amount, clientSecret, interval} = response.data;

            const formattedCurrency = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'CZK',
            }).format(amount / 100);
            // Log the properties for debugging
            // Update the UI with the extracted properties
            this.amountTarget.textContent = formattedCurrency;
            this.intervalTarget.textContent = `billed ${interval}`;

            // Initialize Stripe elements with the client secret
            this.elements = this.stripe.elements({clientSecret: clientSecret});

            const paymentElementOptions = {layout: "tabs"};
            const paymentElement = this.elements.create("payment", paymentElementOptions);
            paymentElement.mount(this.paymentElementTarget);
            this.setLoading(false);

            if (this.dpmCheckerLink) {
                this.dpmCheckerLinkTarget.href = this.dpmCheckerLink;
            }
        } catch (error) {
            console.error("Error initializing payment:", error);
            this.showMessage("An error occurred. Please try again later.");
        }
    }

    async handleSubmit(event) {
        event.preventDefault();

        const {error, paymentIntent} = await this.stripe.confirmPayment({
            elements: this.elements,
            confirmParams: {
                return_url: this.returnPathValue,
            },
        });

        if (error) {
            console.error('Payment error:', error);
            this.showMessage("Payment failed. Please try again.");
            return;
        }

    }


    showMessage(messageText) {
        this.paymentMessageTarget.classList.remove("hidden");
        this.paymentMessageTarget.textContent = messageText;

        setTimeout(() => {
            this.paymentMessageTarget.classList.add("hidden");
            this.paymentMessageTarget.textContent = "";
        }, 4000);
    }

    setLoading(isLoading) {
        this.isLoading = isLoading;
        this.updateLoadingState();
    }

    updateLoadingState() {
        this.submitTarget.disabled = this.isLoading;
        this.spinnerTarget.classList.toggle("hidden", !this.isLoading);
        this.buttonTextTarget.classList.toggle("hidden", this.isLoading);
    }
}