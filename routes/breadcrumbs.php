<?php // routes/breadcrumbs.php

use App\Models\Article;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('dashboard.index', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});

// Portofolio
Breadcrumbs::for('portofolio.index', function (BreadcrumbTrail $trail) {
    $trail->push('Portofolio', route('portofolio.index'));
});

Breadcrumbs::for('portofolio.create', function ($trail) {
    $trail->push('Portofolio', route('portofolio.index'));
    $trail->push('Add New Portofolio', route('portofolio.create'));
});

Breadcrumbs::for('portofolio.show', function ($trail) {
    $portofolioId = app('request')->route()->parameter('article');

    if ($portofolioId) {
        $article = Article::find($portofolioId);

        if ($article) {
            $trail->push('Portofolio', route('portofolio.index'));
            $trail->push('show : (' . $article->title . ')', route('portofolio.show', $portofolioId));
        }
    }
});

// Articles
Breadcrumbs::for('articles.index', function (BreadcrumbTrail $trail) {
    $trail->push('Articles', route('articles.index'));
});

Breadcrumbs::for('articles.create', function ($trail) {
    $trail->push('Articles', route('articles.index'));
    $trail->push('Add New Article', route('articles.create'));
});

Breadcrumbs::for('articles.edit', function ($trail) {
    $articlesId = app('request')->route()->parameter('article');

    if ($articlesId) {
        $article = Article::find($articlesId);

        if ($article) {
            $trail->push('Articles', route('articles.index'));
            $trail->push('Edit : (' . $article->title . ')', route('articles.edit', $articlesId));
        }
    }
});

Breadcrumbs::for('articles.show', function ($trail) {
    $articlesId = app('request')->route()->parameter('article');

    if ($articlesId) {
        $article = Article::find($articlesId);

        if ($article) {
            $trail->push('Articles', route('articles.index'));
            $trail->push('show : (' . $article->title . ')', route('articles.show', $articlesId));
        }
    }
});

// Categpries
Breadcrumbs::for('categories.index', function (BreadcrumbTrail $trail) {
    $trail->push('categories', route('categories.index'));
});

// config
Breadcrumbs::for('config.index', function (BreadcrumbTrail $trail) {
    $trail->push('configuration', route('config.index'));
});

Breadcrumbs::for('contact-as.index', function (BreadcrumbTrail $trail) {
    $trail->push('contact-as', route('contact-as.index'));
});
