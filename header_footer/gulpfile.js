const gulp = require('gulp')
const purgecss = require('gulp-purgecss')
const cleanCSS = require('gulp-clean-css')

gulp.task('css', () => {
  return gulp
    .src('../public/wp-content/themes/joints/assets/styles/style.css')
    .pipe(
      purgecss({
        content: ['header.html', 'footer.html']
      })
    )
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest('dist/'))
})