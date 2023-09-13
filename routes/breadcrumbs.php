<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
// use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.

use App\Models\Blog;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Diglactic\Breadcrumbs\Breadcrumbs;

// Home


breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Dashboard', route('dashboard'));
});

// Home > Blog
Breadcrumbs::for('detail', function (BreadcrumbTrail $trail, Blog $blog) {
    $trail->parent('home');
    $trail->push('Details', route('blogs.detail', $blog));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Category', route('categories.index'));
});