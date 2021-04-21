# simple-csrf-helper

## This is a simple csrf helper class written in object oriented programming aspect of php


# There are some tricky stuff you can do with it

  ## 1 You can set the token expiry by calling after the class instantiation
  
  #### $csrf= new Csrf();
  #### $expiry=3*3600;      //where 3600 is an hour in seconds therefore this is for  3 hours the default expiry time is 7200 which is two hours
  #### $csrf->setExpiry($expiry);

  ## 2 You can set the token expiry by calling after the class instantiation

  ### A default token secret is already set for you but you are advised  to set new secret token for security purpose
  
  #### $csrf= new Csrf();
  #### $tokensecret='super random secret';   
  #### $csrf->setTokenKey($tokensecret);

  ## 3 You can set the token input tag field name by calling after the class instantiation

  ###   A default name is already set for you which is super cool and great!!!
  #### $csrf= new Csrf();
  #### $fieldname='csrf_field';   
  #### $csrf->setTokenName($fieldname);
