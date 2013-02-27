window.onload = function(){
  /* カテゴリーのタブ切り替え */
  var categoryTab = tm.dom.ElementList(".category .main_content hgroup h2");
  var categorySection = tm.dom.ElementList(".category_section");

  categoryTab.forEach(function(elm, i) {
    elm.event.click(function() {
      // classにplus追加
      categoryTab.forEach(function(elm, i) {
        elm.attr.set("class", "plus");
      });
      elm.attr.set("class", "minus"); //  classにminus追加
      // 全カテゴリを非表示
      categorySection.forEach(function(elm, i) {
        elm.style.set("display", "none");
      });
      // 選択したカテゴリを表示
      categorySection[i].style.set("display", "block");
    });
  });
};
