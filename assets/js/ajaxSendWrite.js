$("#submit").click(function(){
     $.ajax({
        type: 'POST',
        url: 'components/writing/basicWritingSave.php',
        data: $('#form').serialize(),
         success: function (data) {
         },
      });
  });