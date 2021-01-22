<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card View</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
    .card {
      
      width: 44%;
      margin: auto;
      margin-top: 20px;
      padding-bottom: 10px;
      border-radius: 30px;
          }
    .dataweather{
      padding-left: 23px;
      padding-bottom: 5px;
                }
    .searchdataweather{
      padding-left: 23px;
                      }
    h3{
      padding-top: 15px;
      }
    h2{
      padding-top: 20px;
     }
  
    </style>

    <body style="background-color:rgb(180, 228, 255);">
        <div class="container">  
         <div class="card" style="font-family: cursive;">
          <h2><b><center>Card View</center></b></h2>
          <div class="row">
            <input type="text" id="Latitude" placeholder="Latitude" class="form-control" style="width: 160px; margin-left: 30px; margin-top: 20px;" >
            <input type="text" id="Longitude" placeholder="Longitude" class="form-control" style="width: 160px;margin-left: 20px;  margin-top: 20px; ">
            <button id="load" class="btn btn-primary btn-sm" style=" width: 140px; margin-left: 30px; margin-top: 20px;" style="border-radius: 20px;"><b>Load</b></button>
          </div>
          <br>
                <img src="https://lh3.googleusercontent.com/3VUH9swC-3vu0ZeGbXPLuYW861EtOC6XJJ7jQ7aSY0LEsurMQElc1iWVkR6CEtZsA1hCPt2z=w1080-h608-p-no-v0" alt="Wangwiset" style="width:100%">
        
         
        <div class="dataweather">      
            <h3>Weather<span id="name"> at </span><br> </h3>
                <span id="sys_country ">Country: </span><br>
                <span id="temp">Temp: </span> Celsius<br>
                <span id="temp_max">Temp max: </span> Celsius<br>
                <span id="temp_min">Temp min: </span> Celsius<br>
                <span id="humidity">Humidity: </span> %<br>
                <span id="sunrise">Sunrise: </span> unix<br>
                <span id="sunset">Sunset: </span> unix<br>
                <span id="wind_deg">Wind deg: </span> degree<br>
                <span id="wind_speed">Wind speed: </span> m/s<br>
                <span id="clouds">Cloud: </span> %<br>
          </div>

          
            <div class="searchdataweather">
                <h3>Weather at <span id="name1"> </span><br> </h3>
                Country: <span id="country1"> </span><br>
                Temp: <span id="temp1"> </span> Celsius<br>
                Temp max: <span id="temp_max1"> </span> Celsius<br>
                Temp min: <span id="temp_min1"> </span> Celsius<br>
                Humidity: <span id="humidity1"> </span> %<br>
                Sunrise: <span id="sunrise1"> </span> unix<br>
                Sunset: <span id="sunset1"> </span> unix<br>
                Wind deg: <span id="wind_deg1"></span> degree<br>
                Wind speed: <span id="wind_speed1"> </span> m/s<br>
                Cloud: <span id="clouds1"> </span> %<br>
            </div>
          </div>
         </div>
    </div>  
          
        <script> 
                function loadweather(){ 
                $(".searchdataweather").hide();
                var url ="http://api.openweathermap.org/data/2.5/weather?lat=7.651575&lon=99.472454&appid=c5703eb8344752d6bdf1320ac3de7ea5";
     
                $.get(url)
                     .done((data)=>{
                      console.log(data)
                       $("#name").append(data.name);
                       $("#temp").append(data.main.temp);
                       $("#temp_max").append(data.main.temp_max);
                       $("#temp_min").append(data.main.temp_min);
                       $("#humidity").append(data.main.humidity);
                       $("#country").append(data.sys.country);
                       $("#sunrise").html(data.citi.sun.rise);
                       $("#sunset").append(data.sys.sunset);
                       $("#wind_deg").append(data.wind.deg);
                       $("#wind_speed").append(data.wind.speed);
                       $("#clouds").append(data.clouds.all);
                      })         
                              .fail((xhr, status, err)=>{
                              console.log("error")
                              });
                      }
   
                    function searchweather(){ 
                         $(".dataweather").hide();
                        $(".searchdataweather").show();
                          var url ="https://api.openweathermap.org";
                          var a = $("#Latitude").val();
                          var b = $("#Longitude").val();

                           url = url + "/data/2.5/weather?lat=" + a + "&lon=" + b +"&appid=a28d46fac268c82a0dc8eabda7fd2b94&units=metric"; 
           
                        $.getJSON(url)
                          .done((data)=>{
                           console.log(data)
                            $("#name1").append(data.name);
                            $("#temp1").append(data.main.temp);
                            $("#temp_max1").append(data.main.temp_max);
                            $("#temp_min1").append(data.main.temp_min);
                            $("#humidity1").append(data.main.humidity);
                            $("#country1").append(data.sys.country);
                            $("#sunrise1").append(data.sys.sunrise);
                            $("#sunset1").append(data.sys.sunset);
                            $("#wind_deg1").append(data.wind.deg);
                            $("#wind_speed1").append(data.wind.speed);
                            $("#clouds1").append(data.clouds.all);

                            })         
                              .fail((xhr, status, err)=>{
                               console.log("error")
                                });
                              }
         
                            function remove(){
                              $("#name1").empty();
                              $("#temp1").empty();
                              $("#temp_max1").empty();
                              $("#temp_min1").empty();
                              $("#humidity1").empty();
                              $("#country1").empty();
                              $("#sunrise1").empty();
                              $("#sunset1").empty();
                              $("#wind_deg1").empty();
                              $("#wind_speed1").empty();
                              $("#clouds1").empty();

                            }
                            $(()=>{ 
                               loadweather();
                                  $("#load").click(()=>{ 
                                  searchweather();
                                });
                                  $("#load").click(()=>{
                                  remove();
                                }); 
            
                              });
   </script>        
  </body>
</html>
