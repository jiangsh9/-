// Import the installed dependencies
const Twit = require("twit");
const dotenv = require("dotenv");
dotenv.config;

// Create a Twitter client and pass all the keys as parameters
const T = new Twit({
    consumer_key: process.env.API_KEY,
    consumer_secret: process.env.API_SECRET,
    access_token: process.env.ACCESS_TOKEN,
    access_token_secret: process.env.ACCESS_TOKEN_SECRET,
});
