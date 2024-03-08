<template>
  <Users :users="users" title="User List" />
</template>

<script lang="ts">
import Vue from 'vue'

export default Vue.extend({
  name: 'IndexPage',
  data() {
    return {
      users: []
    }
  },
  beforeMount() {
    this.fetchUsers();
  },
  methods: {
    async fetchUsers() {
      const users = await this.$axios.$get('http://localhost:8000/api/users', {
        auth: {
          username: 'uwest@example.org',
          password: 'password'
        }
      })

      console.log(users)

      this.users = users
    }
  }
})
</script>
