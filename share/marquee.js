(function(){

    $.fn.xdMarquee = function(data, options){
        options = options || {};

        this.tmid    = 0; //timeout id

        this.data    = data;
        this.timeout = options.timeout || 3000;
        this.current = 0; // 1 - length
        this.links   = [];

        //指示器链接
        this.controller = $(this).find('.controller');
        //主体图片
        this.marquee = $(this).find('.marquee');
        this.loading = $(this).find('.loading');

        this.initImages  = initImages;
        this.start       = start;
        this.next        = next;
        this.clear       = clear;
        this.promise     = promise;
        this.animate     = options.animate || animate;
        this.appendImage = appendImage;

        this.hovering = false;
        this.stopping = false;
        this.forceNext = false;

        var the = this;
        $(this).hover(function(){ 
            the.hovering = true; 
        }, function(){ 
            the.hovering = false; 
            if( the.stopping ){
                the.stopping = false;
                the.start(500); 
            }
        });

        this.controller.find('span').live('click', function(){ 
            the.forceNext  = true;
            the.start(0, $(this).index()); 
        });

        this.initImages();
    }
	
    function initImages(){
        var the = this;
        this.marquee.empty();
        this.appendImage(0, function(){
            for(var i=1; i<the.data.length; i++){
                the.appendImage(i);
            }
            the.start();
        });
        for(var i=1; i<=the.data.length; i++){
            this.controller.append("<span>"+ i +"</span>");
        }
        this.controller.children().eq(0).addClass('on');
	}

    function appendImage(index, callback){
        if( typeof callback != "function" ) callback = function(){}

        var data = this.data[index];
        var the = this;

        var img = $('<img>')
                    .attr('alt', data[2])
                    .load(function(){
                        $(this).show();
                        callback();
                    })
                    .attr('src', data[0])
                    .hide();//避免默认图片

        var a = $('<a>')
                    .attr('target', '_blank')
                    .attr('href', data[1])
                    .append(img);


        if( index != 0) a.hide();
        this.marquee.append(a);
        this.links.push(a);
    }
	
	function start( timeout, index ) {
        this.clear();

        this.promise(timeout, index);
	}

    function next(index) {
        if( this.hovering && ! this.forceNext ) {
            this.stopping = true;
            return;
        }
        
        if( this.forceNext ) this.forceNext = false;

        if( index == this.current ) return ;

        index = typeof index != 'undefined' ? index : this.current >= this.links.length-1 ? 0 : this.current + 1;

        this.animate( index );

        this.controller.find('span').eq(this.current).removeClass('on');
        this.controller.find('span').eq(index).addClass('on');

        this.current = index;

        this.promise();
    }

    function animate(index) {
        this.links[this.current].fadeOut(500);
        this.links[index].fadeIn(500);
    }

    function promise( timeout, index ){
        timeout   = timeout>=0 ? timeout : this.timeout;
        var the   = this;
        this.tmid = window.setTimeout(function(){
            the.next(index);
        }, timeout);
    }

    function clear() {
        window.clearTimeout(this.tmid);
    }

})();
