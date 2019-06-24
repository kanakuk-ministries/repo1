# Kanakuk.com Wordpress

## Development Installation

Development of this site is performed with https://local.getflywheel.com/

Your dir structure will look like this:

    /home/{user}/Local Sites/kanakuk/
      app -> kanakuk.com/    # symlink from app to kanakuk.com dir
      kanakuk.com/           # the repo & files are here
        README.md
        config/              # this dir contains environment files
        public/              # this dir contains the site files / wordpress installation
          wp-config.php      # symlink to ../config/{environment}.php
        sql/
      logs/

After setting up flywheel and downloading this repo,

    # create uploads directory
    mkdir public/wp-content/uploads

    # symlink the config file
    cd public && ln -s ../config/local.php wp-config.php

## Front End Styles - Development

- All style changes should be made in app/public/wp-content/themes/joints/assets/styles/scss.
- For more information on the SCSS files structure, see [http://jointswp.com/docs/getting-started-sass/].

#### For live reload with .scss changes

- With Local website running on `http://kanakuk.local/`
- Run `cd app/public/wp-content/themes/joints && npm run browsersync`. A new browser pointed at `localhost:3002` should open with the site running.

#### Extracting CSS for isolated header and footer
```bash
$ cd header_footer
$ npm install
$ gulp css
```
