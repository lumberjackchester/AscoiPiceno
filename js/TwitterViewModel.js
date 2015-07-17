var my = my || {};

my.TweetsVm = (function () {
    var _handle = '@PicenoWines';
    var _twitterApiUrl = "https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name="+_handle;
    var _tweets = ko.observableArray();
    var SetTweets = function(response){
        var tweets = response;
    };
    var GetTweets = function () {
        $get(_twitterApiUrl, SetTweets);
    };
    // This would be the 'revealing' part
    // you define the implementations above, and
    // decide what you expose via the object literal below
    return { 
        GetTweets: GetTweets,
        Tweets:  _tweets
    };
})();
 