<template>
  <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center sm:pt-0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
      <div class="mt-8 bg-white overflow-hidden shadow sm:rounded-lg p-6">

        <label class="block mb-4">
          <span class="block text-sm font-medium text-slate-700">Name</span>

          <input v-model="user.name" type="text" id="name" name="name" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
      focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
      disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
      invalid:border-pink-500 invalid:text-pink-600
      focus:invalid:border-pink-500 focus:invalid:ring-pink-500" />

          <div v-if="errors.name" class="alert alert-danger">
            <div v-for="error in errors.name" class="text-pink-600">
              {{ error }}
            </div>
          </div>

        </label>

        <label class="block mb-4">

          <span class="block text-sm font-medium text-slate-700">Email</span>

          <input v-model="user.email" type="text" id="email" name="email" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
      focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
      disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
      invalid:border-pink-500 invalid:text-pink-600
      focus:invalid:border-pink-500 focus:invalid:ring-pink-500" />

          <div v-if="errors.email" class="alert alert-danger">
            <div v-for="error in errors.email" class="text-pink-600">
              {{ error }}
            </div>
          </div>


        </label>

        <label class="block mb-4">

          <span class="block text-sm font-medium text-slate-700">Notes</span>

          <textarea v-model="user.notes" id="notes" name="notes" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
      focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
      disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
      invalid:border-pink-500 invalid:text-pink-600
      focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
  </textarea>

          <div v-if="errors.notes" class="alert alert-danger">
            <div v-for="error in errors.notes" class="text-pink-600">
              {{ error }}
            </div>
          </div>


        </label>

        <div class="text-right">
          <button @click="submit" type="button"
            class="bg-sky-500 hover:bg-sky-700 px-5 py-2.5 text-sm leading-5 rounded-md font-semibold text-white">Submit</button>
        </div>

      </div>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'

export default Vue.extend({
  name: 'UserPage',
  data() {
    return {
      user: {
        name: "",
        email: "",
        notes: ""
      },
      errors: {}
    }
  },
  methods: {
    async submit() {
      this.errors = {};

      let user = null;

      try {
        user = await this.$axios.$post('http://localhost:8000/api/users', this.user, {
          auth: {
            username: 'uwest@example.org',
            password: 'password'
          }
        })
      } catch (e) {
        this.errors = e.response.data.errors;
        return;
      }

      console.log(user)

      this.$router.push('/')
    }
  }
})
</script>
