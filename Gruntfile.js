module.exports = function(grunt) {

	// load all grunt tasks in package.json matching the `grunt-*` pattern
	require('load-grunt-tasks')(grunt);

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		githooks: {
			all: {
				'pre-commit': 'default'
			}
		},

		csscomb: {
			dist: {
				files: [{
					expand: true,
					cwd: '',
					src: ['**/*.css'],
					dest: '',
				}]
			}
		},

		sass: {
			dist: {
				options: {
					style: 'expanded',
					lineNumbers: true,
					require: 'susy'
				},
				files: {
					'style.css': 'sass/style.scss'
				}
			}
		},

		autoprefixer: {
			options: {
				browsers: ['> 1%', 'last 2 versions', 'Firefox ESR', 'Opera 12.1']
			},
			dist: {
				src:  'style.css'
			}
		},

		cmq: {
			options: {
				log: false
			},
			dist: {
				files: {
					'style.css': 'style.css'
				}
			}
		},

		cssmin: {
			minify: {
				expand: true,
				cwd: '',
				src: ['*.css', '!*.min.css'],
				dest: '',
				ext: '.min.css'
			}
		},

		concat: {
			dist: {
				src: [
					'js/concat/*.js'
				],
				dest: 'js/project.js',
			}
		},

		uglify: {
			build: {
				options: {
					mangle: false
				},
				files: [{
					expand: true,
					cwd: 'js/',
					src: ['**/*.js', '!**/*.min.js', '!concat/*.js'],
					dest: 'js/',
					ext: '.min.js'
				}]
			}
		},

		imagemin: {
			dynamic: {
				files: [{
					expand: true,
					cwd: 'images/',
					src: ['**/*.{png,jpg,gif}'],
					dest: 'images/'
				}]
			}
		},

		update_submodules: {
			dist: {
			}
		},

		watch: {

			scripts: {
				files: ['js/**/*.js'],
				tasks: ['javascript', 'shell:grunt'],
				options: {
					spawn: false,
				},
			},

			css: {
				files: ['sass/partials/*.scss'],
				tasks: ['styles', 'shell:grunt'],
				options: {
					spawn: false,
					livereload: true,
				},
			},

		},

		shell: {
			grunt: {
				command: 'afplay grunt.mp3'
			}
		},

		clean: {
			js: ['js/project*', 'js/**/*.min.js'],
			css: ['style.css', 'style.min.css']
		},

		makepot: {
			theme: {
				options: {
					cwd: '',
					domainPath: 'languages/',
					potFilename: '_s.pot',
					type: 'wp-theme'
				}
			}
			/*plugin_name: {
				options: {
					cwd: 'plugins/plugin_name',
					domainPath: 'languages/',
					potFilename: 'plugin_name.pot',
					type: 'wp-plugin'
				}
			}
			repeat as necessary
			*/
		},

		addtextdomain: {
			theme: {
				options: {
					textdomain: 'wordsesh-theme'
				},
				target: {
					files: {
						src: ['*.php']
					}
				}
			},
			/*plugin_name: {
				options: {
					textdomain: 'text-domain'
				},
				target: {
					files: {
						src: ['*.php']
					}
				}
			}
			repeat as necessary
			*/
		},

		update_submodules: {

			default: {
				options: {
					// default command line parameters will be used: --init --recursive
				}
			},
			withCustomParameters: {
				options: {
					params: '--force' // specifies your own command-line parameters
				}
			},

		}

	});

	grunt.registerTask('styles', ['sass', 'autoprefixer', 'cmq', 'csscomb', 'cssmin']);
	grunt.registerTask('javascript', ['concat', 'uglify']);
	grunt.registerTask('imageminnewer', ['newer:imagemin']);
	grunt.registerTask('i18n', ['makepot']);
	grunt.registerTask('default', ['update_submodules', 'styles', 'javascript', 'imageminnewer', 'i18n']);

};
