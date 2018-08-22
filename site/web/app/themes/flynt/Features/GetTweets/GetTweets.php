<?php

namespace Flynt\Features\GetTweets;
use Flynt\Features\GetTweets\TwitterAPIExchange;
use Carbon\Carbon;


class GetTweets
{

    private $options;

    public function __construct($options)
    {
        $this->oauth_access_token = $options['oauth_access_token'];
        $this->oauth_access_token_secret = $options['oauth_access_token_secret'];
        $this->consumer_key = $options['consumer_key'];
        $this->consumer_secret = $options['consumer_secret'];
    }

    /**
     * [getLanguage description]
     * @return [type] [description]
     */

    private static function getLanguage() {
        // configure carbon instance
        switch (get_locale()) {
            case 'de_DE':
                return 'de';
                break;

            default:
                return 'en';
                break;
        }
    }

    /**
     * [getTweets description]
     * @param  [type] $count [description]
     * @param  [type] $name  [description]
     * @return [type]        [description]
     */

    public function getTweets($count, $name)
    {
        $tweets = array();

        $json_folder  = 'json';
        $pull_time  = 1;


      /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
        $settings = array(
            'oauth_access_token' => $this->oauth_access_token,
            'oauth_access_token_secret' => $this->oauth_access_token_secret,
            'consumer_key' => $this->consumer_key,
            'consumer_secret' => $this->consumer_secret
        );

      /** Perform a GET request and echo the response **/
      /** Note: Set the GET field BEFORE calling buildOauth(); **/
        $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
        $getfield = '?screen_name=' . $name . '&count=' . $count . '&tweet_mode=extended';
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);
        $results = json_decode(
            $twitter->setGetfield($getfield)
            ->buildOauth($url, $requestMethod)
            ->performRequest(),
            true
        );

        $i = 0;

        if (!isset($results['errors']) && !isset($results['error'])) :
            foreach ($results as $tweet) :
                $createdAt = new Carbon($tweet['created_at']);
                $createdAt::setLocale(self::getLanguage());

                $tweets[$i]['text'] = $tweet['full_text'];
                $tweets[$i]['text'] = preg_replace('/http:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '&nbsp;<a href="http://$1" target="_blank" rel="noopener">http://$1</a>&nbsp;', $tweet['full_text']);
                $tweets[$i]['text'] = preg_replace('/@([a-z0-9_]+)/i', '&nbsp;<a href="http://twitter.com/$1" target="_blank" rel="noopener">@$1</a>&nbsp;', $tweet['full_text']);
                $tweets[$i]['created_noformat'] = strtotime($tweet['created_at']);
                $tweets[$i]['created']  = $createdAt->diffForHumans();
                $tweets[$i]['id'] = $tweet['id_str'];
                if (!empty($tweet['entities']['urls'][0]['expanded_url'])) {
                    $tweets[$i]['url'] = $tweet['entities']['urls'][0]['expanded_url'];
                }
                if (!empty($tweet['entities']['media'][0]['media_url'])) {
                    $tweets[$i]['picture'] = $tweet['entities']['media'][0]['media_url'];
                } else if (!empty($tweet['retweeted_status']['entities']['media'][0]['media_url'])) {
                    $tweets[$i]['picture'] = $tweet['retweeted_status']['entities']['media'][0]['media_url'];
                }
                $tweets[$i]['name'] = 'twitter';
                $tweets[$i]['link'] = 'http://twitter.com/' . $tweet['user']['screen_name'] . '/statuses/' . $tweet['id_str'];
                $i++;
            endforeach;
        endif;

        return $tweets;
    }
}
