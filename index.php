<?php
    require_once "jssdk.php";
    $jssdk = new JSSDK("wx196d136af4b7adab", "916f1c81827c9aa61c2e4a72258894e9");
    $signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> 会跳舞的光，了解一下 </title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
    <meta name="x5-orientation" content="portrait">
    <style>
        * {
            padding: 0;
            margin: 0;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }

        body, html {
            width: 100%;
            height: 100%;
            overflow: hidden;
            font-family: PingFangSC-Light, 'helvetica neue', arial, 'hiragino sans gb', 'microsoft yahei ui', 'microsoft yahei', simsun, sans-serif;
            background-color: #000;
        }

        @media screen and (max-width:359px) and (min-width:320px) {
            html,body{
                font-size: 8px !important;
            }
        }
        @media screen and (max-width:374px) and (min-width:360px) {
            html,body{
                font-size: 9px !important;
            }
        }
        @media screen and (max-width:409px) and (min-width:375px) {
           html,body{
                font-size: 10px !important;
            }
        }
        @media screen and (max-width:639px)  and (min-width:410px){
           html,body{
                font-size: 11px !important;
            }
        }

        .item, .wrap {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .item {
            position: absolute;
            background-color: #000;
        }

        video {
            object-fit: fill;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;

        }

        .IIV::-webkit-media-controls-play-button,
        video::-webkit-media-controls-start-playback-button {
            opacity: 0;
            pointer-events: none;
            width: 5px;
        }

        .item.pre {
            z-index: 888;
        }

        .item:not(:nth-child(1)).active {
            position: fixed;
            left: 0;
            z-index: 999;
            -webkit-animation: up 1s both;
            -o-animation: up 1s both;
            animation: up 1s both;
        }

        .item:first-child.active {
            position: fixed;
            left: 0;
            z-index: 999;
        }

        @-webkit-keyframes up {
            from {
                top: 100%;
            }
            to {
                top: 0;
            }
        }

        .item:not(:last-child).down {
            position: fixed;
            left: 0;
            z-index: 999;
            -webkit-animation: down .6s both;
            -o-animation: down .6s both;
            animation: down .6s both;
        }

        @-webkit-keyframes down {
            from {
                top: -100%;
            }
            to {
                top: 0;
            }
        }

        @keyframes animatedBird {
            0% { background-position: 0% 0%; }
            25% { background-position: 0% 25%; }
            50% { background-position: 0% 50%; }
            75% { background-position: 0% 75%; }
            100% { background-position: 0% 100%;  }
        }

        .load-mask {
            width: 100%;
            height: 100%;
            background-color: #7b8390;
            /*background: linear-gradient( #FF0600, #FFFE00, #05FF00, #0003FF, #FF00D7 ); */
            background-image: url("./img/background-color.png");
            /*background-width: 100%;*/
            background-size: 100% auto;
            animation: animatedBird 6s linear infinite;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1099;
            text-align: center;
        }

        .load-mask > img {
            width: 100%;
            -webkit-transform-origin: center center;
            -moz-transform-origin: center center;
            -ms-transform-origin: center center;
            -o-transform-origin: center center;
            transform-origin: center center;
        }

        .start-btn {
            width: 25.7rem !important;
            height: 6.5rem !important;
            /*margin-bottom: -13rem !important;*/
        }

        .start-btn > img
        {
            width: 25.7rem;
            height: 6.5rem;
        }

        .load-bar {
            display: none;
            margin-top: 50px;
            width: 23.5rem;
            height: 2.8rem;
            background-size: 100% 100%;
            position: relative;
            overflow: hidden;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            text-align: left;
            border: 3px solid #000000; 
            border-radius: 8px;
            background-color: #3b3b3b;
        }

        .bar {
            background-color: #fdffc0;
            height: 2.2rem;
            border-radius: 8px 0 0 8px;
        }

        @keyframes beat {
            0% {
                -webkit-transform: scale3d(0.5, 0.5, 0.5);
                -moz-transform: scale3d(0.5, 0.5, 0.5);
                -ms-transform: scale3d(0.5, 0.5, 0.5);
                -o-transform: scale3d(0.5, 0.5, 0.5);
                transform: scale3d(0.5, 0.5, 0.5);
            }
            50% {
                -webkit-transform: scale3d(1, 1, 1);
                -moz-transform: scale3d(1, 1, 1);
                -ms-transform: scale3d(1, 1, 1);
                -o-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
            100% {
                -webkit-transform: scale3d(0.5, 0.5, 0.5);
                -moz-transform: scale3d(0.5, 0.5, 0.5);
                -ms-transform: scale3d(0.5, 0.5, 0.5);
                -o-transform: scale3d(0.5, 0.5, 0.5);
                transform: scale3d(0.5, 0.5, 0.5);
            }
        }

        .load-mask img {
            margin-top: 2.9rem;
        }

        .icon-play {
            width: 60px;
            height: 60px;
            display: inline-block;
            background-image: url("./img/icon-play.png");
            background-size: 60px 60px;
            background-position: center;
            background-repeat: no-repeat;
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            cursor: pointer;
            z-index: 1;
            -webkit-transform-origin: center center !important;
            -moz-transform-origin: center center !important;
            -ms-transform-origin: center center !important;
            -o-transform-origin: center center !important;
            transform-origin: center center !important;
        }

        .wrap-text {
            position: absolute;
            bottom: 0;
            /* width: 33px; */
            left: 0;
            /* width: 100%; */
            padding: 20px 35px 76px 35px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            width: 100%;
            color: #fff;
            background: -webkit-linear-gradient(rgba(0, 0, 0, .01), rgba(0, 0, 0, .5)); /* Safari 5.1 - 6.0 */
            background: -o-linear-gradient(rgba(0, 0, 0, .01), rgba(0, 0, 0, .5)); /* Opera 11.1 - 12.0 */
            background: -moz-linear-gradient(rgba(0, 0, 0, .01), rgba(0, 0, 0, .5)); /* Firefox 3.6 - 15 */
            background: linear-gradient(rgba(0, 0, 0, .01), rgba(0, 0, 0, .5)); /* 标准的语法 */
        }

        .user-name {
            font-size: 18px;
            line-height: 1.5;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .user-des {
            font-size: 14px;
            line-height: 1.5;
        }

        .wrap-icons {
            position: absolute;
            bottom: 160px;
            width: 38px;
            right: 30px;
            color: #ffffff;
            font-size: 14px;
            text-align: center;
        }

        .icon-love {
            width: 38px;
            height: 34px;
            background-image: url("./img/love-1.png?ver=2018041301");
            display: inline-block;
            background-size: 100% 100%;
            background-position: center;
        }

        .icon-love.active {
            background-image: url("./img/love-2.png?ver=2018041301");
        }

        .icon-share {
            margin-top: 20px;
            width: 38px;
            height: 32px;
            display: inline-block;
            background-image: url("./img/share.png?ver=2018041301");
            background-size: 100% 100%;
            background-position: center;
        }

        .wrap-icon-up {
            position: absolute;
            bottom: 30px;
            text-align: center;
            width: 100%;
            z-index: 1000;
        }

        .icon-up {
            display: inline-block;
            width: 40px;
            height: 25px;
            background-size: cover;
            background-image: url("./img/arrow-down.png?ver=2018041301");
            animation: slide_up .6s infinite ease-out both;
            -webkit-animation: slide_up .6s infinite ease-out both;
        }

        @keyframes slide_up {
            0% {
                opacity: 0;
                transform: translate(0, 4px);
            }
            100% {
                opacity: 1;
                transform: translate(0, -4px);
            }
        }

        .mask-share {
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, .4);
            position: absolute;
            z-index: 3000;
            left: 0;
            top: 0;
            display: none;
        }

        .share-img {
            width: 130px;
            height: 190px;
            background-image: url("./img/share-2.png");
            position: absolute;
            right: 20px;
            top: 20px;
            background-size: 100% 100%;
        }

        .icon-user {
            display: inline-block;
            width: 40px;
            height: 40px;
            background-image: url("./imgs/user-pic.png");
            background-size: 100% 100%;
            vertical-align: -15px;
            margin-right: 10px;
        }

    </style>
</head>

<body>

<div class="wrap">
    <!-- Video 1 Start -->
    <div class="item active">
        <div class="icon-play"></div>
        <video loop class="video" preload="auto" playsinline
               x5-video-player-type="h5" x5-video-player-fullscreen="false" webkit-playsinline
               poster="./img/1_Moment.jpg?ver=2018041301"
               src="https://cdn.awsbj0.fds.api.mi-img.com/cloud/marketing/1.mp4" type="video/mp4"></video>
        <div class="wrap-icons">
            <i class="icon-love"></i>
            <span>16.5w</span>
            <i class="icon-share"></i>
            <span>转发</span>
        </div>
    </div>
    <!-- Video 1 End -->

    <!-- Video 2 Start -->
    <div class="item">
        <i class="icon-play"></i>
        <video loop class="video" preload="auto" playsinline
               x5-video-player-type="h5" x5-video-player-fullscreen="false" webkit-playsinline
               poster="./img/2_Moment.jpg?ver=2018041301"
               src="https://cdn.awsbj0.fds.api.mi-img.com/cloud/marketing/2.mp4" type="video/mp4"></video>
        <div class="wrap-icons">
            <i class="icon-love"></i>
            <span>13.2w</span>
            <i class="icon-share"></i>
            <span>转发</span>
        </div>
    </div>
    <!-- Video 2 End -->

    <!-- Video 3 Start -->
    <div class="item">
        <i class="icon-play"></i>
        <video loop class="video" preload="auto" playsinline
               x5-video-player-type="h5" x5-video-player-fullscreen="false" webkit-playsinline
               poster="./img/3_Moment.jpg?ver=2018041301"
               src="https://cdn.awsbj0.fds.api.mi-img.com/cloud/marketing/3.mp4" type="video/mp4"></video>
        <div class="wrap-icons">
            <i class="icon-love"></i>
            <span>21.2w</span>
            <i class="icon-share"></i>
            <span>转发</span>
        </div>
    </div>
    <!-- Video 3 End -->

    <!-- Video 4 Start -->
    <div class="item">
        <i class="icon-play"></i>
        <video loop class="video" preload="auto" playsinline
               x5-video-player-type="h5" x5-video-player-fullscreen="false" webkit-playsinline
               poster="./img/4_Moment.jpg?ver=2018041301"
               src="https://cdn.awsbj0.fds.api.mi-img.com/cloud/marketing/4.mp4" type="video/mp4"></video>
        <div class="wrap-icons">
            <i class="icon-love"></i>
            <span>22.8w</span>
            <i class="icon-share"></i>
            <span>转发</span>
        </div>
    </div>
    <!-- Video 4 End -->

    <!-- Video 5 Start -->
    <div class="item">
        <i class="icon-play"></i>
        <video loop class="video" preload="auto" playsinline
               x5-video-player-type="h5" x5-video-player-fullscreen="false" webkit-playsinline
               poster="./img/5_Moment.jpg?ver=2018041301"
               src="https://cdn.awsbj0.fds.api.mi-img.com/cloud/marketing/5.mp4" type="video/mp4"></video>
        <div class="wrap-icons">
            <i class="icon-love"></i>
            <span>18.9w</span>
            <i class="icon-share"></i>
            <span>转发</span>
        </div>
    </div>
    <!-- Video 5 End -->

    <!-- Video 6 Start -->
    <div class="item">
        <i class="icon-play"></i>
        <video loop class="video" preload="auto" playsinline
               x5-video-player-type="h5" x5-video-player-fullscreen="false" webkit-playsinline
               poster="./img/6_Moment.jpg?ver=2018041301"
               src="https://cdn.awsbj0.fds.api.mi-img.com/cloud/marketing/6.mp4" type="video/mp4"></video>
        <div class="wrap-icons">
            <i class="icon-love"></i>
            <span>19.5w</span>
            <i class="icon-share"></i>
            <span>转发</span>
        </div>
    </div>
    <!-- Video 6 End -->
</div>

<div class="load-mask">
    <img src="./img/color-world.png">
    <img id="pserson_img" src="./img/person-1.png">
    <img class="start-btn" src="./img/click-button.png">
    <div class="load-bar">
        <div class="bar"></div>
    </div>
</div>
<div class="wrap-icon-up">
    <i class="icon-up"></i>
</div>
<div class="mask-share">
    <div class="share-img"></div>
</div>

<script src="./js/zepto.min.js"></script>
<script src="./js/event.js"></script>
<script>
    Zepto(function($) {
      var startBtn = document.getElementsByClassName('start-btn')[0],
          u = navigator.userAgent,
          items = $('.item'),
          lenth = items.length,
          startX, startY, endX, endY, flag, loveIcons = document.getElementsByClassName('icon-love'),
          shareIcons = document.getElementsByClassName('icon-share'),
          playIcons = document.getElementsByClassName('icon-play'),
          videos = document.getElementsByClassName('video'),
          showMask = document.getElementsByClassName('mask-share')[0],
          isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1,
          isiOS = !! u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/);
      isiOS && startBtn.addEventListener('touchstart', startFn);
      !isiOS && startBtn.addEventListener('click', startFn);

      function startFn(e) {
          // console.log(e);
          var self = isiOS ? e.touches[0].target : e.target;
          self.style.display = 'none';
          $('.load-bar')[0].style.display = 'inline-block';
          $('video').forEach(function(item, index) {
              item.muted = true
          });
          var barW = 1,
              rqst, bar = document.getElementsByClassName('bar')[0];

          function animate() {
              bar.style.width = barW + (230 - barW) * 0.015 + 'px';
              barW = barW + (230 - barW) * 0.02;
              rqst = requestAnimationFrame(animate)
          }
          animate();
          setTimeout(function() {
              $('video').forEach(function(item, index) {
                  item.currentTime = 0;
                  item.muted = false;
                  var playIcon = $($(item).prev('.icon-play')[0]);
                  item.addEventListener('playing', function() {
                      playIcon.hide()
                  });
                  item.addEventListener('pause', function() {
                      playIcon.show()
                  });
                  index !== 0 ? item.pause() : item.play()
              });
              setTimeout(function() {
                  $('.load-mask').hide();
                  cancelAnimationFrame(rqst)
              }, 400)
          }, 7000)
      }
      document.addEventListener('touchstart', function(e) {
          isiOS && e.preventDefault();
          startX = e.touches[0].clientX;
          startY = e.touches[0].clientY;
          document.addEventListener('touchmove', touchMoveHandler)
      });

      function touchMoveHandler(e) {
          isiOS && e.preventDefault();
          endX = e.changedTouches[0].clientX;
          endY = e.changedTouches[0].clientY;
          var index = $($(e.changedTouches[0].target).parents('.item')).index();
          if (endY - startY > 100) {
              flag = 'swipeDown';
              if (index <= lenth - 1) {
                  $('.wrap-icon-up').show()
              }
              if (index < lenth && index >= 1) {
                  items.removeClass('active down pre');
                  $(items[index - 1]).addClass('down');
                  $(items[index - 1]).find('video')[0].play();
                  $(items[index]).addClass('pre');
                  $(items[index]).find('video')[0].pause();
                  document.removeEventListener('touchmove', touchMoveHandler)
              }
          } else {
              if (Math.abs(endY - startY) > 100) {
                  flag = 'swipeUp';
                  if (index === lenth - 1) {
                      $('.mask-share').show()
                  }
                  if (index < lenth - 1 && index >= 0) {
                      items.removeClass('active down pre');
                      $(items[index + 1]).addClass('active');
                      $(items[index + 1]).find('video')[0].play();
                      $(items[index]).addClass('pre');
                      $(items[index]).find('video')[0].pause()
                  }
                  document.removeEventListener('touchmove', touchMoveHandler)
              }
          }
      }
      for (var j = 0; j < loveIcons.length; j++) {
          loveIcons[j].addEventListener('touchstart', function() {
              $(this).addClass('active')
          });
          shareIcons[j].addEventListener('touchstart', function() {
              $('.mask-share').show()
          });
          isAndroid && playIcons[j].addEventListener('click', function(e) {
              e.stopPropagation();
              $(this).next('video')[0].play()
          });
          !isAndroid && playIcons[j].addEventListener('touchstart', function(e) {
              e.stopPropagation();
              $(this).next('video')[0].play()
          });
          videos[j].addEventListener('touchstart', function() {
              this.pause()
          })
      }
      showMask.addEventListener('touchstart', function() {
          $(this).hide()
      });
    });
    /* 人物切换效果 */
    $( function() {
      setInterval( function() {
          var img_selector = $( '#pserson_img' );
          var pserson_src = img_selector.attr( 'src' );
          if ( pserson_src.indexOf( 'person-1' ) >= 0 )
          {
              img_selector.attr( 'src', './img/person-2.png' );
          }
          else
          {
              img_selector.attr( 'src', './img/person-1.png' );
          }
      }, 500 );
    });
</script>
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
  wx.config({
    debug: false,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      'onMenuShareTimeline',
      'onMenuShareAppMessage'
    ]
  });
  wx.ready(function () {
    wx.onMenuShareAppMessage({
        title: '会跳舞的光，了解一下',
        desc: '会跳舞的光，不知当跳不当跳',
        link: 'http://weixin.yeelight.com/marketing/index.php',
        imgUrl: 'http://weixin.yeelight.com/marketing/img/share.jpeg',
        type: '',
        dataUrl: '',
        success: function () {
            
        },
        cancel: function () {
            
        }
    });
  });
</script>
</html>