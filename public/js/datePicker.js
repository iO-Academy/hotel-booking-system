/**
 * sets date format, grabs data and put data into input
 */
$(function () {
    var dateFormat = "dd/mm/yy",
        from = $("#from")
            .datepicker({
                dateFormat: 'dd/mm/yy',
                defaultDate: "0",
                changeMonth: true,
                changeYear: true,
                numberOfMonths: 1
            })
            .on("change", function () {
                to.datepicker("option", "minDate", getDate(this));
            }),
        to = $("#to").datepicker({
            dateFormat: 'dd/mm/yy',
            defaultDate: "0",
            changeMonth: true,
            changeYear: true,
            numberOfMonths: 1
        })
            .on("change", function () {
                from.datepicker("option", "maxDate", getDate(this));
            });

    /**
     * get proper date format
     */
    function getDate(element) {
        var date;
        try {
            date = $.datepicker.parseDate(dateFormat, element.value);
        } catch (error) {
            date = null;
        }

        return date;
    }

    from.datepicker("option", "minDate", new Date());
    to.datepicker("option", "minDate", new Date());
});