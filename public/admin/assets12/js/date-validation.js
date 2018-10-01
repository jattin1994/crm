$(document).ready(function(){
    /*** Date Validation ***/
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    var add_start = $('.startDate').datepicker({
        format: 'dd/mm/yyyy',
        todayHighlight: 'TRUE',
        autoclose: true,
        onRender: function (date) {
            return date.valueOf() > now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function (ev) {
        if (ev.date.valueOf() < add_end.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate());
            add_end.setValue(newDate);
            add_start.hide();
        }
        add_start.hide();
        $('.endDate')[0].focus();
    }).data('datepicker');
    var add_end = $('.endDate').datepicker({
        format: 'dd/mm/yyyy',
        todayHighlight: 'TRUE',
        autoclose: true,
        onRender: function (date) {
            return date.valueOf() > now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function (ev) {
        add_end.hide();
    }).data('datepicker');
});