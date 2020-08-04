<?php

function setActive($marcador){
    return request()->routeIs($marcador) ? "active" : "";
}

?>