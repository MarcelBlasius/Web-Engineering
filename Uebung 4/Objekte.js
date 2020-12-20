function Auto(id){
    return{
      id: id,
      toString: function () {
      return "Auto(" + id + ")";
         }
    };
  }
  
  function Person(name, autos){
   return{
       name: name,
       autos: autos,
       toString: function(){
          return "Person(" + name + " besitzt folgende Autos: " + autos +")";
       }
   };
  }
  
  function conflict(auto, personenArray){
      var zaehler = 0;
      for(i= 0; i< personenArray.length; i++){
          for(j = 0; j < personenArray[i].autos.length; j++){
              if(auto === personenArray[i].autos[j]){
                  if(++zaehler > 1){
                      return true;
                  }
              }
          }
      }
      return false;
  }