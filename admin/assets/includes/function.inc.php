<?php
    function get_url_admin() {
        return str_replace("//", "/", "http:///" . HOST . "/" . BASE . "/admin");
    }