window.$ = jQuery;
$(()=>{
    window.hljs.initHighlightingOnLoad();
    $('.tex').each(function(i,e){
        var tex = unsanitize(e.innerHTML);
        katex.render(tex, e, {
            displayMode: e.nodeName == 'P'
        });
        e.title=tex;
    });
});
function unsanitize(html) {
    return $('<div />').html(html).text();
}

