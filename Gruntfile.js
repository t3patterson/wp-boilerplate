module.exports = function(grunt) { 
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-cssmin');

  grunt.initConfig({ 
    pkg: grunt.file.readJSON('package.json'),
    
    watch: {
      scripts: {
        files: ['scss/*.scss'],
        tasks: ['sass','cssmin'],
        options: {
          spawn: false,
        },
      },
    },


    sass: {
        dist: {
            files: {
            './dist/bundle/style.css': 'scss/style.scss'
            }
        }
    },

    cssmin: {
      target: {
        files: [{
          expand: true,
          cwd: './dist/bundle',
          src: ['**/style.css'],
          dest: './dist',
          ext: '.min.css'
        }]
      },


    }

  
  });

  grunt.task.registerTask('default',['sass','cssmin'])

}

