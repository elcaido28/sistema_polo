function sololetras(e){
  key=e.keyCode || e.which;
  teclado=String.fromCharCode(key).toLowerCase();//para solo numeros quitar .toLowerCase()
  numero=" abcdefghiyjklmnñopqrstuvwxyz._-,óíáéú";
  especial="8-37-38-46-164-13-9-16";
  tecla_especial=false;

  for(var i in especial){
    if(key==especial[i]){
      tecla_especial=true;break;
    }
  }
  if(numero.indexOf(teclado)==-1 && !tecla_especial){
    return false;
  }
 }

 function solonumeros(e){
   key=e.keyCode || e.which;
   teclado=String.fromCharCode(key);//para solo numeros quitar .toLowerCase()
   numero="0123456789.";
   especial="8-37-38-46-164-13-9-16";
   tecla_especial=false;

   for(var i in especial){
     if(key==especial[i]){
       tecla_especial=true;break;
     }
   }
   if(numero.indexOf(teclado)==-1 && !tecla_especial){
     return false;
   }
  }

function solonumeroRUC(e){
    key=e.keyCode || e.which;
    teclado=String.fromCharCode(key);//para solo numeros quitar .toLowerCase()
    numero="0123456789";
    especial="8-37-38-46-164-13-9-16";
    tecla_especial=false;

    for(var i in especial){
      if(key==especial[i]){
        tecla_especial=true;break;
      }
    }
    if(numero.indexOf(teclado)==-1 && !tecla_especial){
      return false;
    }
   }


  function enable(e){
    key=e.keyCode || e.which;
    teclado=String.fromCharCode(key);//para solo numeros quitar .toLowerCase()
    numero="";
    especial="";
    tecla_especial=false;

    for(var i in especial){
      if(key==especial[i]){
        tecla_especial=true;break;
      }
    }
    if(numero.indexOf(teclado)==-1 && !tecla_especial){
      return false;
    }
   }
