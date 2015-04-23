
$("#submitter").click(function() {
 
 $("input,textarea").jqBootstrapValidation(
    {
     preventSubmit: true,
     submitError: function($form, event, errors) {
      // something to have when submit produces an error ?
      // Not decided if I need it yet
     },
     submitSuccess: function($form, event) {
      event.preventDefault(); // prevent default submit haviour
       // get values from FORM
       var name = $("input#name").val();
         var ideaname = $("input#ideaname").val();
         var problem = $("input#problem").val();
         var needs = $("input#needs").val();
       var message = $("textarea#message").val();
        var firstName = name; // For Success/Failure Message
           // Check for white space in name for Success/Fail message
         
        if (firstName.indexOf(' ') >= 0) {
       firstName = name.split(' ').slice(0, -1).join(' ');
         }
     $.ajax({
                url: "./assets/inc/contact_me.php",
                type: "POST",
                data: {name: name, ideaname: ideaname, problem: problem, needs: needs, message: message},
                cache: false,
                success: function(data) {
                // Success message
                   $('#success').html('<div class="alert alert-success">');
 $('#success > .alert-success').html('<button class="close" type="button" data-dismiss="alert">×')
 .append( "</button>");
 $('#success > .alert-success')
 .append('<strong>Your message has been sent. You will soon receive an email with the next steps. We look forward to helping you build your startup into the next big thing!</strong> <br> <p>Email us at <a href="mailto:info@e2.is?Subject=pitchLove%20Question">info@e2.is</a>.</p>');
 $('#success > .alert-success')
 .append('</div>');
 
          //clear all fields
          $('#contactForm').trigger("reset");
          },
       error: function() {
        // Fail message
         $('#success').html('<div class="alert alert-danger">');
 $('#success > .alert-danger').html('<button class="close" type="button" data-dismiss="alert">×')
 .append( "</button>");
 $('#success > .alert-danger').append("<strong>Sorry "+firstName+' it seems that my mail server is not responding...</strong> Could you please email me directly to <a href="mailto:info@e2.is?Subject=Form Issue">info@e2.is</a> ? Sorry for the inconvenience!');
 $('#success > .alert-danger').append('</div>');
        //clear all fields
        $('#contactForm').trigger("reset");
        },
           })
         },
         filter: function() {
                   return $(this).is(":visible");
         },
       });
 
      $("a[data-toggle=\"tab\"]").click(function(e) {
                    e.preventDefault();
                    $(this).tab("show");
        });
  });
 
/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
     $('#success').html('');
  });