import json
import urllib.request
import requests




def lambda_handler(event, context):

    # TODO implement
    weather_info = get_weather()
    post_slack(weather_info)
    return {
        'statusCode': 200,
        'body': json.dumps('正常起動')
    }

def post_slack(weather_info):
    message = "今日の天気は"+weather_info[0]+'です！'+'\n'+"最高気温："+weather_info[1]+'\n'+"最低気温："+weather_info[2]
    if '晴れ' in weather_info[0]:
        weather_icon =":icon_sunny:"
    elif '曇り' in weather_info[0]:
        weather_icon =":icon_cloud:"
    elif '雨' in weather_info[0]:
        weather_icon =":icon_rain:"
    elif '曇' in weather_info[0]:
        weather_icon =":icon_cloud:"
    elif '晴' in weather_info[0]:
        weather_icon =":icon_sunny:"
    else:
        weather_icon =":icon_default:"
    send_data = {
        "username": "Airbo",
        "icon_emoji": weather_icon,
        "text": message,
         }
    send_text = "payload=" + json.dumps(send_data)

    request = urllib.request.Request(
        #Slack Incoming WebhookのURL
        "https://hooks.slack.com/services/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",
        data=send_text.encode('utf-8'),
        method="POST"
    )
    with urllib.request.urlopen(request) as response:
        response_body = response.read().decode('utf-8')


#ここから天気取得API
#天気取得
def get_weather():
    url = 'http://weather.livedoor.com/forecast/webservice/json/v1?'
    query_params = {'city': '400010'}
    data = requests.get(url, params=query_params).json()
    weather = data['forecasts'][0]['telop']
    maxtemp = data['forecasts'][0]['temperature']['max']['celsius']
    mintemp = data['forecasts'][1]['temperature']['min']['celsius']

    # return "今日の天気は"+weather+'\n'+"最高気温は"+maxtemp+"度"+'\n'+"最低気温は"+mintemp+"度"
    return weather,maxtemp,mintemp


#ココマデ天気取得API
