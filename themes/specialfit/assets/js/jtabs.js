(function($){
    $.fn.jtabs=function(opt){
        var o={
            auto: false,
            action: 'click',
            width:'100px',
            color:'#f00f00'            
        };
        if(opt){
            $.extend(true, o,opt);
        }
        return this.each(function(){
            var $this=$(this);
            var $pans=$this.children('div').css('display','none');
            var $tabs=$this.children('ul').children('li');
            $($tabs).hover(function(){ $(this).addClass('act')},function(){ $(this).removeClass('act')});
            $tabs.first().addClass('active');
            $pans.first().css('display','block');
            $tabs.bind(o.action,function(e){
                e.preventDefault();
                var i=$.inArray(this, $tabs);
                $(this).addClass('active').siblings().removeClass('active');
                $pans.eq(i).css('display','block').siblings('div').css('display','none');
            });
        });
    };
})(jQuery); 