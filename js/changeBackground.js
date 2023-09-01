/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var colors = 10, wallpapers=9, background, cor;
ran = Math.round(Math.random() * (colors - 1)) + 1;
ran2 = Math.round(Math.random() * (wallpapers - 1)) + 1;

if (ran == (1)) {
    background = ("#000000");
    /*cor = ("#FF0000");*/
}
if (ran == (2)) {
    background = ("#332A6E");
    /*cor = ("#FAF55F");*/
}
if (ran == (3)) {
    background = ("#3AFFAA");
    /*cor = ("#FF3BDC");*/
}
if (ran == (4)) {
    background = ("#FFD53A");
    /*cor = ("#3BC5FF");*/
}
if (ran == (5)) {
    background = ("#FF963A");
    /*cor = ("#3B9AFF");*/
}
if (ran == (6)) {
    background = ("#3BFDFF");
    /*cor = ("#FFD53B");*/
}
if (ran == (7)) {
    background = ("#FF3AA7");
    /*cor = ("#9EFF3B");*/
}
if (ran == (8)) {
    background = ("#3AFFAA");
    /*cor =("#F889EF");*/
}
if (ran == (9)) {
    background = ("#6FFF3A");
    /*cor = ("#FF3BFD");*/
}
if (ran == (10)) {
    background = ("#F9FF3A");
    /*cor = ("#B13BFF");*/
}
function chargeColorWallpaper() {
    document.body.style.background = background;
    document.body.style.transition = "1s";
    document.getElementById('corError').style.color = cor;
}

function chargeWallpaper(){
    document.body.style.background = "url('background/background0" + ran2 + ".png') no-repeat center center fixed";
    document.body.style.backgroundSize = "cover";
    document.body.style.transition = "3s";
}

