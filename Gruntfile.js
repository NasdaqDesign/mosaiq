module.exports = function(grunt) {
	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		//TASK CONFIGURATIONS AND OPTIONS
		//For general documentation on task congigurations, see: http://gruntjs.com/configuring-tasks
		//For specific task requirements and options, see individual task pages (noted at the bottom where tasks are loaded).

		//LESS for css pre-processing (NOTE: multitasks like this less task require a target - I'm using default)
		less: {
			options: {
				compress: true,
			},
			default: {
				files: [
					// looking for all .less files directly under source/_resources/less, excpect common and shame
					{
						expand: true,
						cwd: 'library/less',
						src: ['style.less', 'admin/prodaq-admin.less', 'admin/login.less'],
						dest: 'library/css',
						flatten: true,
						ext: '.css'
					}
				]
			}
		}, // less

		//WATCH to run some of the above automatically on file changes
		watch: {
			less: {
				files: ['library/less/**'],
				tasks: ['less']
			},
			getugly: {
				files: ['library/js/prodaq/*.js'],
				tasks: ['uglify']
			}
		},
		uglify: {
			dynamic_mappings: {
				// Grunt will search for "**/*.js" under "lib/" when the "uglify" task
				// runs and build the appropriate src-dest file mappings then, so you
				// don't need to update the Gruntfile when files are added or removed.
				files: [
					{
						expand: true,     // Enable dynamic expansion.
						cwd: 'library/js/prodaq',      // Src matches are relative to this path.
						src: ['*.js'], // Actual pattern(s) to match.
						dest: 'library/js/prodaq/min/',   // Destination path prefix.
						ext: '-min.js',   // Dest filepaths will have this extension.
						extDot: 'first'   // Extensions in filenames begin after the first dot
					},
				]
			}
		}
	});

	//LOAD REQUIRED TASKS
	grunt.loadNpmTasks('grunt-contrib-less');         // https://npmjs.org/package/grunt-contrib-less
	grunt.loadNpmTasks('grunt-contrib-watch');        // https://npmjs.org/package/grunt-contrib-watch
	grunt.loadNpmTasks('grunt-contrib-uglify');

	// Register Default task(s).
	//NOTE: when testing tasks, it's easiest to remove the watch task as the only way to stop the watch is to close the cmd window.
	grunt.registerTask('default', ['less']);

};