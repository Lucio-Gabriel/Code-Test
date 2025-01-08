<?php

test('the route is using view books')
    ->get('/book')
    ->assertOk()
    ->assertViewHas('books');

test('the route is passsing a list of books to view books')
    ->get('/book')
    ->assertOk()
    ->assertViewIs('books')
    ->assertViewHas('books');
