$(function() {
    marked.setOptions({
        langPrefix: ''
    });

        $('#result').html(marked($('#editor').val()));
        $('pre code').each(function(i, block) {
            hljs.highlightBlock(block);
        });
    
    $('#editor').keyup(function() {
        var src = $(this).val();
        
        var html = marked(src);
        
        $('#result').html(html);
        
        $('pre code').each(function(i, block) {
            hljs.highlightBlock(block);
        });
    });
});
