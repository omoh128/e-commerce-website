const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const del = require('del'); // Import the del package

gulp.task('styles', () => {
    return gulp.src('assets/scss/main.scss') // Update the path to your main.scss file
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('css/')); // Update the destination path if needed
});

gulp.task('clean', () => {
    return del([
        'css/main.css', // Update the path to match the compiled CSS file
    ]);
});

gulp.task('default', gulp.series('clean', 'styles'));
