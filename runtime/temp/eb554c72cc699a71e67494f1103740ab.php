<?php /*a:1:{s:53:"/home/www/tp5/application/index/view/index/index.html";i:1571794021;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>分享</title>
    <meta charset="utf-8">
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta name="baidu-site-verification" content="szjdG38sKy">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1">
    <link rel="stylesheet" type="text/css" href="/static/share/css/share.css" />
    <link rel="stylesheet" type="text/css" href="/static/share/css/share1.css" />
    <link rel="stylesheet" type="text/css" href="/static/wangsu5/wsplayer.min.css" />
    <script type="text/javascript" src="/static/share/js/js1.js"></script>
    <script type="text/javascript" src="/static/share/js/js2.js"></script>
    <script type="text/javascript" src="/static/share/js/js3.js"></script>
    <script type="text/javascript" src="/static/share/js/js4.js"></script>
    <script type="text/javascript" src="/static/wangsu5/wsplayer.min.js"></script>
    <script type="text/javascript" src="/static/wangsu5/lang/zh-CN.js"></script>
    <script type="text/javascript" src="/static/wangsu5/main.js"></script>
</head>
<body>
<header class="header">
    <div class="container">
        <div class="logo-warpper"><a class="logo" href="/"></a></div>
        <div class="name-warpper"><a class="app-name" href="/">刘萧</a> <a class="app-slogen" href="<?php echo url('index/set_linux'); ?>">| 记录美好生活</a></div>
    </div>
</header>
<div class="main-content-block">
    <div id="pageletReflowVideo">
        <div class="detail clrfix ">
            <div class="video-box fl" id="" style="width: 320px;height: 568px">
                <video id="my-player" class="video-js vjs-big-play-centered" style="width:100%;height:100%;">
                </video>
            </div>
            <div class="info-box fl">
                <div class="download"><p class="title text-center">+++++++++++++++</p>
                    <div class="qrcode"><img src="/static/wangsu5/media/my.jpg" alt="个人"></div>
                </div>
                <div class="video-info">
                    <div class="user-info clrfix">
                        <div class="avatar fl"><img src="/static/wangsu5/media/my.jpg" alt=""></div>
                        <div class="info"><p class="name nowrap">@刘萧</p></div>
                    </div>
                    <div class="challenge-info"><p class="name"><span class="inner">记录美好生活</span></p></div>
                    <p class="desc">#开心每一天，加油!加油!加油! #</p></div>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <div class="infomation"><p><span id="copyYear">2019</span>&nbsp;&copy;&nbsp;刘萧&nbsp;&nbsp;|&nbsp;蜀ICP备19009579号&nbsp;|&nbsp;我的个人网站
            |&nbsp; 地址&nbsp;:&nbsp;成都市中和大道二段69号&nbsp;</p>
            <!--<p>-->
                <!--<a target="_blank" href="http://www.12377.cn/">中国互联网举报中心</a>&nbsp;|&nbsp;网络文化许可证-京网文-（2016）2282-264号&nbsp;|&nbsp;违法和不良信息举报：400-140-2108-->
            <!--</p>-->
            <div class="gognan-box"><a target="_blank"
                                       href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802023605"><img
                    src="/static/share/picture/gongan_d0289dc.png"> <span>蜀ICP备19009579号-1</span></a></div>
        </div>
    </div>
</footer>
</body>
<script>
    const player = WSPlayer('my-player', {
            // 播放配置, 详见参数说明
            muted:false, autoplay:true, controls:true,
            // sources:[{ src: "", type: WSPlayer.CODEC.HDL, label: '480P' }],
            sources:[{ src: "/static/wangsu5/media/load_500000_moov_front.mp4", type: WSPlayer.CODEC.MP4, label: '480P' }],
            // watermarkConfig:{enable:true,url: "/static/images/logo.png", position:'top-left'}, //水印设置
        },
        () => {
            console.log('Your player is ready!');
            player.on(WSPlayer.WSEvent.PLAY.ENDED,
                function() {
                    console.log('video ended.'); });
            player.on(WSPlayer.WSEvent.PLAY.ERROR,
                function(event, error) {
                    console.log('video error: ', error);
                });
            console.log(player.videoWidth());//获取当前视频分辨率的宽度值(无法获取则返回 0)
            // // VR 播放
            // const vr = player.vr({
            // debug: true,  projection: '360',  forceCardboard: false  });
        });
</script>
</html>