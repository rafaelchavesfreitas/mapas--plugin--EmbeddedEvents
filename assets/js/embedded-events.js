$(function(){
    function removeElements(){
        var selectors = [
            '#endereco',
            '#filter-events',
            '#header-nav-row',
            '.leaflet-draw-draw-circle',
        ];
        
        $(selectors.join(',')).remove();
        
        $('#main-header').css('border-top', '0');
        $('#main-section').css('margin-top', 48);
        $('#search-map-container').css('top', 48);
        $(window).scrollTop(48);
    }
    
    var i = 0;
    var interval = setTimeout(function() {
        i++;
        if(i >= 100){
            clearInterval(interval);
        }
        
        removeElements();
    }, 10);
    
    removeElements();
    
});