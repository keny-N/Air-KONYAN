function set(){
  SendMessage('down');
}

function SendMessage(flag) {

  var msg;
  var msg1;
  var icon=':icon_default:';

  switch(flag){
    case 'up':
      msg='投票の結果、エアコンの温度をあげました！';
      msg1='up';
      icon=':icon_up:';
      break;
    case 'down':
      msg='投票の結果、エアコンの温度をさげました！';
      msg1='down';
      icon=':icon_down:'
      break;
    case 'cansel':
      msg='色々あった結果、温度変更が中止されました...';
      icon=':icon_sad:';
      break;
    default:
      msg='エラーが出たようです...もう一度やり直してください';
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
