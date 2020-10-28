// for (i=1; i<5; i++){
//   var x = document.getElementById("img"+i)
// }



// var x1img = x1.getElementByTagName('img')[0];
// var x1src = x1img.src;
// alert(x1src);

// var x1src = document.getElementById('img1').getElementsByTagName('img')[0].src;
// alert(x1src);
var imgs = document.querySelectorAll(".prod-img2");

for(i = 0; i<imgs.length; i++){
  imgs[i].addEventListener("mouseover", bigTranny);
  imgs[i].addEventListener("mouseout", smallTranny);
  imgs[i].addEventListener("click", changeImg);
}

function bigTranny() {
  this.style.transform = "scale(1.2)";
}

function smallTranny() {
  this.style.transform = "scale(1)";
}

function changeImg() {
//    alert(_src);

  var src2 = this.src.replace('thumbs','medium');
  document.querySelector(".main").src = src2;
  document.getElementsByTagName("h3")[0].innerHTML = this.alt;
}
