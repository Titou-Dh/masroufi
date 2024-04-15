var d=new Date();
var h=d.getHours();
var m=d.getMinutes();
if (m>=10){
    var time=h+":"+m;
}
else{
    var time=h+":"+"0"+m;
}
document.getElementById("datetime").innerHTML=time;


