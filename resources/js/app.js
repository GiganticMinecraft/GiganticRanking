/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

// ルーティング定義
import router from './router'
// ストア (データの入れ場所)
import store from './store'
// ルートコンポーネント
import App from './App.vue'


new Vue({
  el: '#app',
  router, // ルーティングの定義を読み込む
  store,  // ストア
  components: { App }, // ルートコンポーネントの使用を宣言する
  template: '<App />' // ルートコンポーネントを描画する
});
