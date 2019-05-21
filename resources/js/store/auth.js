const state = {};

const getters = {};

const mutations = {};

const actions = {
  async login (context, data) {
    const response = await axios.post('/api/login', data);
    context.commit('setUser', response.data)
  }
};

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}
