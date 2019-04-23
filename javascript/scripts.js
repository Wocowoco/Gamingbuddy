//include the   'async':false   parameter or the object data won't get captured when loading
var json = $.getJSON({'url': "https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/joeki6?api_key=RGAPI-e7939c8a-a63b-4f61-aa30-3e33852ef760", 'async': false});  

//The next line of code will filter out all the unwanted data from the object.
json = JSON.parse(json.responseText); 

//You can now access the json variable's object data like this json.a and json.c
document.write(json.a);
console.log(json);