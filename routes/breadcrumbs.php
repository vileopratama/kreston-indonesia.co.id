<?php
// Home
Breadcrumbs::register('home', function($breadcrumbs) {
    $breadcrumbs->push(Lang::get("action.home"), url('/'));
});