function identity(param){
    return param;
  }

function identity_function(param){
  return function f(){
        return param;
  }
}  

function add(param1, param2){
  return param1 + param2;
}

function mul(param1, param2){
  return param1 * param2;
}

function addf(x){
  return function f(y) {
     return x + y;
  }
}

//Mit Hilfe der Lösungen gelöst: https://kaul.inf.h-brs.de/we/#app-content-5-2
function apply(f){
  var first = function(x){
    var second = function(y){
      return f(x,y)
    }
    return second;
  }
  return first;
}