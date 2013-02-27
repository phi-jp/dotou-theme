# 更新時の注意


## プラグイン編
いくつかのコアをいじっています。

### gianism
デフォルトCSSを読み込まないように変更しています。
・gianism\WP_Gianism.php
380-384行付近
public function enqueue_style(){
  if($this->is_enabled()){
    wp_enqueue_style($this->name, $this->url."assets/gianism-style.css", array(), $this->version);
  }
}
の中身をコメントアウトする。

### BuddyPress
クラス名を変更するためにclass="current selected" を class="active"に変更しています。
・buddypress\bp-core\bp-core-template.php
46-50
・buddypress\bp-members\bp-members-template.php
705-709
718-722
750-754
行付近
$selected = ' class="current selected"';
