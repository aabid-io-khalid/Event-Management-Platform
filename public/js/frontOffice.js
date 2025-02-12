import { getRequest, postRequest } from './axiosConfig.js';

document.addEventListener('DOMContentLoaded', async function () {
    console.log('Front-office script loaded ✅');

    // Load upcoming events when the page loads
    await loadEvents();

    // Event listener for ticket purchases
    document.addEventListener('click', async function (event) {
        if (event.target.classList.contains('buy-ticket-btn')) {
            let eventId = event.target.getAttribute('data-event-id');
            openPaymentModal(eventId);
        }
    });

    // Event listener to close the modal
    document.getElementById('close-modal-btn')?.addEventListener('click', function () {
        document.getElementById('stripe-modal').style.display = 'none';
    });

    // Handle form submission for payment
    document.getElementById('payment-form')?.addEventListener('submit', async function (event) {
        event.preventDefault();
        await handlePayment();
    });
});

/**
 * Load upcoming events and display them on the page
 */
async function loadEvents() {
    let eventsContainer = document.getElementById('events-container');
    if (!eventsContainer) return;

    try {
        let events = await getRequest('/api/events/upcoming');
    
        if (events && events.length > 0) {
            eventsContainer.innerHTML = events.map(event => `
                <div class="event-card">
                    <h3>${event.name}</h3>
                    <p>${event.date} - ${event.location}</p>
                    <button class="buy-ticket-btn" data-event-id="${event.id}">Buy Ticket</button>
                </div>
            `).join('');
        } else {
            eventsContainer.innerHTML = '<p>No upcoming events found.</p>';
        }
    } catch (error) {
        console.error('Error loading events:', error);
        eventsContainer.innerHTML = '<p>Error loading events. Please try again later.</p>';
    }
}

/**
 * Open the payment modal and attach event ID
 */
function openPaymentModal(eventId) {
    document.getElementById('stripe-modal').style.display = 'flex';
    document.getElementById('payment-form').setAttribute('data-event-id', eventId);
}

/**
 * Handle payment submission with Stripe
 */
async function handlePayment() {
    try {
        let stripe = Stripe(await getPublicStripeKey());
        let elements = stripe.elements();
        let card = elements.create('card');
        card.mount('#card-element');

        const { token, error } = await stripe.createToken(card);

        if (error) {
            alert('Payment error: ' + error.message);
            return;
        }

        let eventId = document.getElementById('payment-form').getAttribute('data-event-id');

        let response = await postRequest('/api/payment/process', {
            token: token.id,
            event_id: eventId
        });

        if (response.success) {
            alert('✅ Payment successful!');
            document.getElementById('stripe-modal').style.display = 'none';
        } else {
            alert('❌ Payment failed: ' + response.error);
        }
    } catch (error) {
        console.error('Error processing payment:', error);
        alert('❌ An error occurred. Please try again.');
    }
}

/**
 * Fetch the public Stripe key from the backend
 */
async function getPublicStripeKey() {
    try {
        let response = await getRequest('/get-stripe-key');
        return response.publicKey || '';
    } catch (error) {
        console.error('Error fetching Stripe key:', error);
        return '';
    }
}