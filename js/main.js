window.onload = function(){
  var hoge = tm.dom.Element(".category_tab");
  var piyo = tm.dom.ElementList(".category_tab");
  //var piyo = tm.dom.Element.queryAll(".category_tab");
  console.log(hoge);
  console.log(piyo);

  hoge.event.click(function() {
    alert("click");
  });
};
