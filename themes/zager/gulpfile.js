// Defining requirements
var gulp = require('gulp');
var plumber = require('gulp-plumber');
var sass = require('gulp-sass');
var babel = require('gulp-babel');
var postcss = require('gulp-postcss');
var purgecss = require('gulp-purgecss')
var purgecssWordpress = require('purgecss-with-wordpress')
var rename = require('gulp-rename');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var sourcemaps = require('gulp-sourcemaps');
var browserSync = require('browser-sync').create();
var del = require('del');
var cleanCSS = require('gulp-clean-css');
var autoprefixer = require('autoprefixer');
var split = require('gulp-split-media-queries');
var sassGlob = require('gulp-sass-glob');
var sassLint = require('gulp-sass-lint');
var notify = require( 'gulp-notify' );

// Configuration file to keep your code DRY
var cfg = require('./gulpconfig.json');
var paths = cfg.paths;

// Add clases which will not be purged by runing the gulp purgecss command. Learn More: https://purgecss.com/safelisting.html
// Adding a class (as a string) to this list will also skip all children classes.
var class_safelist = [
	/^fa-(.*)?$/, // Keep Font Awesome icons
	/^fab-(.*)?$/, // Keep Font Awesome Brand icons
	/^fad-(.*)?$/, // Keep Font Awesome Duotone icons
	/^fal-(.*)?$/, // Keep Font Awesome Light icons
	/^far-(.*)?$/, // Keep Font Awesome Regular icons
	/^fas-(.*)?$/, // Keep Font Awesome Solid icons
];

/**
 * Compiles .scss to .css files.
 *
 * Run: gulp sass
 */
gulp.task('sass', function () {

	var stream = gulp.src([
			paths.dev + '/scss/*.scss',
		])
		.pipe(sassGlob())
		.pipe(
			plumber({
				errorHandler(err) {
					console.log(err);
					this.emit('end');
				},
			})
		)
		.pipe(sourcemaps.init({ loadMaps: true }))
		.pipe(sass({ errLogToConsole: true }))
		.pipe(postcss([autoprefixer()]))
		.pipe(sourcemaps.write(undefined, { sourceRoot: null }))
		.pipe(gulp.dest(paths.css));
    return stream;
});

/**
 * Compiles .scss to .css files.
 *
 * Run: gulp sass
 */
gulp.task('purgecss', function () {

	// Add custom classes to a list of WordPress specific classes.
	class_safelist = class_safelist.concat(purgecssWordpress.safelist)

	return gulp
		.src([
			paths.css + '/custom-editor-styles.css',
			paths.css + '/theme.css',
			paths.css + '/theme-desktop.css',
			paths.css + '/theme-tablet.css',
		])
		.pipe(purgecss({
			content: ['**/*.php'],
			safelist: {
				standard: class_safelist
			}
        }))
		.pipe(
			sourcemaps.init({
				loadMaps: true,
			})
		)
		.pipe(
			cleanCSS({
				compatibility: '*',
			})
		)
		.pipe(
			plumber({
				errorHandler(err) {
					console.log(err);
					this.emit('end');
				},
			})
		)
		.pipe(rename({ suffix: '.min' }))
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest(paths.css));
});

/**
 * Minifies css files.
 *
 * Run: gulp minifycss
 */
gulp.task('minifycss', function () {
	return gulp
		.src([
			paths.css + '/custom-editor-styles.css',
			paths.css + '/theme.css',
			paths.css + '/theme-desktop.css',
			paths.css + '/theme-tablet.css',
		])
		.pipe(
			sourcemaps.init({
				loadMaps: true,
			})
		)
		.pipe(
			cleanCSS({
				compatibility: '*',
			})
		)
		.pipe(
			plumber({
				errorHandler(err) {
					console.log(err);
					this.emit('end');
				},
			})
		)
		.pipe(rename({ suffix: '.min' }))
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest(paths.css));
});


/**
 * Compiles .scss to .css minifies css files.
 *
 * Run: gulp styles
 */
gulp.task('styles', function (callback) {
	gulp.series('sass', 'buildTablet', 'buildDesktop', 'minifycss')(callback);
});

// Split media queries for tablet / desktop into their own files
gulp.task('buildTablet', function () {
	var stream = gulp.src(paths.css + "/theme.css")
		.pipe(split({
			breakpoint: 768, // default is 768
		}))
		.pipe(rename('theme-tablet.css'))
		.pipe(gulp.dest(paths.css));
	return stream;
});

gulp.task('buildDesktop', function () {
	var stream = gulp.src(paths.css + "/theme-tablet.css")
		.pipe(split({
			breakpoint: 1024, // default is 768
		}))
		//.pipe(gulp.dest(paths.css))
		.pipe(rename('theme-desktop.css'))
		.pipe(gulp.dest(paths.css));
	return stream;
});


/**
 * Watches .scss, .js and image files for changes.
 * On change re-runs corresponding build task.
 *
 * Run: gulp watch
 */
gulp.task('watch', function () {
	gulp.watch(
		[
			paths.scss_src + '/**/*.scss', paths.scss_src + '/*.scss',
			paths.page_blocks + '/**/*.scss', paths.page_blocks + '/*.scss'
		],
		gulp.series('styles')
	);
	gulp.watch(
		[
			paths.js_src + '/**/*.js',
			'js/**/*.js',
			'!js/theme.js',
			'!js/theme.min.js',
		],
		gulp.series('scripts')
	);
});

/**
 * Starts browser-sync task for starting the server.
 *
 * Run: gulp browser-sync
 */
gulp.task('browser-sync', function () {
	browserSync.init(cfg.browserSyncOptions);
});


/**
 * Starts watcher with browser-sync.
 * Browser-sync reloads page automatically on your browser.
 *
 * Run: gulp watch-bs
 */
gulp.task('watch-bs', gulp.parallel('browser-sync', 'watch'));

// Run:
// gulp scripts.
// Uglifies and concat all JS files into one
gulp.task('scripts', function () {
	var scripts = [

		// Start - Including Files
		paths.js_vendor + '/bootstrap4/bootstrap.bundle.js',
		paths.js_src + '/skip-link-focus-fix.js',

		// Adding currently empty javascript file to add on for your own themes´ customizations
		// Please add any customizations to this .js file only!
		paths.js_src + '/custom-javascript.js',

	];
	gulp
		.src(scripts, { allowEmpty: true })
		.pipe(babel({ presets: ['@babel/preset-env'] }))
		.pipe(concat('theme.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest(paths.js));

	return gulp
		.src(scripts, { allowEmpty: true })
		.pipe(babel())
		.pipe(concat('theme.js'))
		.pipe(gulp.dest(paths.js));
});


// Run:
// gulp clean-source
// Copy all needed dependency assets files from node_modules to theme's /js, /scss and /fonts folder. Run this task after npm update

gulp.task('clean-source', function () {
	return del([paths.js_vendor + '/*', paths.scss_vendor + '/*']);
});

// Run:
// gulp copy-assets.
// Copy all needed dependency assets files from node_modules to theme's /js, /scss and /fonts folder. Run this task after npm update

////////////////// All Bootstrap SASS  Assets /////////////////////////
gulp.task('copy-assets', function (done) {
	////////////////// All Bootstrap 4 Assets /////////////////////////
	// Copy all JS files
	var stream = gulp
		.src(paths.node + '/bootstrap/dist/js/**/*.js')
		.pipe(gulp.dest(paths.js_vendor + '/bootstrap4'));

	// Copy all Bootstrap SCSS files
	gulp
		.src(paths.node + '/bootstrap/scss/**/*.scss')
		.pipe(gulp.dest(paths.scss_vendor + '/bootstrap4'));

	////////////////// End Bootstrap 4 Assets /////////////////////////

	// Copy all Font Awesome Fonts
	gulp
		.src(paths.node + '/@fortawesome/fontawesome-free/webfonts/*.{ttf,wff,woff2,eot,svg}')
		.pipe(gulp.dest(paths.fonts));

	// Copy all Font Awesome SCSS files
	gulp
		.src(paths.node + '/@fortawesome/fontawesome-free/scss/*.scss')
		.pipe(gulp.dest(paths.scss_vendor + '/fontawesome'));

	done();
});

gulp.task( 'sass-lint', function() {
	return gulp.src([
			paths.dev + '/scss/*.scss',
			paths.dev + '/scss/theme/*.scss',
		])
		.pipe(sassLint( {
			configFile: '.sass-lint.yml',
		} ) )
		.pipe( sassLint.format() )
		.pipe( sassLint.failOnError() )
		.on( "error", notify.onError( {
			title: "TASK: Sass Lint 👎. Grab some ☕️ and fix it!",
			message: "\n<%= error.message %>"
		} ) )
})


// Run
// gulp compile
// Compiles the styles and scripts and runs the dist task
gulp.task('compile', gulp.series('styles', 'scripts'));

// Run:
// gulp
// Starts watcher (default task)
gulp.task('default', gulp.series('watch'));
