
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
        plugins: [ 'resourceTimeGrid' ],
        header: {
            left: 'prev,next today promptResource',
            center: 'title',
            right: 'resourceTimeGridDay,resourceTimeGridWeek'
        },
        customButtons: {
          promptResource: {
            text: '便を追加',
            click: function() {
              var title = prompt('便名');
              if (title) {
                calendar.addResource({
                  title: title
                });
              }
            }
          }
        },
        locale: 'ja',
        timeZone: 'Asia/Tokyo',
        eventTimeFormat: { hour: 'numeric', minute: '2-digit' },
        defaultView: 'resourceTimeGridDay',
        firstDay : 1, //秋の始まりを設定。1→月曜日。defaultは0(日曜日)
        eventDurationEditable : false, //イベントの期間変更
        defaultTimedEventDuration: '01:00',
        slotDuration: '00:20:00',
        slotLabelInterval: '2:00',
        minTime : '10:00',
        maxTime : '20:00',
        locale : 'jaLocale',
        editable: true,
        eventResourceEditable: true,
        selectable: true,
        allDaySlot: false,
        selectLongPressDelay:0, // スマホでタップしたとき即反応
        nowIndicator: true,
        resources: [
            { id: '1', title: '1便', eventColor: '#FFD1B3' },
            { id: '2', title: '2便', eventColor: '#CCE0E6' },
            { id: '3', title: '3便', eventColor: '#CCE6D2' },
            { id: '4', title: '4便', eventColor: '#D2CCE6' }
        ],
        events: "/setEvents",
        eventDrop: function(info){
        //eventをドラッグしたときの処理
             editEventDate(info);
        },
        dateClick: function(info) {
        //日付をクリックしたときの処理
            addEvent(calendar,info);
        },
    });
    calendar.render();
});
