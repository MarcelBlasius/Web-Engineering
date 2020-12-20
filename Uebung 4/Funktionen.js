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

//TODO applyf