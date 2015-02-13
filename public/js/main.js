$(document).ready(function(){

   $('.add-vars').click(function(){
      var no_of_vars = parseInt( $(this).siblings('#no_of_vars').val() );

      var input_name = "input["+(no_of_vars+1)+"][name]";
      var input_var = "input["+(no_of_vars+1)+"][var]";

      var vars = '';
      vars += '<br>';
      vars += '<label>Input Label '+(no_of_vars+1)+'</label>';
      vars += '<input type="text" name='+input_name+' class="form-control">';
      vars += '<label>Code '+(no_of_vars+1)+'</label>';
      vars += '<input type="text" name='+input_var+' class="form-control">';

      $(this).before(vars);
      $(this).siblings('#no_of_vars').val(no_of_vars+1);
   });
});