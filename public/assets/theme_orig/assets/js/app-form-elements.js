var App = (function () {
  'use strict';

  App.formElements = function( ){

    //Js Code
    $(".datetimepicker").datetimepicker({
    	autoclose: true,
    	componentIcon: '.mdi.mdi-calendar',
    	navIcons:{
    		rightIcon: 'mdi mdi-chevron-right',
    		leftIcon: 'mdi mdi-chevron-left'
    	},
        weekStart: 1,
        locale: 'ru'
    });

    //$(".daterangepicker").daterangepicker({autoUpdateInput: false});

    $(".datetimepicker_next").datetimepicker({
    	autoclose: true,
        minDate: moment().toDate(),
    	componentIcon: '.mdi.mdi-calendar',
    	navIcons:{
    		rightIcon: 'mdi mdi-chevron-right',
    		leftIcon: 'mdi mdi-chevron-left'
    	},
        weekStart: 1,
        locale: 'ru'
    });
    
    //Select2
    $(".select2").select2({
      width: '100%'
    });
    
    //Select2 tags
    $(".tags").select2({tags: true, width: '100%'});

    //Bootstrap Slider
    $('.bslider').bootstrapSlider();
    
  };

  return App;
})(App || {});
