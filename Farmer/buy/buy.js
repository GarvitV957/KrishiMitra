function update(){
    var x=(document.getElementById("wheat").value)*50;
    var y=(document.getElementById("flax").value)*70;
    var z=(document.getElementById("pmp").value)*100;
    var p=(document.getElementById("tractor").value)*40000;
    document.getElementById("total").innerHTML=Number(x)+Number(y)+Number(z)+Number(p);
}