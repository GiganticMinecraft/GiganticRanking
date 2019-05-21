import Vue from 'vue'
import VueRouter from 'vue-router'

// ページコンポーネントの読み込み
import Ranking from './pages/Ranking.vue'
import MyPage from './pages/MyPage.vue'

// VueRouterプラグインを使用する
// これによって<RouterView />コンポーネントなどを使うことができる
Vue.use(VueRouter);

// パスとコンポーネントのマッピング
const routes = [
  {
    path: '/',
    component: Ranking
  },
  {
    path: '/mypage',
    component: MyPage
  }
];

// VueRouterインスタンスを作成する
const router = new VueRouter({
  mode: 'history', // 本来の URL の形を再現する
  routes
});

// app.jsでインポートするため、VueRouterインスタンスをエクスポートする
export default router
