function setTrigger() {
  //指定した時間後に"Returns"を実行
  ScriptApp.newTrigger("Returns").timeBased().after(120 * 1000).create();
}

//その日のトリガーを削除する関数(消さないと残る)
function deleteTrigger() {
  var triggers = ScriptApp.getProjectTriggers();
  for(var i=0; i < triggers.length; i++) {
    if (triggers[i].getHandlerFunction() == "Returns") {
      ScriptApp.deleteTrigger(triggers[i]);
    }
  }
}
