function setPlaceholderText() {
var PLACEHOLDER_SUPPORTED = 'placeholder' in document.createElement('input');
if (PLACEHOLDER_SUPPORTED || !$(':input[placeholder]').length) {
return;
}
 
$(':input[placeholder]').each(function() {
var el = $(this);
var text = el.attr('placeholder');
 
function add_placeholder() {
if (!el.val() || el.val() === text) {
el.val(text).addClass('placeholder_text');
}
}
add_placeholder();
 
el.focus(function() {
if (el.val() === text) {
el.val('').removeClass('placeholder_text');;
}
}).blur(function() {
if (!el.val()) {
el.val(text).addClass('placeholder_text');;
}
});
 
el.closest('form').submit(function() {
if (el.val() === text) {
el.val('');
}
}).bind('reset', function() {
setTimeout(add_placeholder, 50);
});
});
}