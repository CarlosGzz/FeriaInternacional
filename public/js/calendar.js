$(document).ready(function() {

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,today,next',
                center: 'title',
                right: 'month,listWeek'
            },

            // customize the button names,
            // otherwise they'd all just say "list"
            views: {
                listWeek: {
                    buttonText: 'Semana'
                }
            },

            defaultView: 'month',
            // defaultDate: '2016-09-12',
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: eventos
        });

    });
