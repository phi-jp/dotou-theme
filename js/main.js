jQuery(function(){
    jQuery(".admin-list .btn").click(function(){
        var text = jQuery(this).next("a").text();
        var url = jQuery(this).next("a").attr("href");
        copyToClipBoard(text+", "+url);
        return false;
    });
    function copyToClipBoard(text){
        jQuery("textarea").remove();
        var textarea = jQuery('<textarea rows="4" cols="4" />');
        textarea.text(text);
        jQuery(".language-list").append(textarea);
        textarea.select();
        document.execCommand("copy");
        // textarea.remove();
        console.log(text);
    }
});
