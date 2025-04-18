// JavaScript Document
//Datepickerの使用
$(function() {
    // class 'datepicker' を持つすべての要素にDateTimePickerを適用
    $('.datepicker').datetimepicker({
        format:'Y年m月d日 H:i',
        minDate: new Date(),
        step:30,
        lang:'ja',
    });
});
