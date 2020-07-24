# DingTalkRobot

## Requirement
- PHP >= 7.2.5
- [Composer](https://getcomposer.org/)

## Installation
`composer require overnaive/dingtalkrobot ^1.0`

## Usage
```php
<?php
require 'vendor/autoload.php';

// 实例化
$robot = new \DingTalkRobot\DingTalkRobot([
    'access_token' => 'access_token_string',
    'secret' => 'secret_string',
]);

// 优雅调用
$result = $robot->message->text
    ->setTextContent('我就是我, 是不一样的烟火@156xxxx8827')
    ->addAtMobile('156xxxx8827')
    ->send();

// 原生调用
$result = $robot->message
    ->send([
        'msgtype' => 'text',
        'text' => [
            'content' => '我就是我, 是不一样的烟火@156xxxx8827',
        ],
        'atMobiles' => [
            '156xxxx8827'
        ],
        'isAtAll' => false,
    ]);
```

## Example
```php
<?php
require 'vendor/autoload.php';

// 实例化
$robot = new \DingTalkRobot\DingTalkRobot([
    'access_token' => 'access_token_string',
    'secret' => 'secret_string',
]);

// text 类型
$result = $robot->message->text
    ->setTextContent('我就是我, 是不一样的烟火@156xxxx8827')
    ->addAtMobile('156xxxx8827')
    ->addAtMobile('189xxxx8325')
    ->send();

var_dump($result);

// link 类型
$result = $robot->message->link
    ->setTitle('时代的火车向前开')
    ->setText('这个即将发布的新版本，创始人xx称它为红树林。而在此之前，每当面临重大升级，产品经理们都会取一个应景的代号，这一次，为什么是红树林')
    ->setMessageUrl('https://www.dingtalk.com/s?__biz=MzA4NjMwMTA2Ng==&mid=2650316842&idx=1&sn=60da3ea2b29f1dcc43a7c8e4a7c97a16&scene=2&srcid=09189AnRJEdIiWVaKltFzNTw&from=timeline&isappinstalled=0&key=&ascene=2&uin=&devicetype=android-23&version=26031933&nettype=WIFI')
    ->send();

var_dump($result);

// markdown 类型
$result = $robot->message->markdown
    ->setTitle('杭州天气')
    ->setText("#### 杭州天气 @18150089296 \n> 9度，西北风1级，空气良89，相对温度73%\n> ![screenshot](https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png)\n> ###### 10点20分发布 [天气](https://www.dingtalk.com) \n")
    ->addAtMobile('150XXXXXXXX')
    ->send();

var_dump($result);

// 整体跳转 ActionCard 类型
$result = $robot->message->actionCard
    ->setTitle('乔布斯 20 年前想打造一间苹果咖啡厅，而它正是 Apple Store 的前身')
    ->setText("![screenshot](https://gw.alicdn.com/tfs/TB1ut3xxbsrBKNjSZFpXXcXhFXa-846-786.png)
 ### 乔布斯 20 年前想打造的苹果咖啡厅
 Apple Store 的设计正从原来满满的科技感走向生活化，而其生活化的走向其实可以追溯到 20 年前苹果一个建立咖啡馆的计划")
    ->addBtn('阅读全文', 'https://www.dingtalk.com/')
    ->verticalBtn()
    ->send();

var_dump($result);

// 独立跳转 ActionCard 类型
$result = $robot->message->actionCard
    ->setTitle('乔布斯 20 年前想打造一间苹果咖啡厅，而它正是 Apple Store 的前身')
    ->setText("![screenshot](https://gw.alicdn.com/tfs/TB1ut3xxbsrBKNjSZFpXXcXhFXa-846-786.png)
 ### 乔布斯 20 年前想打造的苹果咖啡厅
 Apple Store 的设计正从原来满满的科技感走向生活化，而其生活化的走向其实可以追溯到 20 年前苹果一个建立咖啡馆的计划")
    ->verticalBtn()
    ->addBtn('内容不错', 'https://www.dingtalk.com/')
    ->addBtn('不感兴趣', 'https://www.dingtalk.com/')
    ->send();

var_dump($result);

// FeedCard 类型
$result = $robot->message->feedCard
    ->addLink(
        '时代的火车向前开',
        'https://www.dingtalk.com/s?__biz=MzA4NjMwMTA2Ng==&mid=2650316842&idx=1&sn=60da3ea2b29f1dcc43a7c8e4a7c97a16&scene=2&srcid=09189AnRJEdIiWVaKltFzNTw&from=timeline&isappinstalled=0&key=&ascene=2&uin=&devicetype=android-23&version=26031933&nettype=WIFI',
        'https://gw.alicdn.com/tfs/TB1ayl9mpYqK1RjSZLeXXbXppXa-170-62.png'
    )
    ->addLink(
        '时代的火车向前开2',
        'https://www.dingtalk.com/s?__biz=MzA4NjMwMTA2Ng==&mid=2650316842&idx=1&sn=60da3ea2b29f1dcc43a7c8e4a7c97a16&scene=2&srcid=09189AnRJEdIiWVaKltFzNTw&from=timeline&isappinstalled=0&key=&ascene=2&uin=&devicetype=android-23&version=26031933&nettype=WIFI',
        'https://gw.alicdn.com/tfs/TB1ayl9mpYqK1RjSZLeXXbXppXa-170-62.png'
    )
    ->send();

var_dump($result);
```

## Documents
[钉钉官方文档](https://ding-doc.dingtalk.com/doc#/serverapi2/qf2nxq)

## License
MIT