// Import the installed dependencies
const Twit = require("twit");
const dotenv = require("dotenv");
dotenv.config;

// Keys and Secrets
const API_KEY = 'TYpJuDluUPWMANu8rnuCDIAAe'
const API_SECRET = 'aP83xhD9994qPGpDMy1gqGrDmKo1IJdIrc8b3sfDESQ7iJJEZa'
const ACCESS_TOKEN = '1611445975972716555-gOOs1voRzUhFTSBmwYjaYGNQk9Co3I'
const ACCESS_TOKEN_SECRET = 'GASb0nFAmOmVIrzg401fwKIF2gNfYKnzX9wVeJAKaW8wX'



// *Step 1: Posting message to twitter


// Create a Twitter client and pass all the keys as parameters
const T = new Twit({
    consumer_key: API_KEY,
    consumer_secret: API_SECRET,
    access_token: ACCESS_TOKEN,
    access_token_secret: ACCESS_TOKEN_SECRET,
});

// Create a function responsible for integrating with the Twitter API and sending a tweet:
const tweet = (tweet_txt) => {
    const text = tweet_txt;
    
    const onFinish = (err, reply) => {
        if(err) {
            console.log("Error: ", err.message);
        } else {
            console.log("Success: ", reply);
        }
    };

    T.post("statuses/update", { status: text }, onFinish);
};

tweet("A tweet by index.js");







// *Step 2: Downloading tweets from twitter
