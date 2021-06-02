
function addEvent(calendar,info){
    //addEvent()を使うためにfullcalendar.jsで定義したcalendarを引数で受け取る

    var title = "サンプルイベント";
    //ホントはjsでformのvalue取得とかするんだと思いますが、説明を簡潔にするために割愛します。
    $.ajax({
        url: '/ajax/addEvent',
        type: 'POST',
        dataTape: 'json',
        data:{
            "title":title,
            "start":info.startStr,
            "end":info.endStr
            //日程取得
        }
    }).done(function(result) {
        calendar.addEvent({
            id:result['id'],
            //php側から受け取ったevent_idをeventObjectのidにセット
            title:title,
            start: info.startStr,
            end: info.endStr
        });
        //ajaxに成功したらフロント側にeventを追加で表示
    });
}

function editEventDate(info){
    var id = info.event.id;
    var start = formatDate(info.event.start);
    var end = formatDate(info.event.end);

    $.ajax({
        url: '/ajax/editEventDate',
        type: 'POST',
        data:{
            "id":id,
            "newStart":start,
            "newEnd":end
            //ドロップしたあとの日付をphp側に渡す
        }
    })
}

