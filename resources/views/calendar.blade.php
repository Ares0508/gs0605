<div id='calendar-container'>
    <div id='calendar'></div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/fullcalendar.min.js')}}"></script>
<script src="{{asset('js/lang-all.js')}}"></script>
<script id="rendered-js">
$(function () {// document ready
var events = '<?php echo json_encode($appoints) ?>';
if(!events) {
    events = []
} else {
    events = JSON.parse(events);
}

  var calendar = $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'agendaWeek,agendaDay' },

    defaultView: 'agendaWeek',
    defaultTimedEventDuration: '01:00',
    allDaySlot: false,
    scrollTime: '08:00',
    businessHours: {
      start: '9:00',
      end: '18:00' },

    lang: /^en-/.test(navigator.language) ? 'en' : 'jp',
    eventOverlap: function (stillEvent, movingEvent) {
      return true;
    },
    events: events,

    editable: true,
    selectable: true,
    selectHelper: true,
    select: function (start, end) {

        var duration = (end - start) / 1000;
        if (duration == 1800) {
            // set default duration to 1 hr.
            end = start.add(30, 'mins');
            return calendar.fullCalendar('select', start, end);
        }
        var title = prompt('Event Title:');
        var eventData;
        if (title && title.trim()) {
            eventData = {
            title: title,
            start: start,
            end: end };

            calendar.fullCalendar('renderEvent', eventData);
        }
        calendar.fullCalendar('unselect');
    },
    eventRender: function (event, element) {
      var start = moment(event.start).fromNow();

      element.attr('title', start);
    },
    eventClick: function(calEvent, jsEvent, view) {
        $('#to_zipcode').val(calEvent.postal_code ? calEvent.postal_code : calEvent.title);
    },
    loading: function () {

    } });


});
//# sourceURL=pen.js
    </script>
