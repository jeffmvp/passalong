//=======================================================================
// VARIABLES
//=======================================================================

var gulp = require('gulp');
var uglify = require('gulp-uglify');
var cleanCSS = require('gulp-clean-css');
var concat = require('gulp-concat');
var sass = require('gulp-sass');
var sassGlob = require('gulp-sass-glob');
var autoprefix = require('gulp-autoprefixer');
var convertEncoding = require('gulp-convert-encoding');
var notify = require('gulp-notify');
var browserSync = require('browser-sync').create();


//=======================================================================
// WATCH
//=======================================================================

gulp.task('watch', function() {
    browserSync.init({
        proxy: "192.168.33.10"
    });

    gulp.watch('assets/src/scripts/_dependencies/*.js', ['jquery', 'browser-sync-reload']);
    gulp.watch(['assets/src/scripts/_vendor/*.js', 'assets/src/scripts/app/*.js', ], ['javascript', 'browser-sync-reload']);
    gulp.watch('assets/src/scripts/analytics/*.js', ['analytics', 'browser-sync-reload']);

    gulp.watch('assets/src/styles/**/*.scss', ['scss']);
});

// DEFAULT
gulp.task('default', ['javascript', 'jquery', 'analytics', 'scss']);



//=======================================================================
// TEMPLATE
//=======================================================================

// JAVASCRIPT
gulp.task('javascript', function() {
    return gulp.src([
            'assets/src/scripts/_vendor/*.js',
            'assets/src/scripts/app/*.js'
        ])
        .pipe(uglify())
        .pipe(concat('app.js'))
        .pipe(convertEncoding({
            to: 'utf8'
        }))
        .pipe(gulp.dest('assets/dist'))
        .pipe(notify({
            message: '[javascript] template -> app.js'
        }));
});

gulp.task('jquery', function() {
    return gulp.src([
            'assets/src/scripts/_dependencies/*.js',
        ])
        .pipe(uglify())
        .pipe(concat('jquery.js'))
        .pipe(convertEncoding({
            to: 'utf8'
        }))
        .pipe(gulp.dest('assets/dist'))
        .pipe(notify({
            message: '[jquery] template -> jquery.js'
        }));
});

gulp.task('analytics', function() {
    return gulp.src('assets/src/scripts/analytics/*.js')
        .pipe(uglify())
        .pipe(concat('analytics.min.js'))
        .pipe(convertEncoding({
            to: 'utf8'
        }))
        .pipe(gulp.dest('assets/dist'))
        .pipe(notify({
            message: '[analytics] template -> analytics.min.js'
        }));
});

// SASS
gulp.task('scss', function() {
    gulp.src('assets/src/styles/styles.scss')
        .pipe(sassGlob())
        .pipe(sass())
        .on('error', function(err) {
            console.log(err.messageFormatted);
        })
        .pipe(autoprefix('last 4 versions', 'ie 9'))
        .pipe(cleanCSS())
        .pipe(gulp.dest('assets/dist'))
        .pipe(browserSync.stream())
        .pipe(notify({
            message: '[scss] template -> styles.css'
        }));

});

gulp.task('browser-sync-reload', function() {
    browserSync.reload();
});