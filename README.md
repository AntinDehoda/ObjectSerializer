# Working with a library to serialize objects.
  An example of working with data output in the console (file 'tests/console.php').
  1. We connect the class responsible for serialization ('ObjectSerializer.php').
  2. Create an object of this class using the constructor.
     An **object** is passed to the constructor to be serialized.
     and **line** (data format to be output).
     When creating a new object 'ObjectSerializer' the passed to constructor 
     object is converted to an associative array. 
  3. In order to get the serialized data in the format we need, call the method 'convertOtput()'.
       
  At the moment, the library converts objects only into formats
       **Json** and **Yaml**. And only these values can be passed
       as second argument when creating a new object 'ObjectSerializer'.
