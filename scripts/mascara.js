
document.addEventListener('keydown', function(event) {
    if(event.keyCode != 46 && event.keyCode != 8){
      var i = document.getElementById("CPF").value.length;
      if (i === 3 || i === 7)
        document.getElementById("CPF").value = document.getElementById("CPF").value + ".";
      else if (i === 11)
        document.getElementById("CPF").value = document.getElementById("CPF").value + "-";
    }
  });

  document.addEventListener('keydown', function(event) {
    if(event.keyCode != 46 && event.keyCode != 8){
      var i = document.getElementById("RG").value.length;
      if (i === 2 || i === 6)
        document.getElementById("RG").value = document.getElementById("RG").value + ".";
      else if (i === 10)
        document.getElementById("RG").value = document.getElementById("RG").value + "-";
    }
  });

  document.addEventListener('keydown', function(event) {
    if(event.keyCode != 46 && event.keyCode != 8){
      var i = document.getElementById("CEP").value.length;
      if (i === 2)
        document.getElementById("CEP").value = document.getElementById("CEP").value + ".";
      else if (i === 6)
        document.getElementById("CEP").value = document.getElementById("CEP").value + "-";
    }
  });

