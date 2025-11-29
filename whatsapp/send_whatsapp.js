// Step 1: Import axios
const axios = require('axios');

// Step 2: Token & Phone Number ID
// Make sure these are correct. Token must have whatsapp_business_messaging permission.
const token = process.env.WHATSAPP_TOKEN || 'EAASxZB9ZAszOcBP6YP3xxWR4XgtRjeZC8W1oLHrvAo7f6cZBy7vWwUVIPZBbdk4gVRiupZCXqPZAF5OZC8C325dwZBNsegfXfihMUsZCBZAFlxcUwqWFflOCZB9IE3G0kApmfNcZA014WgXHVCOQAR7OmOY6SnfvTK2kOaaq2RrhQ0zMlAIDrf43hoYfjAIU546gqqWTJ1J3n57D4yHM3PjuZBCN1CUdbkasiVu7HOYqZBZBtkH2kALMxa1Ff7wV';
const phoneNumberId = process.env.WHATSAPP_PHONE_ID || '772309632643518';

// Step 3: Recipients
const numbers = ['918489852162', '916379577307', '918667007244'];

// Step 4: Function to send template
async function sendTemplate(number) {
  try {
    const response = await axios.post(
      `https://graph.facebook.com/v17.0/${phoneNumberId}/messages`,
      {
        messaging_product: 'whatsapp',
        to: number,
        type: 'template',
        template: {
          name: 'v2',            // Template name from WhatsApp Business Manager
          language: { code: 'en' }, // Template language
        },
      },
      {
        headers: {
          Authorization: `Bearer ${token}`,
          'Content-Type': 'application/json',
        },
      }
    );
    console.log(`✅ Message sent to ${number}:`, response.data);
  } catch (error) {
    console.error(`❌ Failed to send message to ${number}:`, error.response?.data || error.message);
  }
}

// Step 5: Loop through numbers and send
(async () => {
  for (const number of numbers) {
    await sendTemplate(number);
  }
})();
