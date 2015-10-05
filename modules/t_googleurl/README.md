# t-drupal-module
一些常用的drupal模块 
一个直接调用google搜索的接口
使用实例


$links=    t_googleurl_google_search("qq",'10','0');
print_r($links);



返回如下内容


Array
(
    [0] => Array
        (
            [id] => 1
            [title] => 网页QQ - 腾讯网
            [url] => http://web.qq.com/
        )

    [1] => Array
        (
            [id] => 2
            [title] => Tencent QQ - Wikipedia, the free encyclopedia
            [url] => https://en.wikipedia.org/wiki/Tencent_QQ
        )

    [2] => Array
        (
            [id] => 3
            [title] => QQ International - Chat & Call - Android Apps on Google Play
            [url] => https://play.google.com/store/apps/details?id=com.tencent.mobileqqi&hl=en
        )

    [3] => Array
        (
            [id] => 4
            [title] => Urban Dictionary: QQ
            [url] => http://www.urbandictionary.com/define.php?term=QQ
        )

    [4] => Array
        (
            [id] => 5
            [title] => QQ International on the App Store - iTunes - Apple
            [url] => https://itunes.apple.com/us/app/qq-international/id710380093?mt=8
        )

    [5] => Array
        (
            [id] => 6
            [title] => QQ International - Chat, Video Calls, Groups | Get a Better ...
            [url] => http://imqq.com/
        )

    [6] => Array
        (
            [id] => 7
            [title] => Download | QQ International
            [url] => http://blog.imqq.com/download/
        )

    [7] => Array
        (
            [id] => 8
            [title] => QQ Catalyst by QQ Solutions: User Login
            [url] => https://app.qqcatalyst.com/
        )

    [8] => Array
        (
            [id] => 9
            [title] => QQ Messenger - Download
            [url] => http://qq-messenger.en.softonic.com/
        )

    [9] => Array
        (
            [id] => 10
            [title] => QQ (@qqworld) | Twitter
            [url] => https://twitter.com/qqworld?lang=en
        )

)

