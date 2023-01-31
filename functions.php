<?php

function exists($var) {
    if (isset($_POST[$var])) {
        if (!empty($_POST[$var])) {
            return true;
        }
    }
    return false;
}

function sanitize($var) {
    return trim(htmlentities($_POST[$var]));
}

function sanitizeText($var) {
    if (exists($var)) {
        return sanitize($var);
    }
    return null;
}

function sanitizeInt($var) {
    if (exists($var)) {
        return intval(sanitize($var));
    }
    return null;
}

function sanitizeFloat($var) {
    if (exists($var)) {
        return floatval(sanitize($var));
    }
    return null;
}