var c=new get_text();

function get_text(){
    document.addEventListener("DOMContentLoaded", function() {
        var chemicalElementDivs = document.getElementsByClassName("elementChim");
        for (var i = 0; i < chemicalElementDivs.length; i++) {
            var c=chemicalElementDivs[i].children.length;
            for(var j=0;j<c;j++){
                chemicalElementDivs[i].children[j].addEventListener("mouseover",change_color)
                chemicalElementDivs[i].children[j].addEventListener("mouseout",change_color_black)

            }
        }
    }
)
}
function change_color() {
    var text=this.textContent;
    document.getElementById("paragraph").style.color=text;
    console.log(text);
}

function change_color_black(){
    document.getElementById("paragraph").style.color="black";

}
