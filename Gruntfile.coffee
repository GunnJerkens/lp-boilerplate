module.exports = (grunt) ->

  # load all grunt tasks
  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks)

  grunt.initConfig

    pkg: grunt.file.readJSON 'package.json'

    concat:
      min:
        files:
          'public/js/main.js': [
            'public/js/src/libs/*.js',
            'public/js/src/bootstrap/affix.js',
            'public/js/src/bootstrap/alert.js',
            'public/js/src/bootstrap/button.js',
            'public/js/src/bootstrap/collapse.js',
            'public/js/src/bootstrap/dropdown.js',
            'public/js/src/bootstrap/tab.js',
            'public/js/src/bootstrap/transition.js',
            'public/js/src/bootstrap/scrollspy.js',
            'public/js/src/bootstrap/modal.js',
            'public/js/src/bootstrap/tooltip.js',
            'public/js/src/bootstrap/popover.js',
            'public/js/src/*.js'
          ]

    uglify:
      min:
        files:
          'public/js/main.js': [
            'public/js/src/libs/*.js',
            'public/js/src/bootstrap/affix.js',
            'public/js/src/bootstrap/alert.js',
            'public/js/src/bootstrap/button.js',
            'public/js/src/bootstrap/collapse.js',
            'public/js/src/bootstrap/dropdown.js',
            'public/js/src/bootstrap/tab.js',
            'public/js/src/bootstrap/transition.js',
            'public/js/src/bootstrap/scrollspy.js',
            'public/js/src/bootstrap/modal.js',
            'public/js/src/bootstrap/tooltip.js',
            'public/js/src/bootstrap/popover.js',
            'public/js/src/*.js'
          ]

    compass:
      dist:
        options:
          config: 'public/style/config.rb'
          sassDir: 'public/style/sass'
          imagesDir: 'public/img'
          cssDir: 'public/style'
          environment: 'production'
          outputStyle: 'compressed'
          force: true

    browserSync:
      files:
        src: 'public/style/screen.css'
      options:
          host: "localhost"
          watchTask: true

    watch:
      options:
        livereload: true
      scripts:
        files: ['public/js/src/*.js','public/js/src/libs/*.js','public/js/src/bootstrap/*.js']
        tasks: ['uglify']
      styles:
        files: ['public/style/**/*.{sass,scss}','public/img/ui/*.png']
        tasks: ['compass']

  # Development task checks and concatenates JS, compiles SASS preserving comments and nesting, runs dev server, and starts watch
  grunt.registerTask 'dev', ['compass', 'concat']
  grunt.registerTask 'default', ['compass', 'uglify', 'browserSync', 'watch']
