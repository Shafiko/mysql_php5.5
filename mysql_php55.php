<?php

//replacing the mysql_connect function if not exists.
//use a global variable for connection
if (!function_exists("mysql_connect")) {

    function mysql_connect($server, $username, $password) {
        // just save the parameters to use it later
        $GLOBALS["connecttodbvars"] = array("server" => $server, "username" => $username, "password" => $password);
        $GLOBALS["con"] = null;
        return $GLOBALS["con"];
    }

}

//replacing the mysql_select_db function if not exists.
//use a global variable for connection
if (!function_exists("mysql_select_db")) {

    function mysql_select_db($database_name, $info) {
        $info = $GLOBALS["connecttodbvars"];
        $con = mysqli_connect($info["server"], $info["username"], $info["password"], $database_name);
        // Check connection
        if (mysqli_connect_errno()) {
            return FALSE;
        }
        $GLOBALS["con"] = $con;
        unset($GLOBALS["connecttodbvars"]);
        return true;
    }

}


if (!function_exists("mysql_query")) {

    function mysql_query($query) {
        $con = $GLOBALS["con"];
        $result = mysqli_query($con, $query);
        return $result;
    }

}
// mysql_fetch_array
// mysql_fetch_row
// mysql_fetch_assoc

if (!function_exists("mysql_fetch_array")) {

    function mysql_fetch_array(&$result) {
        $ar = mysqli_fetch_array($result);
        return $ar;
    }

}

if (!function_exists("mysql_fetch_row")) {

    function mysql_fetch_row(&$result) {
        $ar = mysqli_fetch_row($result);
        return $ar;
    }

}

if (!function_exists("mysql_fetch_assoc")) {

    function mysql_fetch_assoc(&$result) {
        $ar = mysqli_fetch_assoc($result);
        return $ar;
    }

}

//mysql_affected_rows()
if (!function_exists("mysql_affected_rows")) {

    function mysql_affected_rows(&$con = NULL) {
        if ($con == NULL) {
            $con = $GLOBALS["con"];
        }
        $ar = mysqli_affected_rows($con);
        return $ar;
    }

}

//mysql_set_charset($charset)
if (!function_exists("mysql_set_charset")) {

    function mysql_set_charset($charset, &$con = NULL) {
        if ($con == NULL) {
            $con = $GLOBALS["con"];
        }
        $ar = mysqli_set_charset($con, $charset);
        return $ar;
    }

}

//mysql_stat()
if (!function_exists("mysql_stat")) {

    function mysql_stat(&$con = NULL) {
        if ($con == NULL) {
            $con = $GLOBALS["con"];
        }
        $ar = mysqli_stat($con);
        return $ar;
    }

}



//mysql_close($link_identifier)
//mysqli_close($link);
if (!function_exists("mysql_close")) {

    function mysql_close(&$con = NULL) {
        if ($con == NULL) {
            $con = $GLOBALS["con"];
        }
        $ar = mysqli_close($con);
        return $ar;
    }

}

//mysql_errno($link_identifier)
if (!function_exists("mysql_errno")) {

    function mysql_errno(&$con = NULL) {
        if ($con == NULL) {
            $con = $GLOBALS["con"];
        }
        $ar = mysqli_errno($con);
        return $ar;
    }

}

//mysql_error($link_identifier)
if (!function_exists("mysql_error")) {

    function mysql_error(&$con = NULL) {
        if ($con == NULL)
            $con = $GLOBALS["con"];
        $ar = mysqli_error($con);
        return $ar;
    }

}

//mysql_insert_id($link_identifier)
if (!function_exists("mysql_insert_id")) {

    function mysql_insert_id(&$con = NULL) {
        if ($con == NULL)
            $con = $GLOBALS["con"];
        $ar = mysqli_insert_id($con);
        return $ar;
    }

}

//mysql_num_rows($result)

if (!function_exists("mysql_num_rows")) {

    function mysql_num_rows(&$con = NULL) {
        if ($con == NULL)
            $con = $GLOBALS["con"];
        $ar = mysqli_num_rows($con);
        return $ar;
    }

}

//mysql_numrows($result)
if (!function_exists("mysql_numrows")) {

    function mysql_numrows(&$con = NULL) {
        if ($con == NULL)
            $con = $GLOBALS["con"];
        $ar = mysqli_num_rows($con);
        return $ar;
    }

}

//mysql_real_escape_string($unescaped_string, $link_identifier)
if (!function_exists("mysql_real_escape_string")) {

    function mysql_real_escape_string($string) {
        $ar = mysqli_real_escape_string($string);
        return $ar;
    }

}
