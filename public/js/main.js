$(document).ready(function(){
   //$('#doc_source').ckeditor();

   $('.show-vars').click(function(){
      var no_of_vars = $('#no_of_vars').val();
      if( isNaN(no_of_vars) )
         return false;

      var vars = '';
      for( var i = 1; i <= no_of_vars; i++ )
      {
         var label_name = 'input['+i+'][]';
         var code_name = 'input['+i+'][]';
         vars += '<br>';
         vars += '<label>Input Label '+i+'</label>';
         vars += '<input type="text" name="'+label_name+'" class="form-control">';
         vars += '<label>Code '+i+'</label>';
         vars += '<input type="text" name="'+code_name+'" class="form-control">';
      }
      $(this).after(vars);
   });
});