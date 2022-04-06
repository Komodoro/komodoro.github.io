---
layout: post
title:  "Jekyll Cheat Sheet!"
date:   2021-09-22 22:30:00 +0100
categories: jekyll
---

# Jekyll Commands

Jekyll is a simple, blog-aware, static site generator.
Resources

    Jekyll official site (https://jekyllrb.com/)
    Build A Blog With Jekyll And GitHub Pages (https://www.smashingmagazine.com/2014/08/build-blog-jekyll-github-pages/)

Requirements

Install Ruby on your machine.
Installing Jekyll

$ gem install jekyll
Quickstart:

$ jekyll new my-site
$ cd my-site
$ jekyll build
$ jekyll serve    # => Browse your site @ http://localhost:4000

Setting up your GitHub Pages site locally with Jekyll

Install Bundler:

$ gem install bundler

Specify your dependencies in a Gemfile in your project's root:

source 'https://rubygems.org'

gem 'github-pages'

Install all of the required gems from your specified sources:

$ bundle install

Other Bundler commands

$ bundle install --without [<group name> [<group name ...]] - install dependencies without specified group in a Gemfile

$ bundle clean - delete outdated dependencies plus which are not in Gemfile

$ bundle clean --force - force to delete dependencies
Jekyll basic usage with Bundler

Build site using default _config.yml file:

$ bundle exec jekyll clean or $ rm -rf _site- Deletes Jekyll generated old ./_site cache folder

$ bundle exec jekyll build - Build site will be generated into ./_site

$ JEKYLL_ENV=production bundle exec jekyll build - Build site as production, default is development

$ bundle exec jekyll build --watch - Build site into ./_site and for watch changes

$ bundle exec jekyll serve - Serve site at http://localhost:4000

Override config (_config_dev.yml) for local development test:

$ bundle exec jekyll build --config _config.yml,_config_dev.yml - Build site

$ bundle exec jekyll build --config _config.yml,_config_dev.yml --watch - Build site and watch changes

$ bundle exec jekyll serve --config _config.yml,_config_dev.yml - Serve site at http://localhost:4000

$ JEKYLL_GITHUB_TOKEN=abc123def456 [bundle exec] jekyll serve - Serve site authenticating GitHub for github-metadata

You’ll find this post in your `_posts` directory. Go ahead and edit it and re-build the site to see your changes. You can rebuild the site in many different ways, but the most common way is to run `jekyll serve`, which launches a web server and auto-regenerates your site when a file is updated.

Jekyll requires blog post files to be named according to the following format:

`YEAR-MONTH-DAY-title.MARKUP`

Where `YEAR` is a four-digit number, `MONTH` and `DAY` are both two-digit numbers, and `MARKUP` is the file extension representing the format used in the file. After that, include the necessary front matter. Take a look at the source for this post to get an idea about how it works.

Jekyll also offers powerful support for code snippets:

{% highlight ruby %}
def print_hi(name)
  puts "Hi, #{name}"
end
print_hi('Tom')
#=> prints 'Hi, Tom' to STDOUT.
{% endhighlight %}

Check out the [Jekyll docs][jekyll-docs] for more info on how to get the most out of Jekyll. File all bugs/feature requests at [Jekyll’s GitHub repo][jekyll-gh]. If you have questions, you can ask them on [Jekyll Talk][jekyll-talk].

[jekyll-docs]: https://jekyllrb.com/docs/home
[jekyll-gh]:   https://github.com/jekyll/jekyll
[jekyll-talk]: https://talk.jekyllrb.com/
