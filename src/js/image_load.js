var loadFile = function(event, id) {
    if(id == 1)
    var output = document.getElementById('output');
    if(id == 2)
    var output = document.getElementById('output2');
    if(id == 3)
    var output = document.getElementById('output3');
    if(id == 4)
    var output = document.getElementById('output4');
    if(id == 5)
    var output = document.getElementById('output5');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };