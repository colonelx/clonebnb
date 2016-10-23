var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');

gulp.task('default', function() {
    gulp.start(['css']);
});

gulp.task('css', function() {
    gulp.src('sass/**/*.scss')
        .pipe(sass(
            {includePaths: ['./node_modules/foundation-sites/scss']}
        ).on('error', sass.logError))
        .pipe(gulp.dest('./css/'));
});

gulp.task('watch',function() {
    gulp.watch('sass/**/*.scss',['default']);
});