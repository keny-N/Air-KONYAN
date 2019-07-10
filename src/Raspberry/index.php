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


if(strpos($text,'cold') !== false){  //電源 ON OFF 処理
  // 'cold'で電源ON
  exec('python3 irrp.py -p -g17 -f air cold');
  $message = array(
    'username' => 'airbo',    //Slackbotの名前
    'text' => '冷房をつけるよ！', //送信するテキスト
    'icon_emoji' => ':icon_default:', //ボットのアイコン
  );
  send_to_slack($message); //処理を実行
}elseif(strpos($text,'hot') !== false){
  // 'hot'で電源ON
  exec('python3 irrp.py -p -g17 -f air hot');
  $message = array(
    'username' => 'airbo',    //Slackbotの名前
    'text' => '暖房をつけるよ！', //送信するテキスト
    'icon_emoji' => ':icon_default:', //ボットのアイコン
  );
  send_to_slack($message); //処理を実行
}elseif(strpos($text,'off') !== false){
  // 電源'off'
  exec('python3 irrp.py -p -g17 -f air off');
  $message = array(
    'username' => 'airbo',  //Slackbotの名前
    'text' => 'エアコンの電源を消したよ！', //送信するテキスト
    'icon_emoji' => ':icon_default:', //ボットのアイコン
  );
}
elseif(strpos($text,'up') !== false){ //温度を上げる処理
  //fopen関数を使い、"temp.txt"ファイルを読み込みモードで取得
  $fp = fopen("temp.txt", "r");
  //temp.txtの中身を$tempに代入
  $temp = fgets($fp);

  //temp(エアコンの温度)の値によって分岐
  switch ($temp) {
    case '20':
      //読み込みモード終了
      fclose($fp);
      //fopen関数を使い,temp.txtを書き込みモードで取得
      $fp = fopen("temp.txt", "w");
      //fwrite("書き込み上書きするファイル","書き込み値")
      fwrite($fp, "21");
      //書き込みモード終了
      fclose($fp);
      // 21度のリモコンの赤外線データを実行
      exec('python3 irrp.py -p -g17 -f air temp:21');
      //メッセージの内容を定義
      $message = array(
        'username' => 'airbo',    //Slackbotの名前
        'text' => '21度にあげぽよ☝️', //送信するテキスト
        'icon_emoji' => ':icon_default:', //ボットのアイコン
      );
      break;
    case '21':
      //読み込みモード終了
      fclose($fp);
      //fopen関数を使い,temp.txtを書き込みモードで取得
      $fp = fopen("temp.txt", "w");
      //fwrite("書き込み上書きするファイル","書き込み値")
      fwrite($fp, "22");
      //書き込みモード終了
      fclose($fp);
      // 22度のリモコンの赤外線データを実行
      exec('python3 irrp.py -p -g17 -f air temp:22');
      $message = array(
        'username' => 'airbo',
        'text' => '22度にあげぽよ☝️',
        'icon_emoji' => ':icon_default:', //ボットのアイコン
      );
      break;
    case '22':
      //読み込みモード終了
      fclose($fp);
      //fopen関数を使い,temp.txtを書き込みモードで取得
      $fp = fopen("temp.txt", "w");
      //fwrite("書き込み上書きするファイル","書き込み値")
      fwrite($fp, "23");
      //書き込みモード終了
      fclose($fp);
      // 23度のリモコンの赤外線データを実行
      exec('python3 irrp.py -p -g17 -f air temp:23');
      $message = array(
        'username' => 'airbo',
        'text' => '23度にあげぽよ☝️',
        'icon_emoji' => ':icon_default:', //ボットのアイコン
      );
      break;
    case '23':
      //読み込みモード終了
      fclose($fp);
      //fopen関数を使い,temp.txtを書き込みモードで取得
      $fp = fopen("temp.txt", "w");
      //fwrite("書き込み上書きするファイル","書き込み値")
      fwrite($fp, "24");
      //書き込みモード終了
      fclose($fp);
      // 24度のリモコンの赤外線データを実行
      exec('python3 irrp.py -p -g17 -f air temp:24');
      $message = array(
        'username' => 'airbo',
        'text' => '24度にあげぽよ☝️',
        'icon_emoji' => ':icon_default:', //ボットのアイコン
      );
      break;
    case '24':
      //読み込みモード終了
      fclose($fp);
      //fopen関数を使い,temp.txtを書き込みモードで取得
      $fp = fopen("temp.txt", "w");
      //fwrite("書き込み上書きするファイル","書き込み値")
      fwrite($fp, "25");
      //書き込みモード終了
      fclose($fp);
      // 25度のリモコンの赤外線データを実行
      exec('python3 irrp.py -p -g17 -f air temp:25');
      $message = array(
        'username' => 'airbo',
        'text' => '25度にあげぽよ☝️',
        'icon_emoji' => ':icon_default:', //ボットのアイコン
      );
      break;
    case '25':
      //読み込みモード終了
      fclose($fp);
      //fopen関数を使い,temp.txtを書き込みモードで取得
      $fp = fopen("temp.txt", "w");
      //fwrite("書き込み上書きするファイル","書き込み値")
      fwrite($fp, "26");
      //書き込みモード終了
      fclose($fp);
      // 26度のリモコンの赤外線データを実行
      exec('python3 irrp.py -p -g17 -f air temp:26');
      $message = array(
        'username' => 'airbo',
        'text' => '26度にあげぽよ☝️',
        'icon_emoji' => ':icon_default:', //ボットのアイコン
      );
      break;
    case '26':
      //読み込みモード終了
      fclose($fp);
      //fopen関数を使い,temp.txtを書き込みモードで取得
      $fp = fopen("temp.txt", "w");
      //fwrite("書き込み上書きするファイル","書き込み値")
      fwrite($fp, "27");
      //書き込みモード終了
      fclose($fp);
      // 27度のリモコンの赤外線データを実行
      exec('python3 irrp.py -p -g17 -f air temp:27');
      $message = array(
        'username' => 'airbo',
        'text' => '27度にあげぽよ☝️',
        'icon_emoji' => ':icon_default:', //ボットのアイコン
      );
      break;
    case '27':
      //読み込みモード終了
      fclose($fp);
      //fopen関数を使い,temp.txtを書き込みモードで取得
      $fp = fopen("temp.txt", "w");
      //fwrite("書き込み上書きするファイル","書き込み値")
      fwrite($fp, "28");
      //書き込みモード終了
      fclose($fp);
      // 28度のリモコンの赤外線データを実行
      exec('python3 irrp.py -p -g17 -f air temp:28');
      $message = array(
        'username' => 'airbo',
        'text' => '28度にあげぽよ☝️',
        'icon_emoji' => ':icon_default:', //ボットのアイコン
      );
      break;
    case '28':
      //読み込みモード終了
      fclose($fp);
      //fopen関数を使い,temp.txtを書き込みモードで取得
      $fp = fopen("temp.txt", "w");
      //fwrite("書き込み上書きするファイル","書き込み値")
      fwrite($fp, "29");
      //書き込みモード終了
      fclose($fp);
      // 29度のリモコンの赤外線データを実行
      exec('python3 irrp.py -p -g17 -f air temp:29');
      $message = array(
        'username' => 'airbo',
        'text' => '29度にあげぽよ☝️',
        'icon_emoji' => ':icon_default:', //ボットのアイコン
      );
      break;
    case '29':
      //読み込みモード終了
      fclose($fp);
      //fopen関数を使い,temp.txtを書き込みモードで取得
      $fp = fopen("temp.txt", "w");
      //fwrite("書き込み上書きするファイル","書き込み値")
      fwrite($fp, "30");
      //書き込みモード終了
      fclose($fp);
      // 30度のリモコンの赤外線データを実行
      exec('python3 irrp.py -p -g17 -f air temp:30');
      $message = array(
        'username' => 'airbo',
        'text' => '30度にあげぽよ☝️',
        'icon_emoji' => ':icon_default:', //ボットのアイコン
      );
      break;

    default:
      fclose($fp);
      $message = array(
        'username' => 'airbo',
        'text' => 'もうこれ以上温度は上がらないよ😥',
        'icon_emoji' => ':icon_default:', //ボットのアイコン
      );
      break;
  }
  sleep(3);  // 3秒遅延させる
  send_to_slack($message); //処理を実行

}elseif(strpos($text,'down') !== false){    //温度を下げる処理
  //温度下げる
  //fopen関数を使い、"temp.txt"ファイルを読み込みモードで取得
  $fp = fopen("temp.txt", "r");
  //temp.txtの中身を$tempに代入
  $temp = fgets($fp);

  //temp(エアコンの温度)の値によって分岐
  switch ($temp) {
    case '21':
      //読み込みモード終了
      fclose($fp);
      //fopen関数を使い,temp.txtを書き込みモードで取得
      $fp = fopen("temp.txt", "w");
      //fwrite("書き込み上書きするファイル","書き込み値")
      fwrite($fp, "20");
      //書き込みモード終了
      fclose($fp);
      // 20度のリモコンの赤外線データを実行
      exec('python3 irrp.py -p -g17 -f air temp:20');
      //メッセージの内容を定義
      $message = array(
        'username' => 'airbo',    //Slackbotの名前
        'text' => '20度にさげぽよ👇', //送信するテキスト
        'icon_emoji' => ':icon_default:', //ボットのアイコン
      );
      break;
    case '22':
      //読み込みモード終了
      fclose($fp);
      //fopen関数を使い,temp.txtを書き込みモードで取得
      $fp = fopen("temp.txt", "w");
      //fwrite("書き込み上書きするファイル","書き込み値")
      fwrite($fp, "21");
      //書き込みモード終了
      fclose($fp);
      // 21度のリモコンの赤外線データを実行
      exec('python3 irrp.py -p -g17 -f air temp:21');
      //メッセージの内容を定義
      $message = array(
        'username' => 'airbo',    //Slackbotの名前
        'text' => '21度にさげぽよ👇', //送信するテキスト
        'icon_emoji' => ':icon_default:', //ボットのアイコン
      );
      break;
    case '23':
      //読み込みモード終了
      fclose($fp);
      //fopen関数を使い,temp.txtを書き込みモードで取得
      $fp = fopen("temp.txt", "w");
      //fwrite("書き込み上書きするファイル","書き込み値")
      fwrite($fp, "22");
      //書き込みモード終了
      fclose($fp);
      // 22度のリモコンの赤外線データを実行
      exec('python3 irrp.py -p -g17 -f air temp:22');
      //メッセージの内容を定義
      $message = array(
        'username' => 'airbo',    //Slackbotの名前
        'text' => '22度にさげぽよ👇', //送信するテキスト
        'icon_emoji' => ':icon_default:', //ボットのアイコン
      );
      break;
    case '24':
      //読み込みモード終了
      fclose($fp);
      //fopen関数を使い,temp.txtを書き込みモードで取得
      $fp = fopen("temp.txt", "w");
      //fwrite("書き込み上書きするファイル","書き込み値")
      fwrite($fp, "23");
      //書き込みモード終了
      fclose($fp);
      // 23度のリモコンの赤外線データを実行
      exec('python3 irrp.py -p -g17 -f air temp:23');
      //メッセージの内容を定義
      $message = array(
        'username' => 'airbo',    //Slackbotの名前
        'text' => '23度にさげぽよ👇', //送信するテキスト
        'icon_emoji' => ':icon_default:', //ボットのアイコン
      );
      break;
    case '25':
      //読み込みモード終了
      fclose($fp);
      //fopen関数を使い,temp.txtを書き込みモードで取得
      $fp = fopen("temp.txt", "w");
      //fwrite("書き込み上書きするファイル","書き込み値")
      fwrite($fp, "24");
      //書き込みモード終了
      fclose($fp);
      // 24度のリモコンの赤外線データを実行
      exec('python3 irrp.py -p -g17 -f air temp:24');
      //メッセージの内容を定義
      $message = array(
        'username' => 'airbo',    //Slackbotの名前
        'text' => '24度にさげぽよ👇', //送信するテキスト
        'icon_emoji' => ':icon_default:', //ボットのアイコン
      );
      break;
    case '26':
      //読み込みモード終了
      fclose($fp);
      //fopen関数を使い,temp.txtを書き込みモードで取得
      $fp = fopen("temp.txt", "w");
      //fwrite("書き込み上書きするファイル","書き込み値")
      fwrite($fp, "25");
      //書き込みモード終了
      fclose($fp);
      // 25度のリモコンの赤外線データを実行
      exec('python3 irrp.py -p -g17 -f air temp:25');
      //メッセージの内容を定義
      $message = array(
        'username' => 'airbo',    //Slackbotの名前
        'text' => '25度にさげぽよ👇', //送信するテキスト
        'icon_emoji' => ':icon_default:', //ボットのアイコン
      );
      break;
    case '27':
      //読み込みモード終了
      fclose($fp);
      //fopen関数を使い,temp.txtを書き込みモードで取得
      $fp = fopen("temp.txt", "w");
      //fwrite("書き込み上書きするファイル","書き込み値")
      fwrite($fp, "26");
      //書き込みモード終了
      fclose($fp);
      // 26度のリモコンの赤外線データを実行
      exec('python3 irrp.py -p -g17 -f air temp:26');
      //メッセージの内容を定義
      $message = array(
        'username' => 'airbo',    //Slackbotの名前
        'text' => '26度にさげぽよ👇', //送信するテキスト
        'icon_emoji' => ':icon_default:', //ボットのアイコン
      );
      break;
    case '28':
      //読み込みモード終了
      fclose($fp);
      //fopen関数を使い,temp.txtを書き込みモードで取得
      $fp = fopen("temp.txt", "w");
      //fwrite("書き込み上書きするファイル","書き込み値")
      fwrite($fp, "27");
      //書き込みモード終了
      fclose($fp);
      // 27度のリモコンの赤外線データを実行
      exec('python3 irrp.py -p -g17 -f air temp:27');
      //メッセージの内容を定義
      $message = array(
        'username' => 'airbo',    //Slackbotの名前
        'text' => '27度にさげぽよ👇', //送信するテキスト
        'icon_emoji' => ':icon_default:', //ボットのアイコン
      );
      break;
    case '29':
      //読み込みモード終了
      fclose($fp);
      //fopen関数を使い,temp.txtを書き込みモードで取得
      $fp = fopen("temp.txt", "w");
      //fwrite("書き込み上書きするファイル","書き込み値")
      fwrite($fp, "28");
      //書き込みモード終了
      fclose($fp);
      // 28度のリモコンの赤外線データを実行
      exec('python3 irrp.py -p -g17 -f air temp:28');
      //メッセージの内容を定義
      $message = array(
        'username' => 'airbo',    //Slackbotの名前
        'text' => '28度にさげぽよ👇', //送信するテキスト
        'icon_emoji' => ':icon_default:', //ボットのアイコン
      );
      break;
    case '30':
      //読み込みモード終了
      fclose($fp);
      //fopen関数を使い,temp.txtを書き込みモードで取得
      $fp = fopen("temp.txt", "w");
      //fwrite("書き込み上書きするファイル","書き込み値")
      fwrite($fp, "29");
      //書き込みモード終了
      fclose($fp);
      // 29度のリモコンの赤外線データを実行
      exec('python3 irrp.py -p -g17 -f air temp:29');
      //メッセージの内容を定義
      $message = array(
        'username' => 'airbo',    //Slackbotの名前
        'text' => '29度にさげぽよ👇', //送信するテキスト
        'icon_emoji' => ':icon_default:', //ボットのアイコン
      );
      break;

    default:
      fclose($fp);
      $message = array(
        'username' => 'airbo',
        'text' => 'もうこれ以上温度は下げれないよ😥',
        'icon_emoji' => ':icon_default:', //ボットのアイコン
      );
      break;
  }
  sleep(3);  // 3秒遅延させる
  send_to_slack($message); //処理を実行

}else{
  echo '{"エラー😆"}';
}

?>

