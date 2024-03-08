<template>
  <div>
    <Users :users="[user]" :title="`User: ${user.name}`" />
  </div>
</template>

<script lang="ts">
import Vue from 'vue'

export default Vue.extend({
  name: 'UserPage',
  data() {
    return {
      user: {
        name: ""
      }
    }
  },
  beforeMount() {
    this.fetchUser(this.$route.params.id);
  },
  methods: {
    async fetchUser(userId: string) {
      const user = await this.$axios.$get(`http://localhost:8000/api/users/${userId}`, {
        auth: {
          username: 'uwest@example.org',
          password: 'password'
        }
      })

      console.log(user)

      this.user = user
    }
  }
})
</script>
