'use strict';

module.exports = function (grunt) {

  // load all grunt tasks
  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),
 
    uglify: {
      min: {
        files: {
          'public/js/main.js': ['src/*.js']
        }
      }
    },
 
    compass: {
      dev: {
        options: {
          sassDir: 'public/style/sass',
          cssDir: 'public/style/css'
        }
      },
      production: {
        options: {
          sassDir: 'public/style/sass',
          cssDir: 'public/style/css',
          environment: 'production',
          outputStyle: 'compressed',
          force: true
        }
      }
    },

    watch: {
      options: {
        livereload: true
      },
      scripts: {
        files: 'src/*.js',
        tasks: ['uglify']
      },
      styles: {
        files: ['public/style/sass/**/*.{sass,scss}'],
        tasks: ['compass:dev']
      }
    },
  });
 
  // Development task checks and concatenates JS, compiles SASS preserving comments and nesting, runs dev server, and starts watch
  grunt.registerTask('default', ['compass:dev', 'uglify', 'watch']);
  // Build task builds minified versions of static files
  grunt.registerTask('build', ['compass:production', 'uglify']);
  grunt.registerTask('style', ['compass:dev']);
 
 }