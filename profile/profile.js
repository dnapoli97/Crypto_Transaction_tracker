/* 
This file uses jquery to submit the new transaction to the database without redircting the user and also updating the transaction history at the same time.
 */

  var script = document.createElement('script');
  script.src = 'https://code.jquery.com/jquery-3.4.1.min.js';
  script.type = 'text/javascript';
  document.getElementsByTagName('head')[0].appendChild(script);

  $(function() {
    $('.error').hide();
    $("#submitbutton").click(function() {
      // validate and process form here
      
      $('.error').hide();
  	  var day = $("input#day").val();
  		if (day == "") {
        $("label#name_error").show();
        $("input#name").focus();
        return false;
      }
  		var currency = ($("input#currency").val()).toUpperCase();

      var amount = $("input#amount").val();
      
      var dataString = 'day='+ day + '&amount=' + amount + '&currency=' + currency;
  //alert (dataString);return false;
  $.ajax({
    type: "POST",
    url: "transaction.php",
    data: dataString,
    success: function() {
      alert('added');
      // uppon successful inserting the transaction to the db it can update the table viewed by the current user
      var table = document.getElementById("transTab");

      var row = table.insertRow(1);

      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);      

      cell1.innerHTML = day;
      cell2.innerHTML = currency;
      cell3.innerHTML = amount;
      
      var id2get = currency.toLowerCase(); 
      document.getElementById(id2get).innerHTML = parseFloat(document.getElementById(id2get).innerHTML) + parseFloat(amount);
    }
  });
  return false;

    });
  });

