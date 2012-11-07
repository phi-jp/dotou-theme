window.onload = function(){
  var categoryTab = tm.dom.ElementList(".category_tab");
  var categorySection = tm.dom.ElementList(".category_section");

  var boxList = tm.dom.Element(document).queryAll(".category_tab");

  console.log(categoryTab);
  console.log(boxList);

  categoryTab.forEach(function(elm, i) {
    elm.event.click(function() {
      console.log(this.html);
      console.log(categorySection[0]);
      categorySection.forEach(function(elm, i) {
        elm.visible = false;
        elm.style.set("height", "0");
      });
      categorySection[i].visible = true;
      categorySection[i].style.set("height", "auto");
    });
  });
};
