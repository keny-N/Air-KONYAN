<?php
header('Content-Type:application/json');
$text = $_POST['text']; //slackからのPost[Json:text]を$textに代入



//POST用関数
function send_to_slack($message) {
  $webhook_url = 'https://hooks.slack.com/services/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';   //Slack IncomingWebhook URL
  $options = array( //以下何やらなんやらやってくれている
    'http' => array(
      'method' => 'POST',
      'header' => 'Content-Type: application/json',
      'content' => json_encode($message),
    )
  );
  $response = file_get_contents($webhook_url, false, stream_context_create($options)); //要求を$webhook_urlのURLに投げて結果を受け取る
  return $response === 'ok'; //$responseの値がokならtrueを返す
}


if(strpos($text,'ON') !== false){  //電源 ON OFF 処理
  // 'cold'で電源ON
  exec('python3 irrp.py -p -g17 -f codes.bak1 light:on');
  $message = array(
    'username' => 'airbo',    //Slackbotの名前
    'text' => 'TVをつけるよ！', //送信するテキスト
    'icon_emoji' => ':icon_default:', //ボットのアイコン
  );
  send_to_slack($message); //処理を実行
}elseif(strpos($text,'OFF') !== false){
  // 電源'off'
  exec('python3 irrp.py -p -g17 -f codes.bak1 light:on');
  $message = array(
    'username' => 'airbo',  //Slackbotの名前
    'text' => 'TVの電源を消したよ！(TV)', //送信するテキスト
    'icon_emoji' => ':icon_default:', //ボットのアイコン
  );
  sleep(3);
  send_to_slack($message); //処理を実行
}
elseif(strpos($text,'UP') !== false){ //音を上げる処理
  //fopen関数を使い、"temp.txt"ファイルを読み込みモードで取得
//  $fp = fopen("temp2.txt", "r");
  //temp.txtの中身を$tempに代入
//  $temp = fgets($fp);

  //読み込みモード終了
//  fclose($fp);
  //fopen関数を使い,temp.txtを書き込みモードで取得
//  $fp = fopen("temp2.txt", "w");
  //fwrite("書き込み上書きするファイル","書き込み値")
//  fwrite($fp, ++$fp);
  //書き込みモード終了
//  fclose($fp);
  // TVの音量UP
  exec('python3 irrp.py -p -g17 -f codes.bak1 val:up');
  $message = array(
    'username' => 'airbo',
    'text' =>'投票の結果、TVの音量をあげました！',
    'icon_emoji' => ':icon_up:', //ボットのアイコン
  );
  send_to_slack($message); //処理を実行
}elseif(strpos($text,'DOWN') !== false){ //音を下げる処理
  //fopen関数を使い、"temp.txt"ファイルを読み込みモードで取得
//  $fp = fopen("temp2.txt", "r");
  //temp.txtの中身を$tempに代入
//  $temp = fgets($fp);

  //読み込みモード終了
//  fclose($fp);
  //fopen関数を使い,temp.txtを書き込みモードで取得
//  $fp = fopen("temp2.txt", "w");
  //fwrite("書き込み上書きするファイル","書き込み値")
//  fwrite($fp, --$fp);
  //書き込みモード終了
//  fclose($fp);
  // TVの音量UP
  exec('python3 irrp.py -p -g17 -f codes.bak1 val:down');
  $message = array(
    'username' => 'airbo',
    'text' =>'投票の結果、TVの音量をさげました！',
    'icon_emoji' => ':icon_down:', //ボットのアイコン
  );
  sleep(3);
  send_to_slack($message); //処理を実行
}else{
  echo '{"エラーが発生しました!"}';
}

?>

