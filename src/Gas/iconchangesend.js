var slackAccessToken = '自身の組織のアクセストークンを入力してください';

function sendSub(message,icon){
var POST_URL = 'https://slack.com/api/chat.postMessage';
  var payload = {
    token: slackAccessToken,
    //channel: '#general',
    //channel: '#実験',
    channel: '#airboの部屋',
    text: message,
    icon_emoji: icon,
    username: 'airbo'
  };
  var params = {
    'method': 'post',
    'payload': payload
  };
  var response = UrlFetchApp.fetch(POST_URL, params);

}

function sendRas(message,icon){
var POST_URL = 'https://slack.com/api/chat.postMessage';
  var payload = {
    token: slackAccessToken,
    channel: '#gas_rest-ras_get',
    //channel: '#実験',
    text: message,
    icon_emoji: icon,
    username: 'gas-ras'
  };
  var params = {
    'method': 'post',
    'payload': payload
  };
  var response = UrlFetchApp.fetch(POST_URL, params);
}

function sendFst(user,message,icon){
var POST_URL = 'https://slack.com/api/chat.postMessage';
  var payload = {
    token: slackAccessToken,
    channel: "@"+user,
    //channel: '#実験',
    text: message,
    icon_emoji: icon,
    username: 'airbo'
  };
  var params = {
    'method': 'post',
    'payload': payload
  };
  var response = UrlFetchApp.fetch(POST_URL, params);
  //setTrigger();
}
