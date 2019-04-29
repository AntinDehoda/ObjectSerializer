# Object serializer library.
The library creates a representation of objects in various formats. The public properties of the object and their values are converted. At the moment, the possibility of converting to formats **XML**,**Json** and **Yaml**. 
## Usage
  1. Instalation
``` 
composer install
```
  2. Convert Object to Json: 
  ```
  $objToJson = new ObjectSerializer($convertibleObj);
  $json = $objToJson->serialize(new JsonParser());
  ```
  3. Convert Object to Yaml: 
  ```
  $objToYaml = new ObjectSerializer($convertibleObj);
  $yaml = $objToYaml->serialize(new YamlParser());
  ```
  4. Convert Object to XML: 
  ```
  $objToXML = new ObjectSerializer($convertibleObj);
  $xml = $objToXML->serialize(new XMLParser());
  ```
  5. Convert Object to AnyFormat:  
  
  Create a class ```AnyFormatParser``` implementing interface ParserInterface. Place it in a folder ```/src/Outputs/``` and include it in the namespace ```ObjectSerializer\Outputs```. Inside the class ```AnyFormatParser```, implement the method ```convertArray($array)```. In this method make the logic of converting an associative array into the format you need.
  ```
  $objToAnyFormat = new ObjectSerializer($convertibleObj);
  $anyFormat = $objToAnyFormat->serialize(new AnyFormatParser());
  
  ```
***
Anton Dehoda 
  
