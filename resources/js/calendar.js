
const now = () => moment().format('Y-MM-DD HH:mm:ss');
const format = (v = undefined) => moment(v).format('DD/MM HH:mm');
const date = (v = undefined) => moment(v);

const url = (link) => `${link}`;

const template = (e) => (`
    <div class="fc-popover click">

        <div class="fc-header">
            ${e.title}
            <button type="button" class="cl">
                <i class="font-icon-close-2"></i>
            </button>
        </div>

        <div class="fc-body main-screen">
        
            `+ ( date(e.start) < date() && date(e.end) < date() ? `<div class="label label-danger">Encerrado</div>` : '' ) +`

            <p class="color-blue-grey">Início: ${format(e.start)}<br>Encerramento: ${format(e.end)}</p>
            <p class="color-black">${e.title}<br>`+ ( e.description ? `<small class="text-truncate">${e.description} </small>` : '' ) +`</p>

            <p class="">
                `+ ( e.location ? `<small>${e.location}</small>` : '' ) +`
                <br>
                `+ ( e.website ? `<small><a target="_blank" href="${e.website}">Website</a></small>` : '' ) +`
            </p>

            <ul class="actions">
                <li>
                    <a target="_blank" href="${url(`/events/${e.id}`)}" class="btn btn-inline btn-primary">Detalhes</a>
                    `+ ( _user_id == e.created_by ? `<a href="${url(`/events/${e.id}/edit`)}" class="btn btn-inline btn-primary">Editar</a>` : '' ) +`
                </li>
            </ul>

        </div>

    </div>
`);

$(document).ready(function() {

    let defaultDate = now();

    /* ==========================================================================
        Fullcalendar
        ========================================================================== */

    $('#calendar').fullCalendar({
        header: {
            left: 'prev, title, next',
            center: '',
            right: 'today, agendaDay, agendaWeek, month'
        },
        buttonIcons: {
            prev: 'font-icon font-icon-arrow-left',
            next: 'font-icon font-icon-arrow-right',
            prevYear: 'font-icon font-icon-arrow-left',
            nextYear: 'font-icon font-icon-arrow-right'
        },
        buttonText: {
            today: 'Hoje',
            agendaDay: 'Dia',
            agendaWeek: 'Semana',
            month: 'Mês'
        },
        defaultDate: defaultDate,
        editable: false,
        locale: 'pt-br',
        selectable: true,
        eventLimit: true, // allow "more" link when too many events
        events: _events,
        viewRender: function(view, element) {

            $('.fc-popover.click').remove();
        },
        eventClick: function(o, e, v) {

            var c = $(this);

            // Add and remove event border class
            if (!$(this).hasClass('event-clicked')) {
                $('.fc-event').removeClass('event-clicked');
                $(this).addClass('event-clicked');
            }

            // Add popover
            $('body').append(template(o));

            // Position popover
            function posPopover() {
                $('.fc-popover.click').css({
                    left: c.offset().left + c.outerWidth()/2,
                    top: c.offset().top + c.outerHeight()
                });
            }

            posPopover();

            $('.fc-scroller, .calendar-page-content, body').scroll(function() { posPopover(); });

            $(window).resize(function() { posPopover(); });

            // Remove old popover
            if ($('.fc-popover.click').length > 1) {
                for (var i = 0; i < ($('.fc-popover.click').length - 1); i++) {
                    $('.fc-popover.click').eq(i).remove();
                }
            }

            // Close buttons
            $('.fc-popover.click .cl, .fc-popover.click .remove-popover').click(function(){
                $('.fc-popover.click').remove();
                $('.fc-event').removeClass('event-clicked');
            });

        }
    });

});
    
/* ==========================================================================
    Calendar page grid
    ========================================================================== */

(function($, viewport){
    $(document).ready(function() {

        if(viewport.is('>=lg')) {
            $('.calendar-page-content, .calendar-page-side').matchHeight();
        }

        // Execute code each time window size changes
        $(window).resize(
            viewport.changed(function() {
                if(viewport.is('<lg')) {
                    $('.calendar-page-content, .calendar-page-side').matchHeight({ remove: true });
                }
            })
        );
    });
})(jQuery, ResponsiveBootstrapToolkit);