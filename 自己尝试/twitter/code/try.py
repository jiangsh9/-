import requests
import os 
import json

# To set your environment variables in your terminal run the following line: 
#export 'BEARER_TOKEN'='AAAAAAAAAAAAAAAAAAAAAF1SlAEAAAAAwaRQcahQr1Eoej%2BoVjhjLNOhD7k%3DMCA4qvgeW9F7xke2i2iM3Za6fkhPE8SgsKVQWqUksgK6opABug'


def auth():
    return osenviron.get("BEARER_TOKEN");


# modified version 1
def create_url(tweet_id):
    # Replace with tweet ID below 
    return "https://api.twitter.com/2/tweets/{}/quote_tweets".format(tweet_id)"
    