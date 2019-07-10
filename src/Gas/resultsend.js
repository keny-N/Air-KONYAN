function set(){
  SendMessage('down');
}

function SendMessage(flag) {

  var msg;
  var msg1;
  var icon=':icon_default:';

  switch(flag){
    case 'up':
      msg='投票の結果、エアコンの設定温度を1度あげたよ！';
      msg1='up';
      icon=':icon_up:';
      break;
    case 'down':
      msg='投票の結果、エアコンの設定温度を1度さげたよ！';
      msg1='down';
      icon=':icon_down:'
      break;
    case 'cansel':
      msg='色々あった結果、エアコンの温度変更を中止したよ・・・';
      icon=':icon_sad:';
      break;
    default:
      msg='エラーがでたみたい・・・もう一度動作をやり直してね';
      icon=':icon_sad:';
  }

  var SLACK_ACCESS_TOKEN = 'xoxp-616698328789-605378954498-635814010837-44b6a0c8272544f5222b754ba655089d';
  var token = PropertiesService.getScriptProperties().getProperty('SLACK_ACCESS_TOKEN');

  var slackApp = SlackApp.create(SLACK_ACCESS_TOKEN); //SlackApp インスタンスの取得

  sendRas(msg1,icon);

  sendSub(msg,icon);

//  var options = {
//    channelId: "#実験", //チャンネル名
//    userName: "Airbo", //投稿するbotの名前
//    message: msg //投稿するメッセージ
//  };

//  slackApp.postMessage(options.channelId, options.message, {username: options.userName});

}
