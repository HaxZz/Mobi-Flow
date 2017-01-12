<?php

/**
 * Created by IntelliJ IDEA.
 * User: pierre
 * Date: 11/01/17
 * Time: 16:06
 */
require_once "../route/Route.php";
require_once ""

class JSONConverter
{

    public function RequestToJSON(Request $request) {
        return $request->toJSON();
    }

    public function JSONToRoute($json) {

    }


    public static function toJSON(Route $route) {
        $json = "{\"begining\":{ \"longitude\":".$route->beginning->position->longitude.", \"latitude\":".$route->beginning->position->latitude."},
                {\"ending\":{ \"longitude\":".$route->ending->position->longitude.", \"latitude\":".$route->beginning->position->longitude."},
                {\"time\":".date("d/m/Y-HH:ii")."}}";
        return $json;
    }

    public static function JSONtoRoute($json){
        $tab = json_decode($json);
        $route = new Route();
    }
}
