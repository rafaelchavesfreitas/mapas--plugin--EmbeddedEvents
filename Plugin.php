<?php
namespace EmbeddedEvents;

use MapasCulturais\App;

class Plugin extends \MapasCulturais\Plugin {
    public function _init() {
        $app = App::i();
        
        
        $app->hook('GET(site.search):before', function() use($app){
            $embedded = isset($this->data['embedded'] );
            if($embedded){
                $app->view->enqueueScript('app', 'embedded-events', 'js/embedded-events.js');
            }
        });
        
        $app->hook('GET(site.embedded-events)', function() use ($app){
            $url = $app->view->getSearchEventsUrl();
            
            $url = str_replace('##', '?embedded##', $url);
            $url = str_replace('filterEntity:event', 'filterEntity:event,viewMode:list', $url);
            
            $app->redirect($url);
        });
    }
    public function register() { }
}