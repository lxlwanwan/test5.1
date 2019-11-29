'use strict';
let WS_INIT = (function() {
  const VOD = {
    // 视频源(多个视频用于清晰度切换功能用)
    sources: [
      {
        src: '/media/load_500000_moov_front.mp4',
        type: WSPlayer.CODEC.MP4,
        label: '360P'
      }
      // ,
      // {
      //   src: 'https://vclient.test.8686c.com:88/linxj/media/mp4/shop1.mp4',
      //   type: WSPlayer.CODEC.MP4,
      //   label: '480P'
      // },
      // {
      //   src: 'https://vclient.test.8686c.com:88/linxj/media/mp4/shop2.mp4',
      //   type: WSPlayer.CODEC.MP4,
      //   label: '720P'
      // },
      // {
      //   src: 'https://vclient.test.8686c.com:88/linxj/media/mp4/shop3.mp4',
      //   type: WSPlayer.CODEC.MP4,
      //   label: '1080P'
      // }
    ]
  };
  const HDL_VOD = {
    sources: [
      {
        src:
          'http://vclient.pull.8686c.com/live/hym.flv?wsTime=5d50e5d9&wsSecret=0a96755d0314cd8a4cbdae6c205293c5',
        type: WSPlayer.CODEC.HDL,
        label: '180P'
      }
      // , {
      //     src: "https://vclient.test.8686c.com:88/linxj/media/flv/test2.flv",
      //     type: WSPlayer.CODEC.HDL,
      //     label: '360P'
      // }, {
      //     src: "https://vclient.test.8686c.com:88/linxj/media/flv/test1.flv",
      //     type: WSPlayer.CODEC.HDL,
      //     label: '540P'
      // }, {
      //     src: "https://vclient.test.8686c.com:88/linxj/media/flv/test2.flv",
      //     type: WSPlayer.CODEC.HDL,
      //     label: '720P'
      // }
    ]
  };

  const HLS_VOD = {
    sources: [
      {
        src:
          'https://vclient.test.8686c.com:88/linxj/media/m3u8/load_0_relative.m3u8',
        type: WSPlayer.CODEC.HLS,
        label: '360P'
      },
      {
        src:
          'https://vclient.test.8686c.com:88/linxj/media/m3u8/load_1_relative.m3u8',
        type: WSPlayer.CODEC.HLS,
        label: '480P'
      }
    ]
  };

  const HLS_LIVE = {
    sources: [
      {
        src:
          'http://vclient.pull.8686c.com/live/hym/playlist.m3u8?wsTime=5d63425e&wsSecret=f24072a61c42b89e940655dd333dba65',
        type: WSPlayer.CODEC.HLS,
        label: '360P'
      }
    ]
  };

  const HDL_LIVE = {
    sources: [
      {
        src:
          'http://vclient.pull.8686c.com/live/hym.flv?wsTime=5d638150&wsSecret=e2524848879f4048812d8ec6f724bae0',
        type: WSPlayer.CODEC.HDL,
        label: '480P'
      }
    ]
  };

  const AUDIO = {
    sources: [
      {
        src: 'https://vclient.test.8686c.com:88/linxj/web/media/demo.mp3',
        type: WSPlayer.CODEC.MP3,
        label: '360P'
      }
    ]
  };

  let LOG = null;
  let playOptions = {
    loop: false,
    muted: true,
    isCycle: false,
    autoplay: true,
    // 控制栏配置
    controls: true,
    inactivityTimeout: 0,
    // 右键菜单
    contextMenuConfig: {
      enable: true,
      content: [
        {
          label: '谷歌搜索1',
          href: 'https://www.google.com/',
          listener: () => {
            log('要做什么呢');
          }
        },
        {
          label: '谷歌搜索2',
          href: 'https://www.google.com/'
        }
      ]
    },
    // 清晰度切换
    clarityConfig: {
      enable: false,
      currentIndex: 0
    },
    // 倍速播放
    playbackConfig: {
      enable: false,
      playbackRates: [0.5, 1.0, 1.5, 2.0]
    },
    // 跑马灯
    marqueeConfig: {
      enable: false,
      pixel: 3,
      fontSize: 24,
      fontWeight: 'normal',
      fontColor: '#FF0000',
      content: '版权所有，翻版必究'
    },
    // 系统时间
    systemTimeConfig: {
      enable: false,
      fontSize: 24,
      fontWeight: 'normal',
      fontColor: '#FF0000'
    },
    // 记忆播放
    memoryConfig: {
      enable: true
    },
    // 水印
    watermarkConfig: {
      enable: false,
      url: 'https://vclient.test.8686c.com:88/linxj/media/images/WS.png',
      linkUrl: 'https://www.google.com',
      position: 'top-right'
    },
    // 视频打点
    dotConfig: {
      enable: false,
      dots: [
        {
          time: 10,
          text:
            '预知故事详情 请看下一回合 飞雪连天射白鹿 笑书神侠倚碧鸳 东邪爱恋故事'
        },
        {
          time: 16,
          text:
            '预知故事详情 请看下一回合 飞雪连天射白鹿 笑书神侠倚碧鸳 西毒疯癫缘由'
        },
        {
          time: 23,
          text:
            '预知故事详情 请看下一回合 飞雪连天射白鹿 笑书神侠倚碧鸳 南帝出家为何'
        },
        {
          time: 28,
          text:
            '预知故事详情 请看下一回合 飞雪连天射白鹿 笑书神侠倚碧鸳 北丐今在何方'
        }
      ],
      dotStyle: {
        //'background-color': 'red'
      }
    },
    // 视频预览
    thumbnailConfig: {
      enable: false,
      urls: [
        'https://vclient.test.8686c.com:88/linxj/media/images/111.jpg',
        'https://vclient.test.8686c.com:88/linxj/media/images/222.jpg'
      ]
    },
    // 音频直播封面
    livePosterConfig: {
      enable: false,
      url: 'https://vclient.test.8686c.com:88/linxj/media/images/5.jpg'
    },
    // HDL播放配置
    hdlConfig: {
      mediaDataSource: {
        isLive: true
      },
      reconnectConfig: {
        enable: true,
        timerTime: 3,
        timerLimit: 10
      }
    },
    //SEI播放配置
    seiConfig: {
      isSei: false,
      seiCallback: seiDataCallback
    },
    // HLS播放配置
    hlsConfig: {
      overrideNative: false,
      cacheEncryptionKeys: true,
      reconnectConfig: {
        enable: true,
        timerTime: 3,
        timerLimit: 10
      }
    },
    // 广告
    adConfig: {
      enable: false,
      front: {
        url:
          'https://vclient.test.8686c.com:88/linxj/media/mp4/advert1_mp4_10s.mp4'
      },
      middle: {
        url: 'https://vclient.test.8686c.com:88/linxj/media/images/5.jpg',
        linkUrl: 'https://www.google.com'
      },
      after: {
        url:
          'https://vclient.test.8686c.com:88/linxj/media/mp4/advert1_mp4_10s.mp4'
      }
    },
    // 控制栏组件隐藏
    controlChildrenConfig: {
      enable: false,
      hideLive: false,
      hideVolume: true,
      hideProgress: false,
      hideCurrentTime: true,
      hideDurationTime: true
    }
  };

  function seiDataCallback(obj) {
    console.log('sei:' + JSON.stringify(obj));
  }

  function log(...args) {
    if (!args || !args.length) return;
    let log = '';
    for (let i in args) {
      if (Object.prototype.toString.call(args[i]).slice(8, -1) === 'Object') {
        log += JSON.stringify(args[i]);
      } else {
        log += args[i];
      }
    }
    if (!LOG) {
      LOG = document.getElementById('my-log');
    }
    if (LOG) LOG.value += log + '\n';
  }

  function loadRequestParams() {
    let reqArgs = {};
    const url1 = location.search;
    if (url1.indexOf('?') !== -1) {
      const url2 = url1.substr(1);
      const args = url2.split('&');
      for (let i = 0; i < args.length; i++) {
        reqArgs[args[i].split('=')[0]] = unescape(args[i].split('=')[1]);
      }
    }
    return reqArgs;
  }

  function changePlayerSkin(id, domId, v = '') {
    if (String(id) === '0') {
      WSPlayer.changePlayerSkin(domId, 'wsplayer.min.css');
    } else {
      WSPlayer.changePlayerSkin(domId, 'wsplayer' + id + '.min.css?v=', v);
    }
  }

  function changeCurrentClaritySrc(player, label, index) {
    let data = {
      label: label,
      index: index,
      src: 'https://vclient.test.8686c.com:88/linxj/media/mp4/shop.mp4'
    };
    switch (label) {
      case '360P':
        {
          data.src =
            'https://vclient.test.8686c.com:88/linxj/media/mp4/shop.mp4';
        }
        break;
      case '480P':
        {
          data.src =
            'https://vclient.test.8686c.com:88/linxj/media/mp4/shop.mp4';
        }
        break;
      case '720P':
        {
          data.src =
            'https://vclient.test.8686c.com:88/linxj/media/mp4/shop.mp4';
        }
        break;
      case '1080P':
        {
          data.src =
            'https://vclient.test.8686c.com:88/linxj/media/mp4/shop.mp4';
        }
        break;
    }
    if (player) player.changeCurrentClaritySrc(data);
  }

  function parseConfig() {
    let type = 'vod';
    let isAd = false;
    let isLive = true;
    let isSei = true;
    let isPoster = false;
    let enableDot = false;
    let enableMenu = true;
    let enableRetry = false;
    let enableClarity = false;
    let enableMarquee = false;
    let enablePlayback = false;
    let enableWatermark = false;
    let enableThumbnail = false;
    let enableSystemTime = false;
    let enableLivePoster = false;
    let overrideNativeHLS = false;
    let enableControlChildren = false;
    const paramArgs = loadRequestParams();

    for (let idx in paramArgs) {
      switch (idx) {
        case 'type':
          {
            type = paramArgs[idx];
          }
          break;
        case 'ad':
          {
            isAd = String(paramArgs[idx]) === 'true';
          }
          break;
        case 'live':
          {
            isLive = String(paramArgs[idx]) === 'true';
          }
          break;
        case 'poster':
          {
            isPoster = String(paramArgs[idx]) === 'true';
          }
          break;
        case 'dot':
          {
            enableDot = String(paramArgs[idx]) === 'true';
          }
          break;
        case 'menu':
          {
            enableMenu = !(String(paramArgs[idx]) === 'false');
          }
          break;
        case 'retry':
          {
            enableRetry = String(paramArgs[idx]) === 'true';
          }
          break;
        case 'clarity':
          {
            enableClarity = String(paramArgs[idx]) === 'true';
          }
          break;
        case 'marquee':
          {
            enableMarquee = String(paramArgs[idx]) === 'true';
          }
          break;
        case 'playback':
          {
            enablePlayback = String(paramArgs[idx]) === 'true';
          }
          break;
        case 'watermark':
          {
            enableWatermark = String(paramArgs[idx]) === 'true';
          }
          break;
        case 'thumbnail':
          {
            enableThumbnail = String(paramArgs[idx]) === 'true';
          }
          break;
        case 'systemtime':
          {
            enableSystemTime = String(paramArgs[idx]) === 'true';
          }
          break;
        case 'liveposter':
          {
            enableLivePoster = String(paramArgs[idx]) === 'true';
          }
          break;
        case 'controlchildren':
          {
            enableControlChildren = String(paramArgs[idx]) === 'true';
          }
          break;
        case 'hlsnative':
          {
            overrideNativeHLS = String(paramArgs[idx]) === 'true';
          }
          break;

        case 'loop':
        case 'muted':
          {
            playOptions[idx] = String(paramArgs[idx]) === 'true';
          }
          break;
        case 'cycle':
          {
            playOptions['isCycle'] = String(paramArgs[idx]) === 'true';
          }
          break;
        case 'autoplay':
        case 'controls':
          {
            playOptions[idx] = !(String(paramArgs[idx]) === 'false');
          }
          break;
        case 'inactivityTimeout':
          {
            const inactivityTimeout = parseInt(paramArgs[idx]);
            if (!isNaN(inactivityTimeout) && inactivityTimeout >= 0) {
              playOptions[idx] = inactivityTimeout;
            }
          }
          break;
        default:
          break;
      }
    }

    // 视频类型
    let config = playOptions;
    if (type === 'hdl') {
      if (!isLive) {
        config.sources = HDL_VOD.sources;
      } else {
        config.sources = HDL_LIVE.sources;
      }
    } else if (type === 'hls') {
      if (!isLive) {
        config.sources = HLS_VOD.sources;
      } else {
        config.sources = HLS_LIVE.sources;
      }
    } else if (type === 'audio') {
      config.sources = AUDIO.sources;
    } else {
      config.sources = VOD.sources;
    }

    // 是否启用广告功能
    config.adConfig.enable = isAd;
    // 是否启用清晰度切换功能
    config.clarityConfig.enable = enableClarity;
    // 是否启用跑马灯功能
    config.marqueeConfig.enable = enableMarquee;
    // 是否启用右键菜单
    config.contextMenuConfig.enable = enableMenu;
    // 是否启用倍速播放功能
    config.playbackConfig.enable = enablePlayback;
    // 是否启用水印功能
    config.watermarkConfig.enable = enableWatermark;
    // 是否启用微窗预览功能
    config.dotConfig.enable = enableDot;
    config.thumbnailConfig.enable = enableThumbnail;
    // 是否启用系统时间功能
    config.systemTimeConfig.enable = enableSystemTime;
    // 是否启用音频直播封面功能
    config.livePosterConfig.enable = enableLivePoster;
    // HDL播放配置
    config.hdlConfig.mediaDataSource.isLive = isLive;
    config.hdlConfig.reconnectConfig.enable = enableRetry;
    // HLS播放配置
    config.hlsConfig.overrideNative = overrideNativeHLS;
    config.hlsConfig.reconnectConfig.enable = enableRetry;
    //SEI播放配置
    config.seiConfig.isSei = isSei;
    // 控制栏组件隐藏配置
    config.controlChildrenConfig.enable = enableControlChildren;
    // 视频封面
    if (isPoster) {
      config.poster =
        'https://vclient.test.8686c.com:88/linxj/media/images/5.jpg';
    }
    return config;
  }

  function play(id) {
    let config = parseConfig();
    let player = WSPlayer(id, config, () => {
      WSPlayer.log('Your player is ready!');
      if (player) {
        player.on(WSPlayer.WSEvent.PLAY.ENDED, function() {
          WSPlayer.log('video ended');
        });

        player.on(WSPlayer.WSEvent.PLAY.ERROR, function(event, error) {
          WSPlayer.log('video error', error);
        });

        player.on(WSPlayer.WSEvent.CLARITY.CURRENT_UPDATE, function(e, data) {
          WSPlayer.log('clarity switch to =>', data);
          // changeCurrentClaritySrc(player, data.clarityLabel, data.clarityIndex);
        });
      } else {
        WSPlayer.log('no player');
      }
    });
    return player;
  }

  return {
    log: log,
    play: play,
    changePlayerSkin: changePlayerSkin
  };
})();
