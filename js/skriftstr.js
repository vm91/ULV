 
   function setTextSize(size) { 
                 
                var a = '10px'; // LITEN SKRIFT 
                var b = '16px'; // MIDDELS SKRIFT 
                var c = '24px'; // STOR SKRIFT 
                 
                if (size === 'small') { 
                    size = a; 
                } else if (size === 'large') { 
                    size = c; 
                } else { 
                    size = b; 
                } 
                 
                document.getElementById('innhold').style.fontSize = size;      
		}  