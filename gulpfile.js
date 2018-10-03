var gulp     = require('gulp');
var shell = require('gulp-shell');

var controllersDir = 'application/controllers/';
var modelsDir = 'application/models/';
var viewsDir = 'application/views/';

gulp.task('phpcbfControllers', shell.task(['phpcbf ' + controllersDir + ' --standard=PSR2,PSR1 ']));
gulp.task('phpcbfModels', shell.task(['phpcbf ' + modelsDir + ' --standard=PSR2,PSR1 ']));
gulp.task('phpcbfViews', shell.task(['phpcbf ' + viewsDir + ' --standard=PSR2,PSR1 ']));

// set watch task to look for changes in test files
gulp.task('watch', function () {
    gulp.watch(controllersDir+'*.php', ['phpcbfControllers']);
    gulp.watch(modelsDir+'*.php', ['phpcbfModels']);
    gulp.watch(viewsDir+'*.php', ['phpcbfViews']);
});

// The default task (called when you run `gulp` from cli)
gulp.task('default', ['phpcbfControllers', 'phpcbfModels', 'phpcbfViews' ,'watch']);